package com.example.sobiya.demoregistration;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class JudgeHome extends AppCompatActivity {
    Button judgeLogout, btnJNewCases, btnJRunningCases, btnJUpcomingCases, btnJClosedCases;
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_judge_home);

        judgeLogout = (Button)findViewById(R.id.judgeLogout);
        btnJNewCases = (Button)findViewById(R.id.btnJNewCases);
        btnJRunningCases = (Button)findViewById(R.id.btnJRunningCases);
        btnJUpcomingCases = (Button)findViewById(R.id.btnJUpcomingCases);
        btnJClosedCases = (Button)findViewById(R.id.btnJClosedCases);

        session = new Session(JudgeHome.this);

        judgeLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                session.delPref();
                Intent in = new Intent(getApplicationContext(), FrontPage.class);
                startActivity(in);
            }
        });

        btnJNewCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Judge_NewCases.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });

        btnJRunningCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Judge_RunningCases.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });

        btnJUpcomingCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Scheduling_Detail.class);
                startActivity(in);
                //Toast.makeText(getApplicationContext(),"Hello",Toast.LENGTH_SHORT).show();
            }
        });

        btnJClosedCases.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), Judge_ClosedCases.class);
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
