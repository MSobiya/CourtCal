package com.example.sobiya.demoregistration;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Toast;

public class FrontPage extends AppCompatActivity {
    private Session session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_front_page);


        session = new Session(FrontPage.this);

        if(session.getSize() == 0){
            Intent in = new Intent(getApplicationContext(), Login.class);
            startActivity(in);
        }
        else {
            String role = session.getRole();
         if (role.equals("Court")) {
                // loading.dismiss();
                Intent in = new Intent(getApplicationContext(), CourtHome.class);
                startActivity(in);
            } else if (role.equals("Judge")) {
                //loading.dismiss();
            Intent in = new Intent(getApplicationContext(), JudgeHome.class);
            startActivity(in);

               // Toast.makeText(getApplicationContext(), "Judge Login", Toast.LENGTH_SHORT).show();
            }

         else if (role.equals("Lawyer")) {
             //loading.dismiss();
             Intent in = new Intent(getApplicationContext(), LawyerHome.class);
             startActivity(in);

             // Toast.makeText(getApplicationContext(), "Judge Login", Toast.LENGTH_SHORT).show();
         }
         else{
             session.delPref();
             Intent in = new Intent(getApplicationContext(), FrontPage.class);
             startActivity(in);
             /*Intent in = new Intent(getApplicationContext(), Login.class);
             startActivity(in);*/
         }

        }
    }

}
