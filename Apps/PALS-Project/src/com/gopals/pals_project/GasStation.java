package com.gopals.pals_project;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class GasStation extends Activity {
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.gas_station);

		Button bGasStation = (Button) findViewById(R.id.btn_findGasStation);
		bGasStation.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent findGasStation = new Intent(GasStation.this, MainActivity.class);
				startActivity(findGasStation);
				
			}
		});
	}
}
