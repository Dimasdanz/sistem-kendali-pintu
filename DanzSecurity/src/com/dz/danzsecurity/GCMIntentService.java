package com.dz.danzsecurity;

import static com.dz.danzsecurity.CommonUtilities.SENDER_ID;
import static com.dz.danzsecurity.CommonUtilities.displayMessage;
import android.support.v4.app.NotificationCompat;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.util.Log;

import com.google.android.gcm.GCMBaseIntentService;

public class GCMIntentService extends GCMBaseIntentService {

	private static final String TAG = "GCMIntentService";
	static LoginCredentials lc;

	public GCMIntentService() {
		super(SENDER_ID);
	}

	/**
	 * Method called on device registered
	 **/
	@Override
	protected void onRegistered(Context context, String registrationId) {
		Log.i(TAG, "Device registered: regId = " + registrationId);
		displayMessage(context, "Your device registred with GCM");
		Log.d("NAME", MainActivity.username);
		ServerUtilities
				.register(context, MainActivity.username, registrationId);
	}

	/**
	 * Method called on device un registred
	 * */
	@Override
	protected void onUnregistered(Context context, String registrationId) {
		Log.i(TAG, "Device unregistered");
		displayMessage(context, getString(R.string.gcm_unregistered));
		ServerUtilities.unregister(context, registrationId);
	}

	/**
	 * Method called on Receiving a new message
	 * */
	@Override
	protected void onMessage(Context context, Intent intent) {
		Log.i(TAG, "Received message");
		String message = intent.getExtras().getString("notif");

		displayMessage(context, message);
		// notifies user
		generateNotification(context, message);
	}

	/**
	 * Method called on receiving a deleted message
	 * */
	@Override
	protected void onDeletedMessages(Context context, int total) {
		Log.i(TAG, "Received deleted messages notification");
		String message = getString(R.string.gcm_deleted, total);
		displayMessage(context, message);
		// notifies user
		generateNotification(context, message);
	}

	/**
	 * Method called on Error
	 * */
	@Override
	public void onError(Context context, String errorId) {
		Log.i(TAG, "Received error: " + errorId);
		displayMessage(context, getString(R.string.gcm_error, errorId));
	}

	@Override
	protected boolean onRecoverableError(Context context, String errorId) {
		// log message
		Log.i(TAG, "Received recoverable error: " + errorId);
		displayMessage(context,
				getString(R.string.gcm_recoverable_error, errorId));
		return super.onRecoverableError(context, errorId);
	}

	/**
	 * Issues a notification to inform the user that server has sent a message.
	 */
	private static void generateNotification(Context context, String message) {
		lc = new LoginCredentials(context.getApplicationContext());
		long when = System.currentTimeMillis();
		String notificationContent = message;
		String notificationTitle = "System Log";
		// large icon for notification,normally use App icon
		Bitmap largeIcon = BitmapFactory.decodeResource(context.getResources(),
				R.drawable.ic_launcher);
		int smalIcon = R.drawable.ic_launcher;

		/*
		 * create intent for show notification details when user clicks
		 * notification
		 */
		Intent intent = new Intent(context.getApplicationContext(),
				SystemLogActivity.class);

		/* create unique this intent from other intent using setData */
		intent.setData(Uri.parse("content://" + when));
		/*
		 * create new task for each notification with pending intent so we set
		 * Intent.FLAG_ACTIVITY_NEW_TASK
		 */
		PendingIntent pendingIntent = PendingIntent.getActivity(
				context.getApplicationContext(), 0, intent,
				Intent.FLAG_ACTIVITY_NEW_TASK);

		/* get the system service that manage notification NotificationManager */
		NotificationManager notificationManager = (NotificationManager) context
				.getApplicationContext().getSystemService(
						Context.NOTIFICATION_SERVICE);

		/* build the notification */
		NotificationCompat.Builder notificationBuilder = new NotificationCompat.Builder(
				context.getApplicationContext())
				.setWhen(when)
				.setContentText(notificationContent)
				.setContentTitle(notificationTitle)
				.setSmallIcon(smalIcon)
				.setAutoCancel(true)
				.setTicker(notificationTitle)
				.setLargeIcon(largeIcon)
				.setDefaults(
						Notification.DEFAULT_LIGHTS
								| Notification.DEFAULT_VIBRATE
								| Notification.DEFAULT_SOUND)
				.setContentIntent(pendingIntent);

		/* Create notification with builder */
		Notification notification = notificationBuilder.build();

		/*
		 * sending notification to system.Here we use unique id (when)for making
		 * different each notification if we use same id,then first notification
		 * replace by the last notification
		 */
		if (lc.isLoggedIn()) {
			notificationManager.notify(0, notification);
		}
	}

}
