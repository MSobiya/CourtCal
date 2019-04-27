package com.example.sobiya.demoregistration;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.content.DialogInterface;
import android.support.v7.app.AlertDialog;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class JudgeRegistration extends AppCompatActivity {

    String server_url = URLPath.Path+"JudgeRegistration.php";
    AlertDialog.Builder builder;

    //JR = Judge Registration
    String fNameJR, mNameJR, lNameJR, EmailJR, PhnJR, AadharJR, AddressJR, AdCityJR, AdPincodeJR, AdStateJR, GenderJR, DobJR, PasswordJR;

    EditText etfNameJR, etmNameJR, etlNameJR, etEmailJR, etPhnJR, etAadharJR, etAddressJR, etAdCityJR, etAdPincodeJR, etAdStateJR, etGenderJR, etDobJR, etPasswordJR;

    Button btnRegisterJR;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_judge_registration);

        etfNameJR = (EditText) findViewById(R.id.etfNameJR);
        etmNameJR = (EditText) findViewById(R.id.etmNameJR);
        etlNameJR = (EditText) findViewById(R.id.etlNameJR);
        etEmailJR = (EditText) findViewById(R.id.etEmailJR);
        etPhnJR = (EditText) findViewById(R.id.etPhnJR);
        etAadharJR = (EditText) findViewById(R.id.etAadharJR);
        etAddressJR = (EditText) findViewById(R.id.etAddressJR);
        etAdCityJR = (EditText) findViewById(R.id.etAdCityJR);
        etAdPincodeJR = (EditText) findViewById(R.id.etAdPincodeJR);
        etAdStateJR = (EditText) findViewById(R.id.etAdStateJR);
        //etEnrollNoJR = (EditText) findViewById(R.id.etEnrollNoJR);
        etGenderJR = (EditText) findViewById(R.id.etGenderJR);
        etDobJR = (EditText) findViewById(R.id.etDobJR);
        //etSpclJR = (EditText) findViewById(R.id.etSpclJR);
        etPasswordJR = (EditText) findViewById(R.id.etPasswordJR);
        btnRegisterJR = (Button) findViewById(R.id.btnRegisterJR);

        builder = new AlertDialog.Builder(JudgeRegistration.this);

        btnRegisterJR.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                fNameJR = etfNameJR.getText().toString();
                mNameJR = etmNameJR.getText().toString();
                lNameJR = etlNameJR.getText().toString();
                EmailJR = etEmailJR.getText().toString();
                PhnJR = etPhnJR.getText().toString();
                AadharJR = etAadharJR.getText().toString();
                AddressJR = etAddressJR.getText().toString();
                AdCityJR = etAdCityJR.getText().toString();
                AdPincodeJR = etAdPincodeJR.getText().toString();
                AdStateJR = etAdStateJR.getText().toString();
                //EnrollNoJR = etEnrollNoJR.getText().toString();
                GenderJR = etGenderJR.getText().toString();
                DobJR = etDobJR.getText().toString();
                //SpclJR = etSpclJR.getText().toString();
                PasswordJR = etPasswordJR.getText().toString();

                StringRequest stringRequest = new StringRequest(Request.Method.POST, server_url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(final String response) {

                        builder.setTitle("Server Response");
                        builder.setMessage("Response :"+response.trim());
                        builder.setPositiveButton("OK", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {

                                etfNameJR.setText("");
                                etmNameJR.setText("");
                                etlNameJR.setText("");
                                etEmailJR.setText("");
                                etPhnJR.setText("");
                                etAadharJR.setText("");
                                etAddressJR.setText("");
                                etAdCityJR.setText("");
                                etAdPincodeJR.setText("");
                                etAdStateJR.setText("");
                                //etEnrollNoJR.setText("");
                                etGenderJR.setText("");
                                etDobJR.setText("");
                                //etSpclJR.setText("");
                                etPasswordJR.setText("");

                                etfNameJR.setHint("First Name");
                                etmNameJR.setHint("Middle Name");
                                etlNameJR.setHint("Last Name");
                                etEmailJR.setHint("Email");
                                etPhnJR.setHint("Phone");
                                etAadharJR.setHint("Aadhar");
                                etAddressJR.setHint("Correspond Address");
                                etAdCityJR.setHint("City");
                                etAdPincodeJR.setHint("Pin Code");
                                etAdStateJR.setHint("State");
                                //etEnrollNoJR.setHint("Enrollment No");
                                etGenderJR.setHint("Gender");
                                etDobJR.setHint("DOB(Date of Birth)");
                                //etSpclJR.setHint("Specialization");
                                etPasswordJR.setHint("Password");
                                Toast.makeText(getApplicationContext(),response.trim(),Toast.LENGTH_SHORT).show();

                                String result = response.trim();

                                if(result.equals("Data inserted successfully....")){
                                    Intent in = new Intent(getApplicationContext(), JudgeHome.class);
                                    startActivity(in);
                                }

                            }
                        });
                        AlertDialog alertDialog = builder.create();
                        alertDialog.show();

                    }
                }

                        , new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(JudgeRegistration.this,"Some error found ....."+error,Toast.LENGTH_SHORT).show();

                        error.printStackTrace();


                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map <String,String> Params = new HashMap<String, String>();


                        Params.put("fNameJR", fNameJR);
                        Params.put("mNameJR", mNameJR);
                        Params.put("lNameJR", lNameJR);
                        Params.put("EmailJR", EmailJR);
                        Params.put("PhnJR", PhnJR);
                        Params.put("AadharJR", AadharJR);
                        Params.put("AddressJR", AddressJR);
                        Params.put("AdCityJR", AdCityJR);
                        Params.put("AdPincodeJR", AdPincodeJR);
                        Params.put("AdStateJR", AdStateJR);
                        //Params.put("EnrollNoJR", EnrollNoJR);
                        Params.put("GenderJR", GenderJR);
                        Params.put("DobJR", DobJR);
                        //Params.put("SpclJR", SpclJR);
                        Params.put("PasswordJR",PasswordJR);

                        return Params;

                    }
                };
                Syncing.getInstance(JudgeRegistration.this).addTorequestque(stringRequest);
            }
        });
    }
    private void showToast(String t){
        Toast.makeText(JudgeRegistration.this,t,Toast.LENGTH_SHORT).show();
    }
    public boolean test(String test_string){
        if(test_string.matches(""))
            return true;
        return false;
    }
}
