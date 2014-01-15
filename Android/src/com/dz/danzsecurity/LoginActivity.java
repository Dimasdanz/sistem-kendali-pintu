package com.dz.danzsecurity;

import static com.dz.danzsecurity.CommonUtilities.SENDER_ID;
import static com.dz.danzsecurity.CommonUtilities.SERVER_LOGIN;
import static com.dz.danzsecurity.CommonUtilities.SERVER_URL;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class LoginActivity extends Activity {

	private ProgressDialog pDialog;

	JSONParser jsonParser = new JSONParser();
	private static final String TAG_SUCCESS = "success";

	// alert dialog manager
	AlertDialogManager alert = new AlertDialogManager();

	// Internet detector
	ConnectionDetector cd;
	LoginCredentials lc;

	// UI elements
	EditText txtUsername;
	EditText txtPassword;

	// Register button
	Button btnRegister;

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_login);

		cd = new ConnectionDetector(getApplicationContext());
		lc = new LoginCredentials(getApplicationContext());

		txtUsername = (EditText) findViewById(R.id.txtUsername);
		txtPassword = (EditText) findViewById(R.id.txtPassword);
		btnRegister = (Button) findViewById(R.id.btnLogin);

		if (!cd.isConnectingToInternet()) {
			alert.showAlertDialog(LoginActivity.this,
					"Internet Connection Error",
					"Please connect to working Internet connection", false);
			return;
		}
		
		if(!ConnectionDetector.IsReachable(getApplicationContext())){
			alert.showAlertDialog(LoginActivity.this,
					"Server Connection Error",
					"Our server might be down, please try again in a few minutes", false);
			return;
		}
		
		

		lc.checkLogin();

		if (SERVER_URL == null || SENDER_ID == null || SERVER_URL.length() == 0
				|| SENDER_ID.length() == 0) {
			alert.showAlertDialog(LoginActivity.this, "Configuration Error!",
					"Please set your Server URL and GCM Sender ID", false);
			return;
		}

		btnRegister.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View arg0) {
				// Read EditText data
				String name = txtUsername.getText().toString();
				String email = txtPassword.getText().toString();

				// Check if user filled the form
				if (name.trim().length() > 0 && email.trim().length() > 0) {
					new Login().execute();
				} else {
					alert.showAlertDialog(LoginActivity.this,
							"Registration Error!", "Please enter your details",
							false);
				}
			}
		});
	}

	class Login extends AsyncTask<String, String, Boolean> {
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(LoginActivity.this);
			pDialog.setMessage("Logging in...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		protected Boolean doInBackground(String... args) {
			String username = txtUsername.getText().toString();
			String password = txtPassword.getText().toString();
			// Building Parameters
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("username", username));
			params.add(new BasicNameValuePair("password", password));

			// getting JSON Object
			// Note that create product url accepts POST method
			JSONObject json = jsonParser.makeHttpRequest(SERVER_URL
					+ SERVER_LOGIN, "POST", params);

			// check log cat fro response
			Log.d("Create Response", json.toString());

			// check for success tag
			try {
				int success = json.getInt(TAG_SUCCESS);

				if (success == 1) {
					pDialog.dismiss();
					lc.createLoginSession(username);
					Intent i = new Intent(getApplicationContext(),
							MainActivity.class);
					i.putExtra("username", username);
					startActivity(i);
					finish();
					return true;
				} else {
					return false;
				}
			} catch (JSONException e) {
				e.printStackTrace();
			}
			return null;
		}

		protected void onPostExecute(Boolean result) {
			// dismiss the dialog once done
			if (!result) {
				Toast.makeText(getApplicationContext(),
						"Username and/or password is wrong", Toast.LENGTH_LONG)
						.show();
			} else {
				Toast.makeText(getApplicationContext(), "Login successful",
						Toast.LENGTH_LONG).show();
			}
			pDialog.dismiss();
		}
	}
	protected void onDestroy() {
		super.onDestroy();
	}
}
