package com.example.sobiya.demoregistration;

import android.app.ProgressDialog;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
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

public class CaseDetailActivity extends AppCompatActivity {
    private static final String Detail_URL = URLPath.Path+"CaseDetail.php";
    TextView tvCaseID, tvNops, tvDops, tvPops, tvPhnps, tvXname, tvXphn, tvXaddress, tvXemail, tvToc, tvCaseTitle, tvCaseDesc, tvCaseStatus;
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_case_detail);

        session = new Session(CaseDetailActivity.this);

        Bundle bundle = getIntent().getExtras();
        String case_id = bundle.getString("case_id");
        //session.setCaseId(case_id);


        getDetail(Detail_URL, case_id);
    }

    private void getDetail(String url, final String case_id) {
        class GetDetail extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(CaseDetailActivity.this, "Please Wait...", null, true, true);
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
                    /*conn.setDoOutput(true);
                    OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
                    wr.write(case_id);
                    wr.flush();*/

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

                try {
                    JSONArray jArray = new JSONArray(result);
                    JSONObject json_data = jArray.getJSONObject(0);

                    tvCaseID = (TextView)findViewById(R.id.tvCaseId);
                    final String case_id = String.valueOf(json_data.getString("case_id"));
                    tvCaseID.setText("Case Id : " + case_id);

                    tvNops = (TextView)findViewById(R.id.tvNops);
                    final String nops = String.valueOf(json_data.getString("nops"));
                    tvNops.setText("Name of Police Station : " + nops);

                    tvDops = (TextView)findViewById(R.id.tvDsops);
                    final String dsops = String.valueOf(json_data.getString("dsops"));
                    tvDops.setText("District of Police Station : " + dsops);

                    tvPops = (TextView)findViewById(R.id.tvPops);
                    final String pops = String.valueOf(json_data.getInt("pops"));
                    tvPops.setText("Pincode of Police Station : " + pops);

                    tvPhnps = (TextView)findViewById(R.id.tvPhnps);
                    final String phn_ps = String.valueOf(json_data.getString("phn_ps"));
                    tvPhnps.setText("Phone Number of PS : " + phn_ps);

                    tvXname = (TextView)findViewById(R.id.tvXname);
                    final String xname = String.valueOf(json_data.getString("xname"));
                    tvXname.setText("Complainant Name : " + xname);

                    tvXphn = (TextView)findViewById(R.id.tvXphn);
                    final String xphn = String.valueOf(json_data.getString("xphn"));
                    tvXphn.setText("Phone Number of Complainant : "+ xphn);

                    tvXaddress = (TextView)findViewById(R.id.tvXaddress);
                    final String xaddress = String.valueOf(json_data.getString("xaddress"));
                    tvXaddress.setText("Adrress of Complainant : " + xaddress);

                    tvXemail = (TextView)findViewById(R.id.tvXemail);
                    final String xemail = String.valueOf(json_data.getString("xemail"));
                    tvXemail.setText("Email of Complainant : " + xemail);

                    tvToc = (TextView)findViewById(R.id.tvToc);
                    final String toc = String.valueOf(json_data.getString("toc"));
                    tvToc.setText("Time of Report : " + toc);

                    tvCaseTitle = (TextView)findViewById(R.id.tvCaseTitle);
                    final String case_title = String.valueOf(json_data.getString("case_title"));
                    tvCaseTitle.setText("Title : " + case_title);

                    tvCaseDesc = (TextView)findViewById(R.id.tvCaseDesc);
                    final String case_desc = String.valueOf(json_data.getString("case_desc"));
                    tvCaseDesc.setText("Description : " + case_desc);

                    tvCaseStatus = (TextView)findViewById(R.id.tvCaseStatus);
                    final String case_status = String.valueOf(json_data.getString("case_status"));
                    tvCaseStatus.setText("Status : " + case_status);



                } catch (JSONException e) {
                    Log.e("log_tag", "Error parsing data" + e.toString());
                    Toast.makeText(getApplicationContext(), "NOT getting", Toast.LENGTH_SHORT).show();
                }

            }
        }
        GetDetail gj = new GetDetail();
        gj.execute(url);
    }

}
