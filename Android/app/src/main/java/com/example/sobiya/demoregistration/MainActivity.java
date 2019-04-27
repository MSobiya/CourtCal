package com.example.sobiya.demoregistration;

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

public class MainActivity extends AppCompatActivity {

    String server_url = URLPath.Path+"LawyerRegistration.php";
    AlertDialog.Builder builder;

    String fNameLR, mNameLR, lNameLR, EmailLR, PhnLR, AadharLR, AddressLR, AdCityLR, AdPincodeLR, AdStateLR, GenderLR, DobLR, PasswordLR;

    EditText etfNameLR, etmNameLR, etlNameLR, etEmailLR, etPhnLR, etAadharLR, etAddressLR, etAdCityLR, etAdPincodeLR, etAdStateLR, etGenderLR, etDobLR, etPasswordLR;

    Button btnRegisterLR;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etfNameLR = (EditText) findViewById(R.id.etfNameLR);
        etmNameLR = (EditText) findViewById(R.id.etmNameLR);
        etlNameLR = (EditText) findViewById(R.id.etlNameLR);
        etEmailLR = (EditText) findViewById(R.id.etEmailLR);
        etPhnLR = (EditText) findViewById(R.id.etPhnLR);
        etAadharLR = (EditText) findViewById(R.id.etAadharLR);
        etAddressLR = (EditText) findViewById(R.id.etAddressLR);
        etAdCityLR = (EditText) findViewById(R.id.etAdCityLR);
        etAdPincodeLR = (EditText) findViewById(R.id.etAdPincodeLR);
        etAdStateLR = (EditText) findViewById(R.id.etAdStateLR);
        //etEnrollNoLR = (EditText) findViewById(R.id.etEnrollNoLR);
        etGenderLR = (EditText) findViewById(R.id.etGenderLR);
        etDobLR = (EditText) findViewById(R.id.etDobLR);
        //etSpclLR = (EditText) findViewById(R.id.etSpclLR);
        etPasswordLR = (EditText) findViewById(R.id.etPasswordLR);
        btnRegisterLR = (Button) findViewById(R.id.btnRegisterLR);

        builder = new AlertDialog.Builder(MainActivity.this);

        btnRegisterLR.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                fNameLR = etfNameLR.getText().toString();
                mNameLR = etmNameLR.getText().toString();
                lNameLR = etlNameLR.getText().toString();
                EmailLR = etEmailLR.getText().toString();
                PhnLR = etPhnLR.getText().toString();
                AadharLR = etAadharLR.getText().toString();
                AddressLR = etAddressLR.getText().toString();
                AdCityLR = etAdCityLR.getText().toString();
                AdPincodeLR = etAdPincodeLR.getText().toString();
                AdStateLR = etAdStateLR.getText().toString();
                //EnrollNoLR = etEnrollNoLR.getText().toString();
                GenderLR = etGenderLR.getText().toString();
                DobLR = etDobLR.getText().toString();
                //SpclLR = etSpclLR.getText().toString();
                PasswordLR = etPasswordLR.getText().toString();

                StringRequest stringRequest = new StringRequest(Request.Method.POST, server_url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        builder.setTitle("Server Response");
                        builder.setMessage("Response :"+response);
                        builder.setPositiveButton("OK", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {

                                etfNameLR.setText("");
                                etmNameLR.setText("");
                                etlNameLR.setText("");
                                etEmailLR.setText("");
                                etPhnLR.setText("");
                                etAadharLR.setText("");
                                etAddressLR.setText("");
                                etAdCityLR.setText("");
                                etAdPincodeLR.setText("");
                                etAdStateLR.setText("");
                                //etEnrollNoLR.setText("");
                                etGenderLR.setText("");
                                etDobLR.setText("");
                                //etSpclLR.setText("");
                                etPasswordLR.setText("");

                                etfNameLR.setHint("First Name");
                                etmNameLR.setHint("Middle Name");
                                etlNameLR.setHint("Last Name");
                                etEmailLR.setHint("Email");
                                etPhnLR.setHint("Phone");
                                etAadharLR.setHint("Aadhar");
                                etAddressLR.setHint("Correspond Address");
                                etAdCityLR.setHint("City");
                                etAdPincodeLR.setHint("Pin Code");
                                etAdStateLR.setHint("State");
                                //etEnrollNoLR.setHint("Enrollment No");
                                etGenderLR.setHint("Gender");
                                etDobLR.setHint("DOB(Date of Birth)");
                                //etSpclLR.setHint("Specialization");
                                etPasswordLR.setHint("Password");

                            }
                        });
                        AlertDialog alertDialog = builder.create();
                        alertDialog.show();

                    }
                }

                        , new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(MainActivity.this,"Some error found ....."+error,Toast.LENGTH_SHORT).show();
                        error.printStackTrace();


                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map <String,String> Params = new HashMap<String, String>();


                        Params.put("fNameLR", fNameLR);
                        Params.put("mNameLR", mNameLR);
                        Params.put("lNameLR", lNameLR);
                        Params.put("EmailLR", EmailLR);
                        Params.put("PhnLR", PhnLR);
                        Params.put("AadharLR", AadharLR);
                        Params.put("AddressLR", AddressLR);
                        Params.put("AdCityLR", AdCityLR);
                        Params.put("AdPincodeLR", AdPincodeLR);
                        Params.put("AdStateLR", AdStateLR);
                        //Params.put("EnrollNoLR", EnrollNoLR);
                        Params.put("GenderLR", GenderLR);
                        Params.put("DobLR", DobLR);
                        //Params.put("SpclLR", SpclLR);
                        Params.put("PasswordLR",PasswordLR);

                        return Params;

                    }
                };
                Syncing.getInstance(MainActivity.this).addTorequestque(stringRequest);
            }
        });
    }
    private void showToast(String t){
        Toast.makeText(MainActivity.this,t,Toast.LENGTH_SHORT).show();
    }
    public boolean test(String test_string){
        if(test_string.matches(""))
            return true;
        return false;
    }
}
