package com.example.sobiya.demoregistration;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class SimilarCaseHome extends AppCompatActivity {
    Button btnSimilar;
    EditText etSimilarCaseId;
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_similar_case_home);

        etSimilarCaseId = (EditText)findViewById(R.id.etSimilarCaseId);
        btnSimilar = (Button)findViewById(R.id.btnSimilar);

        session = new Session(SimilarCaseHome.this);


        btnSimilar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String similar_case_id = etSimilarCaseId.getText().toString();
                if(similar_case_id.equals("")){
                    Toast.makeText(getApplicationContext(),"Please Enter Case ID to get Similar Cases",Toast.LENGTH_SHORT).show();
                }
                else {
                    session.setSimilarCase_id(similar_case_id);
                    Intent in = new Intent(getApplicationContext(), AllSimilarCases.class);
                    //in.putExtra("similar_case_id", session.getSimilarCase_id());
                    //in.putExtra("client_email", client_email);
                    startActivity(in);
                }
            }
        });

    }


    @Override
    public void onBackPressed() {
        super.onBackPressed();
        startActivity(new Intent(SimilarCaseHome.this, LawyerHome.class));
        finish();
    }
}
