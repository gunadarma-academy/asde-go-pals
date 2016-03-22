package com.gopals.pals_project;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class MainMenu extends Activity implements OnClickListener {
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.mainmenu);
		Button bATM = (Button) findViewById(R.id.btn_atm);
		Button bGasStation = (Button) findViewById(R.id.btn_gasStation);
		Button bRepairShop = (Button) findViewById(R.id.btn_repairShop);
		Button bAddLoc = (Button) findViewById(R.id.btn_addLocation);

		bATM.setOnClickListener(this);
		bGasStation.setOnClickListener(this);
		bRepairShop.setOnClickListener(this);
		bAddLoc.setOnClickListener(this);
	}

	@Override
	public void onClick(View v) {
		switch (v.getId()) {

		case R.id.btn_atm:
			Intent atm = new Intent(MainMenu.this, ATM.class);
			startActivity(atm);
			break;
		case R.id.btn_gasStation:
			Intent gasStation = new Intent(MainMenu.this, GasStation.class);
			startActivity(gasStation);
			break;
		case R.id.btn_repairShop:
			Intent repairShop = new Intent(MainMenu.this, RepairShop.class);
			startActivity(repairShop);
			break;
		case R.id.btn_addLocation:
			Intent addLoc = new Intent(MainMenu.this, AddLocation.class);
			startActivity(addLoc);
			break;
		default:
			break;
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		switch (id) {
		case R.id.about:
			Intent about = new Intent(MainMenu.this, About.class);
			startActivity(about);
			break;
		case R.id.help:
			Intent help = new Intent(MainMenu.this, Help.class);
			startActivity(help);
			break;
		default:
			break;
		}

		return super.onOptionsItemSelected(item);
	}

}
