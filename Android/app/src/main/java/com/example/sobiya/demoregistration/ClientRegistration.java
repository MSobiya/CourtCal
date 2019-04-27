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
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class ClientRegistration extends AppCompatActivity {

    String fNameCR, mNameCR, lNameCR, EmailCR, PhnCR, AadharCR, AddressCR, GenderCR, nameCR;

    EditText etfNameCR, etmNameCR, etlNameCR, etEmailCR, etPhnCR, etAadharCR, etAddressCR, etGenderCR;

    Button btnRegisterCR;
    private Session session;
    private static final String ClientRegistration_URL = URLPath.Path+"ClientRegistration.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_client_registration);
        session = new Session(ClientRegistration.this);


        etfNameCR = (EditText) findViewById(R.id.etfNameCR);
        etmNameCR = (EditText) findViewById(R.id.etmNameCR);
        etlNameCR = (EditText) findViewById(R.id.etlNameCR);
        etEmailCR = (EditText) findViewById(R.id.etEmailCR);
        etPhnCR = (EditText) findViewById(R.id.etPhnCR);
        etAadharCR = (EditText) findViewById(R.id.etAadharCR);
        etAddressCR = (EditText) findViewById(R.id.etAddressCR);
        etGenderCR = (EditText) findViewById(R.id.etGenderCR);

        btnRegisterCR = (Button) findViewById(R.id.btnRegisterCR);

        btnRegisterCR.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                fNameCR = etfNameCR.getText().toString();
                mNameCR = etmNameCR.getText().toString();
                lNameCR = etlNameCR.getText().toString();
                EmailCR = etEmailCR.getText().toString();
                PhnCR = etPhnCR.getText().toString();
                AadharCR = etAadharCR.getText().toString();
                AddressCR = etAddressCR.getText().toString();
                GenderCR = etGenderCR.getText().toString();

                nameCR = fNameCR + " " + mNameCR + " " + lNameCR;


                registerClient(ClientRegistration_URL, nameCR, EmailCR, PhnCR, AadharCR, AddressCR, GenderCR);
                }
        });

    }


    private void registerClient(String url, final String nameCR, final String EmailCR, final String PhnCR, final String AadharCR, final String AddressCR, final String GenderCR) {
        class GetJSON extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(ClientRegistration.this, "Please Wait...", null, true, true);
            }

            @Override
            protected String doInBackground(String... params) {
                session.setClientEmail(EmailCR);

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

                    Uri.Builder builder = new Uri.Builder().appendQueryParameter("nameCR", nameCR);
                    builder.appendQueryParameter("EmailCR", EmailCR);
                    builder.appendQueryParameter("PhnCR", PhnCR);
                    builder.appendQueryParameter("AadharCR", AadharCR);
                    builder.appendQueryParameter("AddressCR", AddressCR);
                    builder.appendQueryParameter("GenderCR", GenderCR);
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
                 Toast.makeText(getBaseContext(), result, Toast.LENGTH_SHORT).show();
                if(result.equals("Not Inserted")){
                    Toast.makeText(getBaseContext(), "Please Try Again", Toast.LENGTH_SHORT).show();
                }

                else{

                    Intent in = new Intent(getApplicationContext(), FeesDetail.class);
                    in.putExtra("case_id", session.getCaseId());
                    //in.putExtra("client_email", session.getClientEmail());
                    startActivity(in);
                }
            }
        }
        GetJSON gj = new GetJSON();
        gj.execute(url);
    }
}
