package com.example.sobiya.demoregistration;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;

public class FirstActivity extends AppCompatActivity {

    Button lawyer_page, judge_page, court_page;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_first);

        lawyer_page = (Button) findViewById(R.id.lawyer_page);
        judge_page = (Button) findViewById(R.id.judge_page);
//        court_page = (Button) findViewById(R.id.court_page);

        lawyer_page.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), MainActivity.class);
                startActivity(in);
            }
        });

        judge_page.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), JudgeRegistration.class);
                startActivity(in);
            }
        });

        /*court_page.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(getApplicationContext(), CourtRegistration.class);
                startActivity(in);
            }
        });*/

    }

}
