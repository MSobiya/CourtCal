package com.example.sobiya.demoregistration;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class LawyerHome extends AppCompatActivity {
    Button lawyerLogout, btnLNewCases, btnLRunningCases, btnLUpcomingCases, btnLClosedCases, btnLSimilarCases;
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lawyer_home);

        lawyerLogout = (Button)findViewById(R.id.lawyerLogout);
        btnLNewCases = (Button)findViewById(R.id.btnLNewCases);
        btnLRunningCases = (Button)findViewById(R.id.btnLRunningCases);
        btnLUpcomingCases = (Button)findViewById(R.id.btnLUpcomingCases);
        btnLClosedCases = (Button)findViewById(R.id.btnLClosedCases);
        btnLSimilarCases = (Button)findViewById(R.id.btnLSimilarCases);

        session = new Session(LawyerHome.this);

        lawyerLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                session.delPref();
                Intent in = new Intent(getApplicationContext(), FrontPage.class);
                startActivity(in);
            }
        });

        btnLNewCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Lawyer_NewCase.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });

        btnLSimilarCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), SimilarCaseHome.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });

        btnLRunningCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Lawyer_RunningCases.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });

        btnLUpcomingCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Lawyer_Scheduling_Detail.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });

        btnLClosedCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Lawyer_ClosedCases.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });



    }

    @Override
    public void onBackPressed() {
        moveTaskToBack(true);
    }
}
