package com.example.sobiya.demoregistration;

import android.app.ProgressDialog;
import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TableLayout;
import android.widget.TableRow;
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

public class Lawyer_Client extends AppCompatActivity {
    Button btnNext, btnNewClient;
    EditText etClientEmail;
    private Session session;
    private static final String Client_URL = URLPath.Path+"ClientCheck.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lawyer__client);

        etClientEmail = (EditText)findViewById(R.id.etClientEmail);
        btnNext = (Button)findViewById(R.id.btnNext);
        btnNewClient =(Button)findViewById(R.id.btnNewClient);

        session = new Session(Lawyer_Client.this);


        btnNext.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String client_email = etClientEmail.getText().toString();
                if(client_email.equals("")){
                    Toast.makeText(getApplicationContext(),"Please Enter Email of Client",Toast.LENGTH_SHORT).show();
                }
                else {
                    checkClient(Client_URL, client_email);
                }
            }
        });

        btnNewClient.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                    Intent in=new Intent(getApplicationContext(),ClientRegistration.class);
                    startActivity(in);
                    //Toast.makeText(getApplicationContext(), case_id, Toast.LENGTH_SHORT).show();
            }
        });


    }



    private void checkClient(String url, final String client_email) {
        class GetJSON extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Lawyer_Client.this, "Please Wait...", null, true, true);
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

                    Uri.Builder builder = new Uri.Builder().appendQueryParameter("client_email", client_email);
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
                // Toast.makeText(getBaseContext(), result, Toast.LENGTH_SHORT).show();
                if(result.equals("Not Registered")){
                    Toast.makeText(getBaseContext(), "This Client is Not Registered", Toast.LENGTH_SHORT).show();
                }

                else{
                    session.setClientEmail(client_email);
                    Intent in = new Intent(getApplicationContext(), FeesDetail.class);
                    in.putExtra("case_id", session.getCaseId());
                    //in.putExtra("client_email", client_email);
                    startActivity(in);
                }
            }
        }
        GetJSON gj = new GetJSON();
        gj.execute(url);
    }



}
