package com.gopals.pals_project;

import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.GoogleApiAvailability;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.GoogleApiClient.ConnectionCallbacks;
import com.google.android.gms.common.api.GoogleApiClient.OnConnectionFailedListener;
import com.google.android.gms.location.FusedLocationProviderApi;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdate;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;

import android.app.Activity;
import android.content.Context;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.FragmentActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Toast;

public class MainActivity extends FragmentActivity implements
		OnMapReadyCallback, ConnectionCallbacks, OnConnectionFailedListener {

	private static final int PLAY_SERVICES_RESOLUTION_REQUEST = 9001;
	GoogleMap mMap;
	private GoogleApiClient googleApiClient;
	private FusedLocationProviderApi fusedLocationProviderApi = LocationServices.FusedLocationApi;
	private Location mLastLocation;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		if (isGoogleServicesOK()) {
			setContentView(R.layout.activity_main);
			SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
					.findFragmentById(R.id.map);
			mapFragment.getMapAsync(this);
			if (googleApiClient == null) {
				googleApiClient = new GoogleApiClient.Builder(this)
						.addConnectionCallbacks(this)
						.addOnConnectionFailedListener(this)
						.addApi(LocationServices.API).build();
			}
			
			

		} else {
			finish();
		}

	}
	


	private boolean isGoogleServicesOK() {
		// TODO Auto-generated method stub
		GoogleApiAvailability googleAPI = GoogleApiAvailability.getInstance();
		int result = googleAPI.isGooglePlayServicesAvailable(this);
		if (result != ConnectionResult.SUCCESS) {
			if (googleAPI.isUserResolvableError(result)) {
				googleAPI.getErrorDialog(this, result,
						PLAY_SERVICES_RESOLUTION_REQUEST).show();
			}

			return false;
		}

		return true;

	}

	@Override
	public void onMapReady(GoogleMap googleMap) {
		// TODO Auto-generated method stub
		mMap = googleMap;

	}

	@Override
	public void onConnectionFailed(@NonNull ConnectionResult arg0) {
		// TODO Auto-generated method stub

	}

	@Override
	public void onConnected(@Nullable Bundle arg0) {
		// TODO Auto-generated method stub
		mLastLocation = LocationServices.FusedLocationApi
				.getLastLocation(googleApiClient);
		
		if (mLastLocation != null) {
			LatLng ll = new LatLng(mLastLocation.getLatitude(), mLastLocation.getLongitude());
			CameraUpdate update = CameraUpdateFactory.newLatLngZoom(ll, 15);
			mMap.animateCamera(update);
		}else{
			Toast.makeText(getApplicationContext(), "Location null", Toast.LENGTH_SHORT).show();
		}

	}

	@Override
	public void onConnectionSuspended(int arg0) {
		// TODO Auto-generated method stub

	}

	protected void onStart() {
		googleApiClient.connect();
		super.onStart();
	}

	protected void onStop() {
		googleApiClient.disconnect();
		super.onStop();
	}

}
