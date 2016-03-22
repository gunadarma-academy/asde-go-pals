package com.gopals.pals_project;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class ATM extends Activity {
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.atm);
		
		Button bATM = (Button) findViewById(R.id.btn_findATM);
		bATM.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent findAtm = new Intent(ATM.this, MainActivity.class);
				startActivity(findAtm);
				
			}
		});
		
	}
}
