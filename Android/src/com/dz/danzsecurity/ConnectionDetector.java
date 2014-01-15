package com.dz.danzsecurity;

import static com.dz.danzsecurity.CommonUtilities.SERVER_DOMAIN;
import java.io.IOException;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

public class ConnectionDetector {

	private Context _context;

	public ConnectionDetector(Context context) {
		this._context = context;
	}

	public boolean isConnectingToInternet() {
		ConnectivityManager connectivity = (ConnectivityManager) _context
				.getSystemService(Context.CONNECTIVITY_SERVICE);
		if (connectivity != null) {
			NetworkInfo[] info = connectivity.getAllNetworkInfo();
			if (info != null)
				for (int i = 0; i < info.length; i++)
					if (info[i].getState() == NetworkInfo.State.CONNECTED) {
						return true;
					}

		}
		return false;
	}
	
	public static boolean IsReachable(Context context) {
		Process p1;
		try {
			p1 = java.lang.Runtime.getRuntime().exec("ping -c 1 "+SERVER_DOMAIN);
			int returnVal = p1.waitFor();
			boolean reachable = (returnVal==0);
			if(reachable){
				return false;				
			}
			else{
				return true;				
			}
		} catch (IOException e) {
			e.printStackTrace();
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
		return true;
	}
}
