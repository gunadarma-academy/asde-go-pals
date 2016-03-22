package com.gopals.pals_project;

import android.app.Activity;
import android.location.Location;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.widget.Toast;

import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.GoogleApiClient.ConnectionCallbacks;
import com.google.android.gms.common.api.GoogleApiClient.OnConnectionFailedListener;
import com.google.android.gms.location.FusedLocationProviderApi;
import com.google.android.gms.location.LocationListener;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationServices;

public class FusedLocationServices implements ConnectionCallbacks,
		OnConnectionFailedListener, LocationListener {

	private GoogleApiClient googleApiClient;
	private FusedLocationProviderApi fusedLocationProviderApi = LocationServices.FusedLocationApi;
	Activity locationActivity;
	private Location location;

	public FusedLocationServices(Activity locationActivity) {
		this.locationActivity = locationActivity;
		googleApiClient = new GoogleApiClient.Builder(locationActivity)
				.addApi(LocationServices.API).addConnectionCallbacks(this)
				.addOnConnectionFailedListener(this).build();
		if (googleApiClient != null) {
			googleApiClient.connect();
		}
	}

	public Location getLocation() {
		return this.location;
	}

	@Override
	public void onConnectionFailed(@NonNull ConnectionResult arg0) {
		// TODO Auto-generated method stub
		Toast.makeText(locationActivity, "On Connection Failed",
				Toast.LENGTH_SHORT).show();
	}

	@Override
	public void onConnected(@Nullable Bundle arg0) {
		// TODO Auto-generated method stub
		Location currentLocation = fusedLocationProviderApi
				.getLastLocation(googleApiClient);
		if (currentLocation != null) {
			onLocationChanged(currentLocation);
		}
		LocationRequest request = LocationRequest.create();
		request.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
		request.setInterval(20000);
		request.setFastestInterval(10000);
		fusedLocationProviderApi.requestLocationUpdates(googleApiClient,
				request, this);
	}

	@Override
	public void onConnectionSuspended(int arg0) {
		// TODO Auto-generated method stub
		Toast.makeText(locationActivity, "Connection Suspended",
				Toast.LENGTH_LONG);
	}

	@Override
	public void onLocationChanged(Location location) {
		// TODO Auto-generated method stub
		this.location = location;

	}

}
