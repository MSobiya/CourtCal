package com.example.sobiya.demoregistration;

import android.app.ProgressDialog;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
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

public class Lawyer_Scheduling_Detail extends AppCompatActivity {

    private static final String LawyerScheduling_URL = URLPath.Path+"LawyerScheduling_Detail.php";
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lawyer__scheduling__detail);
        session = new Session(Lawyer_Scheduling_Detail.this);

        getSchedule(LawyerScheduling_URL);
    }

    private void getSchedule(String url) {
        class GetJSON extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Lawyer_Scheduling_Detail.this, "Please Wait...", null, true, true);
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

                    Uri.Builder builder = new Uri.Builder().appendQueryParameter("EmailLR", session.getEmail());
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

                //Toast.makeText(getBaseContext(),"Hello",Toast.LENGTH_SHORT);

                //Toast.makeText(getBaseContext(), result, Toast.LENGTH_SHORT).show();

                try {
                    JSONArray jArray = new JSONArray(result);
                    for (int i = 0; i < jArray.length() ; i++) {
                        TableLayout tb = (TableLayout) findViewById(R.id.tb1);
                        //tb.removeAllViewsInLayout();
                        TableRow tr = new TableRow(Lawyer_Scheduling_Detail.this);
                        JSONObject json_data = jArray.getJSONObject(i);
                        //Log.i("log_tag", "id: " + json_data.getInt("id") + ", ip: " + json_data.getString("ip") + ", pc_no: " + json_data.getInt("pc_no") + ", status: " + json_data.getString("status") + ", last_update: " + json_data.getString("last_update"));

                        final String case_id = String.valueOf(json_data.getString("case_id"));
                        TextView tv0 = new TextView(Lawyer_Scheduling_Detail.this);
                        tv0.setText(case_id);
                        tv0.setPadding(20, 0, 0, 0);
                        tv0.setTextSize(20);
                        tr.addView(tv0);


                        final String scheduling_time = String.valueOf(json_data.getString("scheduling_time"));
                        TextView tv1 = new TextView(Lawyer_Scheduling_Detail.this);
                        tv1.setText(scheduling_time);
                        tv1.setPadding(20, 0, 0, 0);
                        tv1.setTextSize(20);
                        tr.addView(tv1);
                        tb.addView(tr);


                    }


                } catch (JSONException e) {
                    Log.e("log_tag", "Error parsing data" + e.toString());
                    Toast.makeText(getApplicationContext(), "NOT getting", Toast.LENGTH_SHORT).show();
                }


            }
        }
        GetJSON gj = new GetJSON();
        gj.execute(url);
    }


}
