package com.example.sobiya.demoregistration;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class CourtHome extends AppCompatActivity {
    public static final String MY_JSON = "MY_JSON";
    Button CourtLogout, CourtRefresh;
    private Session session;

    private static final String JSON_URL = URLPath.Path+"CaseAssignment.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_courttable);
        CourtLogout = (Button)findViewById(R.id.courtLogout);
        CourtRefresh = (Button) findViewById(R.id.courtRefresh);

        session = new Session(CourtHome.this);

        CourtLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                session.delPref();
                Intent in = new Intent(getApplicationContext(), FrontPage.class);
                startActivity(in);
            }
        });

        CourtRefresh.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
                startActivity(getIntent());
            }
        });

        getJSON(JSON_URL);
    }

    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
    }

    @Override
    public void onRestart()
    {
        super.onRestart();
        finish();
        startActivity(getIntent());
    }

    private void getJSON(String url) {
        class GetJSON extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(CourtHome.this, "Please Wait...", null, true, true);
            }

            @Override
            protected String doInBackground(String... params) {

                HttpURLConnection conn = null;
                String uri = params[0];
                BufferedReader bufferedReader = null;
                try {
                   /* URL url;
                    url = new URL(params[0]);*/
                    URL url = new URL(uri);
                    conn = (HttpURLConnection) url.openConnection();
                    if (conn.getResponseCode() == HttpURLConnection.HTTP_OK) {
                        InputStream is = conn.getInputStream();
                    } else {
                        InputStream err = conn.getErrorStream();
                    }
                    StringBuilder sb = new StringBuilder();

                    bufferedReader = new BufferedReader(new InputStreamReader(conn.getInputStream()));

                    String json;
                    while((json = bufferedReader.readLine())!= null){
                        sb.append(json+"\n");
                    }

                    return sb.toString().trim();

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
                //Toast.makeText(getBaseContext(), result, Toast.LENGTH_SHORT).show();

                try {
                    JSONArray jArray = new JSONArray(result);
                    for (int i = 0; i < jArray.length() ; i++) {
                        TableLayout tb = (TableLayout) findViewById(R.id.tb);
                        //tb.removeAllViewsInLayout();
                        TableRow tr = new TableRow(CourtHome.this);
                        JSONObject json_data = jArray.getJSONObject(i);
                        //Log.i("log_tag", "id: " + json_data.getInt("id") + ", ip: " + json_data.getString("ip") + ", pc_no: " + json_data.getInt("pc_no") + ", status: " + json_data.getString("status") + ", last_update: " + json_data.getString("last_update"));

                        final String case_id = String.valueOf(json_data.getString("case_id"));
                        TextView tv0 = new TextView(CourtHome.this);
                        tv0.setText(case_id);
                        tv0.setPadding(20, 0, 0, 0);
                        tr.addView(tv0);


                        String NameJR = String.valueOf(json_data.getString("NameJR"));
                        TextView tv5 = new TextView(CourtHome.this);
                        tv5.setText(NameJR);
                        tv5.setPadding(20, 0, 0, 0);
                        tr.addView(tv5);

                        String EmailJR = String.valueOf(json_data.getString("EmailJR"));
                        TextView tv1 = new TextView(CourtHome.this);
                        tv1.setText(EmailJR);
                        tv1.setPadding(20, 0, 0, 0);
                        tr.addView(tv1);


                        //String spc_no = String.valueOf(json_data.getInt("pc_no"));
                        /*TextView tv2 = new TextView(CourtHome.this);
                        tv2.setText("VIEW");
                        tv2.setPadding(20, 0, 0, 0);
                        tr.addView(tv2);*/

                        Button tv2 = new Button(CourtHome.this);
                        tv2.setText("VIEW");
                        tv2.setPadding(20, 0, 0, 0);
                        tr.addView(tv2);

                        Button caseHistory = new Button(CourtHome.this);
                        caseHistory.setText("History");
                        caseHistory.setPadding(20, 0, 0, 0);
                        tr.addView(caseHistory);
                        
                        tb.addView(tr);

                        tv2.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View view) {
                                Intent in=new Intent(getApplicationContext(),CaseDetailActivity.class);
                                in.putExtra("case_id", case_id);
                                startActivity(in);
                            }
                        });

                        caseHistory.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View view) {
                                Intent in=new Intent(getApplicationContext(),CaseHistory.class);
                                in.putExtra("case_id", case_id);
                                startActivity(in);

                                //Toast.makeText(getApplicationContext(), "Case History", Toast.LENGTH_SHORT).show();
                            }
                        });

                    }


                } catch (JSONException e) {
                    Log.e("log_tag",
                            "Error parsing data" + e.toString());
                    Toast.makeText(getApplicationContext(), "NOT getting", Toast.LENGTH_SHORT).show();
                }


            }
        }
        GetJSON gj = new GetJSON();
        gj.execute(url);
    }
}

    /*public void startService(View view) {
        startService(new Intent(getApplicationContext(), CaseAssignmentService.class));
    }

    // Method to stop the service
    public void stopService(View view) {
        stopService(new Intent(getApplicationContext(), CaseAssignmentService.class));
    }*/




