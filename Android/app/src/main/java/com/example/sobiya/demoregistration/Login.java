package com.example.sobiya.demoregistration;

import android.app.ProgressDialog;
import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
//import com.example.sobiya.demoregistration.URLPath;


public class Login extends AppCompatActivity {

    private Session session;
    Button sign_up, login;
    EditText etId, etPas;
    private static final String LOGIN_URL = URLPath.Path+"Login.php";
    private RadioGroup roleRG;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        roleRG = (RadioGroup) findViewById(R.id.roleRG);

        session = new Session(Login.this);

        if(session.getSize() != 0){
            String role = session.getRole();
            if (role.equals("Court")) {
                // loading.dismiss();
                Intent in = new Intent(getApplicationContext(), CourtHome.class);
                startActivity(in);
            } else if (role.equals("Judge")) {
                //loading.dismiss();
            Intent in = new Intent(getApplicationContext(), JudgeHome.class);
            startActivity(in);

                //Toast.makeText(getApplicationContext(), "Judge Login", Toast.LENGTH_SHORT).show();
            }
        }

        sign_up = (Button) findViewById(R.id.signup);
        login = (Button) findViewById(R.id.login);

        etId = (EditText) findViewById(R.id.etId);
        etPas = (EditText) findViewById(R.id.etPas);

        String email = etId.getText().toString();
        String password = etId.getText().toString();

        sign_up.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), FirstActivity.class);
                startActivity(in);
            }
        });


        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String email = etId.getText().toString();
                String password = etPas.getText().toString();
                session.setEmail(email);
                session.setPassword(password);
                int selectedRoleID = roleRG.getCheckedRadioButtonId();
                if (selectedRoleID == -1){
                    Toast.makeText(getBaseContext(), "Please Select Proper Role",Toast.LENGTH_SHORT).show();
                }
                else {
                RadioButton rdbtn = (RadioButton)findViewById(selectedRoleID);
                String selectedRole = rdbtn.getText().toString();
                getLogin(LOGIN_URL, email, password, selectedRole);

                etId.setText("");
                etPas.setText("");
                }




            }
        });
    }

    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
    }

    private void getLogin(String url, final String email, final String password, final String selectedRole) {
        class GetDetail extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Login.this, "Please Wait...", null, true, true);
            }

            @Override
            protected String doInBackground(String... params) {

                HttpURLConnection conn = null;
                String uri = params[0];
                BufferedReader bufferedReader = null;
                OutputStream out = null;
                try {
                    URL url = new URL(uri);
                    conn = (HttpURLConnection) url.openConnection();

                    conn.setRequestMethod("POST");
                    conn.setDoInput(true);
                    conn.setDoOutput(true);

                    Uri.Builder builder = new Uri.Builder().appendQueryParameter("email", email);
                    builder.appendQueryParameter("password", password);
                    builder.appendQueryParameter("role", selectedRole);
                    String query = builder.build().getEncodedQuery();

                    OutputStream output = conn.getOutputStream();
                    BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(output, "UTF-8"));
                    writer.write(query);
                    writer.flush();
                    writer.close();
                    output.close();

                    conn.connect();

                    StringBuilder sb = new StringBuilder();

                    bufferedReader = new BufferedReader(new InputStreamReader(conn.getInputStream()));

                    String json;
                    while((json = bufferedReader.readLine())!= null){
                        sb.append(json+"\n");
                    }

                    return sb.toString().trim();
                    //return "OK";

                } catch (MalformedURLException e) {
                    e.printStackTrace();
                    Log.e("log_tag", "Error Mal" + e.toString());

                } catch (IOException e) {
                    e.printStackTrace();
                    Log.e("log_tag", "Error" + e.toString());
                } catch (Exception e){
                    e.printStackTrace();
                    Log.e("log_tag", "General Error" + e.toString());
                } finally {
                    if (conn != null) {
                        conn.disconnect();
                    }
                }
                return null;
            }

            @Override
            protected void onPostExecute(String result) {
                super.onPostExecute(result);
                loading.dismiss();
                //Toast.makeText(getBaseContext(), result, Toast.LENGTH_SHORT).show();

                if(result.equals("OK Court")){
                    session.setRole("Court");
                    Intent in = new Intent(getApplicationContext(), CourtHome.class);
                    startActivity(in);
                }

                else if(result.equals("OK Judge")){
                    session.setRole("Judge");
                    Intent in = new Intent(getApplicationContext(), JudgeHome.class);
                    startActivity(in);
                    //Toast.makeText(getBaseContext(), result,Toast.LENGTH_SHORT).show();
                }

                else if(result.equals("OK Lawyer")){
                    session.setRole("Lawyer");
                    Intent in = new Intent(getApplicationContext(), LawyerHome.class);
                    startActivity(in);
                    //Toast.makeText(getBaseContext(), "Hello Lawyer",Toast.LENGTH_SHORT).show();
                }

                else{
                    Toast.makeText(getBaseContext(), "Wrong Credentials...!",Toast.LENGTH_SHORT).show();
                }


            }
        }
        GetDetail gj = new GetDetail();
        gj.execute(url);
    }


}
