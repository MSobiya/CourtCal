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
import android.widget.LinearLayout;
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
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.StringTokenizer;

public class Judge_RunningCases extends AppCompatActivity {
    private static final String Running_URL = URLPath.Path+"RunningCases.php";

    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_judge__running_cases);

        session = new Session(Judge_RunningCases.this);
        getRunning(Running_URL);


    }

    private void getRunning(String url) {
        class GetJSON extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Judge_RunningCases.this, "Please Wait...", null, true, true);
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

                    Uri.Builder builder = new Uri.Builder().appendQueryParameter("EmailJR", session.getEmail());
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
                        TableLayout tb = (TableLayout) findViewById(R.id.tb3);
                        //tb.removeAllViewsInLayout();
                        TableRow tr = new TableRow(Judge_RunningCases.this);
                        JSONObject json_data = jArray.getJSONObject(i);
                        //Log.i("log_tag", "id: " + json_data.getInt("id") + ", ip: " + json_data.getString("ip") + ", pc_no: " + json_data.getInt("pc_no") + ", status: " + json_data.getString("status") + ", last_update: " + json_data.getString("last_update"));

                        final String case_id = String.valueOf(json_data.getString("case_id"));
                        TextView tv0 = new TextView(Judge_RunningCases.this);
                        tv0.setText(case_id);
                        tv0.setPadding(20, 0, 0, 0);
                        tr.addView(tv0);


                        Button tv2 = new Button(Judge_RunningCases.this);
                        tv2.setText("VIEW");
                        tv2.setPadding(20, 0, 0, 0);
                        tr.addView(tv2);



                        Button caseHistory = new Button(Judge_RunningCases.this);
                        caseHistory.setText("History");
                        caseHistory.setPadding(20, 0, 0, 0);
                        tr.addView(caseHistory);


                        Date today = new Date();
                        SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
                        String currentDate = format.format(today);


                        final String scheduling_time = String.valueOf(json_data.getString("scheduling_time"));
                        StringTokenizer tk = new StringTokenizer(scheduling_time);
                        String date = tk.nextToken();



                        //schedule date is less than current date--> hearing is done
                        if(date.compareTo(currentDate) < 0) {
                            //Toast.makeText(getApplicationContext(),result + "\n\n" + currentDate,Toast.LENGTH_SHORT).show();
                            final RadioGroup feedbackGrp = new RadioGroup(Judge_RunningCases.this);
                            feedbackGrp.setOrientation(RadioGroup.HORIZONTAL);

                            final RadioButton[] status = new RadioButton[2];
                            status[0] = new RadioButton(Judge_RunningCases.this);
                            status[0].setId(i);
                            status[0].setText("Reschedule");

                            feedbackGrp.addView(status[0]);

                            status[1] = new RadioButton(Judge_RunningCases.this);
                            status[1].setId(i + 1);
                            status[1].setText("Close");

                            feedbackGrp.addView(status[1]);

                            tr.addView(feedbackGrp);


                            Button btnStatus = new Button(Judge_RunningCases.this);
                            btnStatus.setText("APPLY");
                            btnStatus.setPadding(20, 0, 0, 0);
                            tr.addView(btnStatus);

                            btnStatus.setOnClickListener(new View.OnClickListener() {
                                @Override
                                public void onClick(View view) {
                                    int selectedId = feedbackGrp.getCheckedRadioButtonId();
                                    RadioButton rdbtn = (RadioButton)findViewById(selectedId);
                                    String selectedFeedback = rdbtn.getText().toString();
                                    if(selectedFeedback.equals("Reschedule")){
                                        Intent in=new Intent(getApplicationContext(),Schedule.class);
                                        in.putExtra("case_id", case_id);
                                        startActivity(in);
                                    }

                                    if(selectedFeedback.equals("Close")){
                                        Intent in=new Intent(getApplicationContext(),CloseCase.class);
                                        in.putExtra("case_id", case_id);
                                        startActivity(in);
                                    }
                                }
                            });
                        }


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
    public void onBackPressed()
    {
        super.onBackPressed();
        startActivity(new Intent(Judge_RunningCases.this, JudgeHome.class));
        finish();

    }

    @Override
    public void onRestart()
    {
        super.onRestart();
        finish();
        startActivity(getIntent());
    }
}
