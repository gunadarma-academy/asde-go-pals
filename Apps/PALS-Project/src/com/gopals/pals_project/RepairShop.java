package com.gopals.pals_project;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class RepairShop extends Activity {
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.repair_shop);

		Button bRepairShop = (Button) findViewById(R.id.btn_findrepairshop);
		bRepairShop.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent findRepairShop = new Intent(RepairShop.this, MainActivity.class);
				startActivity(findRepairShop);
			}
		});
	}
}
