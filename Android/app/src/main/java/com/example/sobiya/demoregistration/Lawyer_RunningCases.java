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
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.StringTokenizer;

public class Lawyer_RunningCases extends AppCompatActivity {
    private static final String LawyerRunning_URL = URLPath.Path+"LawyerRunningCases.php";

    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lawyer__running_cases);

        session = new Session(Lawyer_RunningCases.this);
        getRunningCases(LawyerRunning_URL);
    }


    private void getRunningCases(String url) {
        class GetJSON extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Lawyer_RunningCases.this, "Please Wait...", null, true, true);
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
                // Toast.makeText(getBaseContext(), result, Toast.LENGTH_SHORT).show();


                try {
                    JSONArray jArray = new JSONArray(result);
                    for (int i = 0; i < jArray.length() ; i++) {
                        TableLayout tb = (TableLayout) findViewById(R.id.tb7);
                        //tb.removeAllViewsInLayout();
                        TableRow tr = new TableRow(Lawyer_RunningCases.this);
                        JSONObject json_data = jArray.getJSONObject(i);
                        //Log.i("log_tag", "id: " + json_data.getInt("id") + ", ip: " + json_data.getString("ip") + ", pc_no: " + json_data.getInt("pc_no") + ", status: " + json_data.getString("status") + ", last_update: " + json_data.getString("last_update"));

                        final String case_id = String.valueOf(json_data.getString("case_id"));
                        TextView tv0 = new TextView(Lawyer_RunningCases.this);
                        tv0.setText(case_id);
                        tv0.setPadding(20, 0, 0, 0);
                        tr.addView(tv0);


                        Button tv2 = new Button(Lawyer_RunningCases.this);
                        tv2.setText("VIEW");
                        tv2.setPadding(20, 0, 0, 0);
                        tr.addView(tv2);



                        Button caseHistory = new Button(Lawyer_RunningCases.this);
                        caseHistory.setText("History");
                        caseHistory.setPadding(20, 0, 0, 0);
                        tr.addView(caseHistory);

                        Button similarCase = new Button(Lawyer_RunningCases.this);
                        similarCase.setText("Similar Case");
                        similarCase.setPadding(20, 0, 0, 0);
                        tr.addView(similarCase);




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

                        caseHistory.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View view) {
                                Intent in=new Intent(getApplicationContext(),CaseHistory.class);
                                in.putExtra("case_id", case_id);
                                startActivity(in);

                                //Toast.makeText(getApplicationContext(), "Case History", Toast.LENGTH_SHORT).show();
                            }
                        });

                        similarCase.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View view) {
                                session.setSimilarCase_id(case_id);
                                Intent in = new Intent(getApplicationContext(), AllSimilarCases.class);
                                startActivity(in);
                                //Toast.makeText(getApplicationContext(), "Case History", Toast.LENGTH_SHORT).show();
                            }
                        });

                    }


                } catch (JSONException e) {
                    Log.e("log_tag", "Error parsing data" + e.toString());
                    Toast.makeText(getApplicationContext(), "No Cases", Toast.LENGTH_SHORT).show();
                }





                // Toast.makeText(getApplicationContext(),result + "\n\n",Toast.LENGTH_SHORT).show();


            }
        }
        GetJSON gj = new GetJSON();
        gj.execute(url);
    }



    @Override
    public void onBackPressed() {
        super.onBackPressed();
        startActivity(new Intent(Lawyer_RunningCases.this, LawyerHome.class));
        finish();
    }

    }
