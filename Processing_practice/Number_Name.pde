float Numx, Numy, NumVx, NumVy; 
float Namx, Namy, NamVx, NamVy; 
int numcount, namcount, stacount;
int status, s1, s2;
int cl1 = 0, cl2 = 0;
void setup() {
  //画面を作成
  size(500, 400);  
  //画面の更新頻度 
  frameRate(30);    
  //学籍番号の初期位置
  Numx = 250;
  Numy = 200;
  //名前の初期位置
  Namx = 250;         
  Namy = 250;  
  //学籍番号の初速度      
  NumVx = 14;
  NumVy = 10;
  //名前の初速度
  NamVx = 12;
  NamVy = 26;
  //状態の設定
  status = 0;
  //カウンターの設定
  numcount = 0;
  namcount = 0;
  stacount = 0;
}
void draw() {
  //初期アニメーションの終了後
  if ((status != 0) && (stacount < 1000)) { 
    //透過度5、ネイビー色
    fill(51, 60, 94, 5);
    //塗りつぶしなし
    noStroke();
    rect(0, 0, width, height);
    //座標変換
    translate(random(width), random(height));
    rotate(random(PI));
    scale(random(0.1, 1.0));
    //描く図形の配列を定義
    int Stax[] = {50, 100, 65, 75, 85};
    int Stay[] = {15, 15, 30, 5, 30};
    //配列の座標を線で繋ぎ描写する
    translate(-50, -50);
    fill(255, 249, 153);
    beginShape();
    for (int i = 0; i < Stax.length; i++) {
      vertex(Stax[i] + random(-5, 5), Stay[i] + random(-5, 5));
    }
    endShape(CLOSE);
    //描画数を記憶する
    stacount = stacount + 1;
  } else if (stacount == 1000) { // 1000回星を描写した時（最終画面）
    //　テキストの表示
    String text = "Thank you for watching the movie until the END.";
    fill(225);
    text(text, 200, 250);
    String text_p = "19238901 明 石 華 実";
    fill(225);
    text(text_p, 200, 270);
  } else { //初期画面
    //灰色に塗りつぶす
    background(150); 
    //学籍番号と名前の位置を変更
    Numx = Numx + NumVx;       
    Numy = Numy + NumVy;
    Namx = Namx + NamVx;
    Namy = Namy + NamVy;
    //学籍番号と名前が壁に当たった時、跳ね返り、色と速度が変化するように設定
    if (Numx < 50) {
      NumVx = -NumVx;
      numcount = numcount + 1;
      cl1 = cl1 + 2;
    }
    if (Numx > 450) {
      NumVx = -NumVx;
      numcount = numcount + 1;
      cl1 = cl1 + 2;
    }
    if (Numy < 20) {
      NumVy = -NumVy;
      numcount = numcount + 1;
      cl1 = cl1 + 2;
    }
    if (Numy > 380) {
      NumVy = -NumVy;
      numcount = numcount + 1;
      cl1 = cl1 + 2;
    }
    if (Namx < 40) {
      NamVx = -NamVx;
      namcount = namcount + 1;
      cl2 = cl2 + 2;
    }
    if (Namx > 460) {
      NamVx = -NamVx;
      namcount = namcount + 1;
      cl2 = cl2 + 2;
    }
    if (Namy < 20) {
      NamVy = -NamVy;
      namcount = namcount + 1;
      cl2 = cl2 + 2;
    }
    if (Namy > 380) {
      NamVy = -NamVy;
      namcount = namcount + 1;
      cl2 = cl2 + 2;
    }
    //学籍番号と名前の配列を定義
    String[] NUMBER = {"1", "9", "2", "3", "8", "9", "0", "1"};
    String[] NAME = {"明", "石", "華", "実"};
    //学籍番号の表示
    for (int i = 0; i < NUMBER.length; i++) {
      fill(cl1);
      text(NUMBER[i], Numx + (i - 4) * 10, Numy);
    }
    //名前の表示
    for (int i = 0; i <NAME.length; i++) {
      fill(cl2);
      text(NAME[i], Namx + (i - 2) * 15, Namy);
    }
    //学籍番号と名前が壁に当たった回数を表示
    String txt1 = "NUMBER：" + numcount;
    String txt2 = "NAME：" + namcount;
    fill(0);
    text(txt1, 400, 50);
    fill(0);
    text(txt2, 400, 100);
    //学籍番号と名前が初期位置に戻ってきた時停止
    if (numcount != 0 || namcount != 0 ) {
      if (Numx == 250 && Numy == 200) {
        for (int i = 0; i < NUMBER.length; i++) {
          text(NUMBER[i], Numx + (i - 4) * 10, Numy);
        }
        NumVx = 0;
        NumVy = 0;
        cl1 =0;
        text("NUMBER finish!", 205, 300);
        s1 = 1;
      } else if (Namx == 250 && Namy == 225) {
        for (int i = 0; i <NAME.length; i++) {
          text(NAME[i], Namx + (i - 2) * 15, Namy);
        }
        NamVx = 0;
        NamVy = 0;
        cl2 = 0;
        text("NAME finish!", 212, 350);
        s2 = 1;
      }
    }
    //カウンターが１００になった時、停止し、強制的に初期位置に戻る
    if (numcount > 99) {
      Numx = 250;
      Numy = 200;
      NumVx = 0;
      NumVy = 0;
      cl1 =0;
      for (int i = 0; i < NUMBER.length; i++) {
        text(NUMBER[i], Numx + (i - 4) * 10, Numy);
      }
      text("NUMBER crash!", 205, 300);
      s1 = 1;
    }
    if (namcount > 99) {
      Namx = 250;
      Namy = 250;
      NamVx = 0;
      NamVy = 0;
      cl2 = 0;
      for (int i = 0; i <NAME.length; i++) {
        text(NAME[i], Namx + (i - 2) * 15, Namy);
      }
      text("NAME crash!", 214, 350);
      s2 = 1;
    }
    //初期画面の動作が終了したことを確認
    if ((s1 == 1) && (s2 == 1)) {
      background(51, 60, 94);
      status = 1;
    }
  }
}
