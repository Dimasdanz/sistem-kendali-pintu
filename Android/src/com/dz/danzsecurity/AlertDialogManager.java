package com.dz.danzsecurity;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;

public class AlertDialogManager {

	public void showAlertDialog(final Context context, String title,
			String message, Boolean status) {
		/*
		 * AlertDialog alertDialog = new AlertDialog.Builder(context).create();
		 * 
		 * // Setting Dialog Title alertDialog.setTitle(title);
		 * 
		 * // Setting Dialog Message alertDialog.setMessage(message);
		 * 
		 * 
		 * 
		 * // Setting OK Button alertDialog.setButton("OK", new
		 * DialogInterface.OnClickListener() { public void
		 * onClick(DialogInterface dialog, int which) { }
		 * 
		 * alertDialog.show(); });
		 */

		AlertDialog.Builder builder = new AlertDialog.Builder(context);
		builder.setTitle(title)
				.setMessage(message)
				.setCancelable(false)
				.setNegativeButton("Close",
						new DialogInterface.OnClickListener() {
							public void onClick(DialogInterface dialog, int id) {
								Activity a = (Activity) context;
								a.finish();
							}
						});
		if (status != null) {
			builder.setIcon((status) ? R.drawable.success : R.drawable.fail);
		}
		AlertDialog alert = builder.create();
		alert.show();
	}
}
