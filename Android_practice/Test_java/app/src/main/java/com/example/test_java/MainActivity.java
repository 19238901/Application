package com.example.test_java;

import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;
import com.google.android.material.tabs.TabLayout;

import androidx.viewpager.widget.ViewPager;
import androidx.appcompat.app.AppCompatActivity;

import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

import com.example.test_java.ui.main.SectionsPagerAdapter;
import com.example.test_java.databinding.ActivityMainBinding;

public class MainActivity extends AppCompatActivity {
    private TabLayout tabLayout;
    private int[] tabIcons = {
            R.drawable.ic_tab_document,
            R.drawable.ic_tab_calender,
            R.drawable.ic_tab_medical,
            R.drawable.ic_tab_call,
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        SectionsPagerAdapter sectionsPagerAdapter = new SectionsPagerAdapter(this, getSupportFragmentManager());

        ViewPager viewPager = findViewById(R.id.view_pager);
        viewPager.setAdapter(sectionsPagerAdapter);

        getSupportActionBar().setTitle(null);

        //TabLayout tabs = findViewById(R.id.tabs);
        //tabs.setupWithViewPager(viewPager);
        tabLayout = (TabLayout) findViewById(R.id.tabs);
        tabLayout.setupWithViewPager(viewPager);

        setUpTabIcon();
    }

    private void setUpTabIcon() {
        tabLayout.getTabAt(0).setIcon(tabIcons[0]);
        tabLayout.getTabAt(1).setIcon(tabIcons[1]);
        tabLayout.getTabAt(2).setIcon(tabIcons[2]);
        tabLayout.getTabAt(3).setIcon(tabIcons[3]);
    }
}