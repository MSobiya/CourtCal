package com.example.sobiya.demoregistration;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Lawyer_NewCase extends AppCompatActivity {
    Button btnViewL, btnHistoryL, btnAcceptL;
    EditText etCaseIDL;
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lawyer__new_case);

        etCaseIDL = (EditText)findViewById(R.id.etCaseIDL);
        btnViewL = (Button)findViewById(R.id.btnViewL);
        btnHistoryL =(Button)findViewById(R.id.btnHistoryL);
        btnAcceptL = (Button)findViewById(R.id.btnAcceptL);



        session = new Session(Lawyer_NewCase.this);


        btnViewL.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String case_id = etCaseIDL.getText().toString();
                if(case_id.equals("")){
                    Toast.makeText(getApplicationContext(),"Please Enter Case ID",Toast.LENGTH_SHORT).show();
                }
                else {
                    Intent in = new Intent(getApplicationContext(), CaseDetailActivity.class);
                    in.putExtra("case_id", case_id);
                    startActivity(in);
                }
            }
        });

        btnHistoryL.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String case_id = etCaseIDL.getText().toString();
                if(case_id.equals("")){
                    Toast.makeText(getApplicationContext(),"Please Enter Case ID",Toast.LENGTH_SHORT).show();
                }
                else {
                Intent in=new Intent(getApplicationContext(),CaseHistory.class);
                in.putExtra("case_id", case_id);
                startActivity(in);
                //Toast.makeText(getApplicationContext(), case_id, Toast.LENGTH_SHORT).show();

                }
            }
        });

        btnAcceptL.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String case_id = etCaseIDL.getText().toString();
                if(case_id.equals("")){
                    Toast.makeText(getApplicationContext(),"Please Enter Case ID",Toast.LENGTH_SHORT).show();
                }
                else {
                    session.setCaseId(case_id);
                    Intent in=new Intent(getApplicationContext(),Lawyer_Client.class);
                    startActivity(in);
                    //Toast.makeText(getApplicationContext(), case_id, Toast.LENGTH_SHORT).show();
                }
            }
        });

    }

    @Override
    public void onBackPressed()
    {
        super.onBackPressed();
        startActivity(new Intent(Lawyer_NewCase.this, LawyerHome.class));
        finish();
    }
}
