package com.example.sobiya.demoregistration;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;

public class Session {
    private SharedPreferences prefs;

    public Session(Context cntx) {
        // TODO Auto-generated constructor stub
        prefs = PreferenceManager.getDefaultSharedPreferences(cntx);
    }

    public void setEmail(String usename) {
        prefs.edit().putString("email", usename).commit();
    }

    public String getEmail() {
        String usename = prefs.getString("email","");
        return usename;
    }

    public void setPassword(String password) {
        prefs.edit().putString("password", password).commit();
    }

    public String getPassword() {
        String usename = prefs.getString("password","");
        return usename;
    }

    public void setCaseId(String case_id) {
        prefs.edit().putString("case_id", case_id).commit();
    }

    public String getCaseId() {
        String usename = prefs.getString("case_id","");
        return usename;
    }

    public void setRole(String role) {
        prefs.edit().putString("role", role).commit();
    }

    public String getRole() {
        String usename = prefs.getString("role","");
        return usename;
    }

    public void setClientEmail(String client_email) {
        prefs.edit().putString("client_email", client_email).commit();
    }

    public String getClientEmail() {
        String usename = prefs.getString("client_email","");
        return usename;
    }

    public void setSimilarCase_id(String similar_case_id) {
        prefs.edit().putString("similar_case_id", similar_case_id).commit();
    }

    public String getSimilarCase_id() {
        String usename = prefs.getString("similar_case_id","");
        return usename;
    }

    public void delPref() {
        prefs.edit().clear().commit();
    }

    public int getSize() {
        return prefs.getAll().size();
    }



}
