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
import android.widget.RadioButton;
import android.widget.RadioGroup;
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

public class CaseHistory extends AppCompatActivity {
    private static final String History_URL = URLPath.Path+"CaseHistory.php";
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_case_history);

        session = new Session(CaseHistory.this);

        Bundle bundle = getIntent().getExtras();
        String case_id = bundle.getString("case_id");


        TextView tvCaseID = (TextView)findViewById(R.id.tvCaseID);
        tvCaseID.append(case_id);

        getHistory(History_URL, case_id);
    }

    private void getHistory(String url, final String case_id) {
        class GetJSON extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(CaseHistory.this, "Please Wait...", null, true, true);
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

                    Uri.Builder builder = new Uri.Builder().appendQueryParameter("case_id", case_id);
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
                try {
                    JSONArray jArray = new JSONArray(result);
                    for (int i = 0; i < jArray.length() ; i++) {
                        TableLayout tb = (TableLayout) findViewById(R.id.tb4);
                        JSONObject json_data = jArray.getJSONObject(i);



                        TableRow tr3 = new TableRow(CaseHistory.this);
                        //Log.i("log_tag", "id: " + json_data.getInt("id") + ", ip: " + json_data.getString("ip") + ", pc_no: " + json_data.getInt("pc_no") + ", status: " + json_data.getString("status") + ", last_update: " + json_data.getString("last_update"));

                        TextView tv3 = new TextView(CaseHistory.this);
                        tv3.setText("------------------------------------------------------------------------------------------------------\nDetail " + (i+1));
                        tv3.setPadding(20, 0, 0, 0);
                        tv3.setTextSize(15);
                        tr3.addView(tv3);

                        tb.addView(tr3);
                        //tb.removeAllViewsInLayout();
                        TableRow tr = new TableRow(CaseHistory.this);
                        //Log.i("log_tag", "id: " + json_data.getInt("id") + ", ip: " + json_data.getString("ip") + ", pc_no: " + json_data.getInt("pc_no") + ", status: " + json_data.getString("status") + ", last_update: " + json_data.getString("last_update"));

                        final String time = String.valueOf(json_data.getString("end_time"));
                        TextView tv0 = new TextView(CaseHistory.this);
                        tv0.setText(time);
                        tv0.setPadding(20, 0, 0, 0);
                        tv0.setTextSize(15);
                        tr.addView(tv0);

                        tb.addView(tr);

                        TableRow tr1 = new TableRow(CaseHistory.this);
                        //Log.i("log_tag", "id: " + json_data.getInt("id") + ", ip: " + json_data.getString("ip") + ", pc_no: " + json_data.getInt("pc_no") + ", status: " + json_data.getString("status") + ", last_update: " + json_data.getString("last_update"));

                        final String judgement = String.valueOf(json_data.getString("judgement"));
                        TextView tv1 = new TextView(CaseHistory.this);
                        tv1.setText(judgement);
                        tv1.setPadding(20, 0, 0, 0);
                        tv1.setTextSize(15);
                        tr1.addView(tv1);

                        tb.addView(tr1);



                    }


                } catch (JSONException e) {
                    Log.e("log_tag", "Error parsing data" + e.toString());
                    Toast.makeText(getApplicationContext(), "No Hearing done for this case", Toast.LENGTH_SHORT).show();
                }


            }
        }
        GetJSON gj = new GetJSON();
        gj.execute(url);
    }



    @Override
    public void onBackPressed()
    {
        super.onBackPressed();
        if(session.getRole().equals("Judge")) {
            startActivity(new Intent(CaseHistory.this, Judge_RunningCases.class));
            finish();
        }
       /* if(session.getRole().equals("Lawyer")) {
            startActivity(new Intent(CaseHistory.this, Lawyer_NewCase.class));
            finish();
        }*/

    }
}
