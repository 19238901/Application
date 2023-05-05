package com.example.highandlow

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import kotlinx.android.synthetic.main.activity_main.*

class MainActivity : AppCompatActivity() {
    private val tas = "High and Low"
    private var yourCard = 0
    private var droidCard = 0
    private var hitCount = 0
    private var loseCount = 0
    private var gameStart = false
    private var answered = false

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        highBtn.setOnClickListener {
            if ((gameStart && !answered)) {
                highAndLow('h')
            }
        }
        lowBtn.setOnClickListener {
            if ((gameStart && !answered)) {
                highAndLow('l')
            }
        }
        nextBtn.setOnClickListener {
            if (gameStart) {
                drawCard()
            }
        }
    }

    override fun onResume() {
        super.onResume()
        hitCount = 0
        loseCount = 0
        hitText.text = getString(R.string.high_text)
        loseText.text = getString(R.string.lose_text1)
        gameStart = true
        drawCard()
    }
    private fun drawCard(){
        yourCardImage.setImageResource(R.drawable.z02)
        droidCardImage.setImageResource(R.drawable.z01)

        yourCard = (1..13).random()
        when (yourCard) {
            1 -> yourCardImage.setImageResource(R.drawable.d01)
            2 -> yourCardImage.setImageResource(R.drawable.d02)
            3 -> yourCardImage.setImageResource(R.drawable.d03)
            4 -> yourCardImage.setImageResource(R.drawable.d04)
            5 -> yourCardImage.setImageResource(R.drawable.d05)
            6 -> yourCardImage.setImageResource(R.drawable.d06)
            7 -> yourCardImage.setImageResource(R.drawable.d07)
            8 -> yourCardImage.setImageResource(R.drawable.d08)
            9 -> yourCardImage.setImageResource(R.drawable.d09)
            10 -> yourCardImage.setImageResource(R.drawable.d10)
            11 -> yourCardImage.setImageResource(R.drawable.d11)
            12 -> yourCardImage.setImageResource(R.drawable.d12)
            13 -> yourCardImage.setImageResource(R.drawable.d13)
        }
        droidCard = (1..13).random()
        answered = false
    }

    private fun highAndLow(answer:Char) {
        showDroidCard()
        answered = true
        val balance = droidCard - yourCard

        if (balance == 0) {

        } else if ((balance > 0 && answer =='h')) {
            hitCount++
            hitText.text = getString(R.string.high_text) + hitCount
        } else if ((balance < 0 && answer == 'l')) {
            hitCount++
            hitText.text = getString(R.string.high_text) + hitCount
        } else {
            loseCount++
            loseText.text = getString(R.string.lose_text1) + loseCount
        }
        if (hitCount == 5) {
            resultText.text = "あなたの勝ちです。"
            gameStart = false
        } else if (loseCount == 5) {
            resultText.text = "あなたの負けです。"
            gameStart = false
        } else {

        }
    }
    private fun showDroidCard() {
        when (droidCard) {
            1 -> yourCardImage.setImageResource(R.drawable.c01)
            2 -> yourCardImage.setImageResource(R.drawable.c02)
            3 -> yourCardImage.setImageResource(R.drawable.c03)
            4 -> yourCardImage.setImageResource(R.drawable.c04)
            5 -> yourCardImage.setImageResource(R.drawable.c05)
            6 -> yourCardImage.setImageResource(R.drawable.c06)
            7 -> yourCardImage.setImageResource(R.drawable.c07)
            8 -> yourCardImage.setImageResource(R.drawable.c08)
            9 -> yourCardImage.setImageResource(R.drawable.c09)
            10 -> yourCardImage.setImageResource(R.drawable.c10)
            11 -> yourCardImage.setImageResource(R.drawable.c11)
            12 -> yourCardImage.setImageResource(R.drawable.c12)
            13 -> yourCardImage.setImageResource(R.drawable.c13)
        }
    }
}
