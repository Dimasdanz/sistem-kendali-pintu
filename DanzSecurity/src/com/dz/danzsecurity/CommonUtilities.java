package com.dz.danzsecurity;

import android.content.Context;
import android.content.Intent;

public final class CommonUtilities {

	static final String SERVER_URL = "http://192.168.10.1/danzsecurity/android";
	static final String SERVER_REGISTER = "/register.php";
	static final String SERVER_LOGIN = "/login.php";
	static final String SERVER_GETSYSLOG = "/get_system_log.php";
	static final String SERVER_GETDEVSTAT = "/get_device_status.php";
	static final String SERVER_DOMAIN = "http://192.168.10.1";

	static final String SENDER_ID = "635594376353";

	static final String TAG = "Danz Security";

	static final String DISPLAY_MESSAGE_ACTION = "com.dz.danzsecurity.DISPLAY_MESSAGE";

	static final String EXTRA_MESSAGE = "message";

	static void displayMessage(Context context, String message) {
		Intent intent = new Intent(DISPLAY_MESSAGE_ACTION);
		intent.putExtra(EXTRA_MESSAGE, message);
		context.sendBroadcast(intent);
	}
}
