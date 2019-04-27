package com.example.sobiya.demoregistration;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.ActivityNotFoundException;
import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.provider.CalendarContract;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
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
import java.util.GregorianCalendar;
import java.util.StringTokenizer;

public class Schedule extends AppCompatActivity {
    private static final String Schedule_URL = URLPath.Path+"CaseSchedule.php";
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_schedule);

        session = new Session(Schedule.this);

        Bundle bundle = getIntent().getExtras();
        String case_id = bundle.getString("case_id");

        doSchedule(Schedule_URL, case_id);
    }

    private void doSchedule(String url, final String case_id) {
        class GetDetail extends AsyncTask<String, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Schedule.this, "Please Wait...", null, true, true);
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
                    builder.appendQueryParameter("EmailJR", session.getEmail());
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
            protected void onPostExecute(String date_time) {
                super.onPostExecute(date_time);
                loading.dismiss();
                //Toast.makeText(getBaseContext(), date_time, Toast.LENGTH_SHORT).show();

                StringTokenizer tk = new StringTokenizer(date_time);

                String dateT = tk.nextToken();
                String timeT = tk.nextToken();

                String[] date = dateT.split("-");
                String[] time = timeT.split(":");


                Intent calIntent = new Intent(Intent.ACTION_EDIT);
                calIntent.setType("vnd.android.cursor.item/event");
                calIntent.putExtra(CalendarContract.Events.TITLE, "Hearing of Date "+dateT);
                //calIntent.putExtra(CalendarContract.Events.EVENT_LOCATION, "My Beach House");
                calIntent.putExtra(CalendarContract.Events.DESCRIPTION, "Case Hearing of case " + case_id +" for date " + dateT + "at Time " + timeT);

                // GregorianCalendar calDate = new GregorianCalendar(2019, 1, 27,10,30);
                //GregorianCalendar calDate = new GregorianCalendar(Integer.parseInt(date[0]), Integer.parseInt(date[1])-1, Integer.parseInt(date[2])-1,Integer.parseInt(time[0]),Integer.parseInt(time[1]));
                GregorianCalendar calDate = new GregorianCalendar(Integer.parseInt(date[0]), Integer.parseInt(date[1])-1, Integer.parseInt(date[2])-1,10,30);
                calIntent.putExtra(CalendarContract.EXTRA_EVENT_ALL_DAY, false);
                calIntent.putExtra(CalendarContract.EXTRA_EVENT_BEGIN_TIME,
                        calDate.getTimeInMillis());
                calIntent.putExtra(CalendarContract.EXTRA_EVENT_END_TIME,
                        calDate.getTimeInMillis());

                //calIntent.putExtra(CalendarContract.Events.RRULE, "FREQ=DAILY;COUNT=1");
                try {
                    startActivity(calIntent);
                    finish();
                }catch (ActivityNotFoundException ErrVar)
                {
                    Toast.makeText(getApplicationContext(), "Install Calender App", Toast.LENGTH_LONG).show();
                }
                /*finally {
                    Intent in = new Intent(getApplicationContext(), Judge_NewCases.class);
                    startActivity(in);
                }*/



            }
        }
        GetDetail gj = new GetDetail();
        gj.execute(url);
    }

}
