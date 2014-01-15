package com.dz.danzsecurity;

import static com.dz.danzsecurity.CommonUtilities.SERVER_URL;
import static com.dz.danzsecurity.CommonUtilities.SERVER_GETDEVSTAT;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.ActionBar;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;

public class DeviceStatusActivity extends Activity {

	TextView txtCondition;
	TextView txtStatus;
	TextView txtAttempts;

	// Progress Dialog
	private ProgressDialog pDialog;

	// JSON parser class
	JSONParser jsonParser = new JSONParser();

	// JSON Node names
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_DEVSTATUS = "device_status";
	private static final String TAG_CONDITION = "condition";
	private static final String TAG_STATUS = "status";
	private static final String TAG_ATTEMPTS = "password_attempts";

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.device_status);

		ActionBar actionBar = getActionBar();
		actionBar.setDisplayHomeAsUpEnabled(true);

		new GetDeviceStatus().execute();
	}

	/**
	 * Background Async Task to Get complete product details
	 * */
	class GetDeviceStatus extends AsyncTask<Void, Void, Boolean> {
		String condition;
		String status;
		String password_attempts;

		/**
		 * Before starting background thread Show Progress Dialog
		 * */
		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(DeviceStatusActivity.this);
			pDialog.setMessage("Loading device status. Please wait...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		/**
		 * Getting product details in background thread
		 * */
		protected Boolean doInBackground(Void... args) {
			int success;
			try {
				// Building Parameters

				List<NameValuePair> param = new ArrayList<NameValuePair>();
				// getting product details by making HTTP request
				// Note that product details url will use GET request
				JSONObject json = jsonParser.makeHttpRequest(SERVER_URL
						+ SERVER_GETDEVSTAT, "GET", param);

				// check your log for json response
				Log.d("Device Status", json.toString());

				// json success tag
				success = json.getInt(TAG_SUCCESS);
				if (success == 1) {

					JSONArray devicestatus = json.getJSONArray(TAG_DEVSTATUS); // JSON
																				// Array
					Log.v("success", TAG_DEVSTATUS);

					JSONObject devstat = devicestatus.getJSONObject(0);

					condition = devstat.getString(TAG_CONDITION);
					status = devstat.getString(TAG_STATUS);
					password_attempts = devstat.getString(TAG_ATTEMPTS);
				} else {
					return false;
				}
				return true;
			} catch (JSONException e) {
				e.printStackTrace();
				return false;
			}
		}

		/**
		 * After completing background task Dismiss the progress dialog
		 * **/
		protected void onPostExecute(Boolean result) {
			// dismiss the dialog once got all details
			if (result) {
				txtCondition = (TextView) findViewById(R.id.condition);
				txtStatus = (TextView) findViewById(R.id.status);
				txtAttempts = (TextView) findViewById(R.id.attempts);

				txtCondition.setText(condition);
				txtStatus.setText(status);
				txtAttempts.setText(password_attempts);
			} else {
				Intent i = new Intent(getApplicationContext(),
						MainActivity.class);
				startActivity(i);
			}
			pDialog.dismiss();
		}
	}
}
