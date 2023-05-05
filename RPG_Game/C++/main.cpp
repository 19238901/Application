#include <iostream>
#include <random>
using namespace std;

// 定数宣言

// データ型宣言
// mapクラス
class Map {
public:
    static const int ROCK = 0;                 // 岩
    static const int EMPTY = 1;                // 床に何も居ないことを表す
    static const int GOAL = 2;                 // ゴール

    static const int XSIZE = 14;           // マップの横方向のセルの数
    static const int YSIZE = 12;           // マップの縦方向のセルの数
    
    int data[XSIZE][YSIZE];
    
    void init();                         // マップの初期化
    void print();                        // マップの表示
    void cellPrint(int x, int y);        // セルの表示
};

// playerクラス
class Player {
public:
    static const int INIT_HP = 100;     // プレイヤーの初期 HP
    
    int x, y;
    int hp;
    
    // player 詳細情報
    string name;
    string type = "でんき";
    string job = "勇者";
    string skill = "勇敢者(ゆうかんなるもの)";
    string skill_description = "攻撃したモンスターを麻痺状態(50%の確率で移動・攻撃不可能)にする。";
    string status;
    
    void init();                      // プレイヤーの初期化
    void print();                     // プレイヤーの状態の表示
    bool cellPrint(int x, int y);     // プレイヤーのセル上への表示
    bool moveTo(int dx, int dy);      // プレイヤーの移動
    void action();                    // プレイヤーのアクション
    void attackTo(int dx, int dy);      // プレイヤーの攻撃

};

// Monster1クラス
class Monster1 {
  public:
    static const int INIT_HP = 150;         // HP の初期値
    
    // monster１ 詳細情報
    string name = "コースティック";
    string type = "どく";
    string skill = "毒学者(ばらまくもの)";
    string skill_description = "攻撃対象を毒状態(１ターン毎に追加ダメージ)にする。";
    string status;
    
    int x, y;
    int hp;
    
    void init(int x, int y);                // 初期化
    bool cellPrint(int x, int y);           // モンスターのセル上への表示 // モンスターの状態の表示
    void print();
    bool moveTo(int dx, int dy);            // モンスターの移動
    void attackTo(int dx, int dy);          // モンスターの攻撃
    void action();                          // モンスターのアクション
};

// Monster2クラス
class Monster2 {
  public:
    static const int INIT_HP = 150;         // HP の初期値
    
    int x, y;
    int hp;
    
    // monster２ 詳細情報
    string name = "レヴナント";
    string type = "かくとう";
    string skill = "復讐者(にくむもの)";
    string skill_description = "戦闘時、敵が勇者ならば攻撃力が上がる";
    string status;
    
    void init(int x, int y);                // 初期化
    bool cellPrint(int x, int y);           // モンスターのセル上への表示 // モンスターの状態の表示
    void print();
    bool moveTo(int dx, int dy);            // モンスターの移動
    void attackTo(int dx, int dy);          // モンスターの攻撃
    void action();                          // モンスターのアクション
};

// NPC_Hクラス
class NPC_H {
  public:
    
    int x, y;  // NPCはHPを持たないとする
    int count;
    
    // npc_h 詳細情報
    string name = "ライフライン";
    string type = "ノーマル";
    string job = "ヒーラー";
    string skill = "聖者(せいなるもの)";
    string skill_description = "勇者を回復する。３回に１度大幅に回復させる。状態異常も治すことができる。";
    string status;
    
    void init(int x, int y);
    void print();
    bool cellPrint(int x, int y);
    bool moveTo(int dx, int dy);
    void attackTo(int dx, int dy);
    void action();
};

// NPC_Aクラス
class NPC_A {
public:
    int x, y;  // NPCはHPを持たないとする
    int count;
    
    // npc_a 詳細情報
    string name = "レイス";
    string type ;
    string job = "騎士";
    string skill1 = "暗殺者(ほおむるもの)";
    string skill1_description = "モンスターを攻撃し、攻撃対象を毒状態(１ターン毎に追加ダメージ)にする。３回に１度大ダメージを与える。";
    string skill2 = "変質者(まぎれるもの)";
    string skill2_description = "戦闘時、敵モンスターが不利属性なら、属性「エスパー」に変えることができる。";
    string status;
    
    void init(int x, int y);
    void print();
    bool cellPrint(int x, int y);
    bool moveTo(int dx, int dy);
    void attackTo(int dx, int dy);
    void action();
};

// プロトタイプ宣言
void initAll();                         // ゲーム全体の初期化
void printAll();                        // ゲーム状態の表示
void mainLoop();                        // ターンの繰り返し実行
void turn();                            // 1回のターン実行
char getKeyChar();                      // キーボードからの 1 文字入力
int signum(int a);                      // 符号関数、モンスターのaction()で使用

// グローバル宣言
Map map;                                // マップのグローバル変数の追加
Player player;                          // プレイヤーのグローバル変数の追加
Monster1 monster1;                       // モンスターのグローバル変数の追加
Monster2 monster2;                       // モンスターのグローバル変数の追加
NPC_H npc_h;                            // NPC_Hのグローバル変数の追加
NPC_A npc_a;                            // NPC_Aのグローバル変数の追加
    
// main関数
int main(int argc, const char * argv[]) {
    // player nameの入力
    string NAME;
    cout << "your name -> ";
    cin >> NAME;
    player.name = NAME;
    // 詳細設定
    player.status = "正常";
    npc_h.status = "正常";
    npc_h.count = 0;
    npc_a.status = "正常";
    npc_a.count = 0;
    npc_a.type = "どく";
    monster1.status = "正常";
    monster2.status = "正常";
    // game開始
    initAll();
    mainLoop();
    return 0;
}

// ゲーム全体の初期化
void initAll() {
    map.init();                             // マップの初期化
    player.init();                          // プレイヤーの初期化
    monster1.init(1, Map::YSIZE-2);         // モンスターの初期化の追加
    monster2.init(Map::XSIZE-2, 1);         // 2体で初期値が異なる
    npc_h.init(3, 3);
    npc_a.init(4, 5);
}

// ゲーム状態の表示
void printAll() {
    map.print();            // マップの表示
    player.print();         // プレイヤーの状態の表示
    monster1.print();       // モンスターの表示の追加
    monster2.print();       // モンスターの表示の追加
    npc_h.print();          // npc_hの表示の追加
    npc_a.print();          // npc_aの表示の追加
    cout << endl;       // ターンの区切りのための改行
}

// ターンの繰り返し実行
void mainLoop() {
    printAll();         // ゲーム状態の表示
    while (true) {      // 無限に繰り返す
        if (player.hp > 0) {    // プレイヤー　ゴール
            turn();         // 1回のターン実行
            if (player.x == (map.XSIZE - 2) && (player.y == (map.YSIZE - 2))){
                cout << "GAME CLEAR" << endl;
                break;
            }
        } else {                // プレイヤー　瀕死
            cout << "GAME OVER" << endl;
            break;
        }
    }
}

// １回のターン実行
void turn() {
    player.action();     // プレイヤーのアクション
    if(monster1.hp > 0){
        if(monster1.status  == "麻痺"){       //麻痺状態
            random_device rnd;               //乱数の生成
            if(rnd() % 2 == 0){
                monster1.action();          //50%の確率で行動できる
            }
        } else {
            monster1.action();      // モンスターのアクションの追加
        }
    }
    if(monster2.hp > 0){
        if(monster1.status  == "麻痺"){       //麻痺状態
            random_device rnd;               //乱数の生成
            if(rnd() % 2 == 0){
                monster2.action();         //50%の確率で行動できる
            }
        }
        monster2.action();      // モンスターのアクションの追加
    }
    npc_h.action();       // npc_hのアクションの追加
    npc_a.action();       // npc_aのアクションの追加
    
    // npc_aがスキルを使い敵を倒した後の処理
    if(monster1.hp <= 0 || monster2.hp <= 0){
        npc_a.type = "どく";
    }
    
    // どく状態
    if(player.status == "どく"){ player.hp -= 5; }
    if(monster1.status == "どく"){ monster1.hp -= 5; }
    if(monster2.status == "どく"){ monster2.hp -= 5; }
    // 瀕死状態
    if(player.hp <= 0){ player.status = "瀕死"; }
    if(monster1.hp <= 0){ monster1.status = "瀕死"; }
    if(monster2.hp <= 0){ monster2.status = "瀕死"; }
    printAll();         // ゲーム状態の表示
}

// キーボードからの１文字入力
char getKeyChar() {
    char c;
    cout << "? " << flush;      // プロンプトの表示
    cin >> c;                   // １文字入力
    return c;
}

// モンスターの action() で利用
int signum(int a) {
    if (a < 0) return -1;               // a が負数ならば -1 を戻り値とする
    else if (a > 0) return 1;           // a が正数ならば 1 を戻り値とする
    else return 0;                      // a が 0 ならば 0 を戻り値とする
}

// マップの初期化
void Map::init() {
    for (int x = 0; x < XSIZE; x++) {
        for (int y = 0; y < YSIZE; y++) {
            if ((x == 0)||(x == XSIZE-1)||      //左右端の岩の位置の判定
                (y == 0)||(y == YSIZE-1)||      //上下端の岩の位置の判定
                (((x >= 5) && (x <= 8))&&        //x 値が中央値から 1 以内の距離
                 ((y >= 4) && (y <= 7)))) {      //y 値が中央値から 1 以内の距離
                data[x][y] = ROCK;                           // 岩
            } else { data[x][y] = EMPTY; }                 // 何もない床
        }
    }
    data[XSIZE-2][YSIZE-2] = GOAL;       // ゴール
}

// マップの表示
void Map::print() {
    for (int y = 0; y < YSIZE; y++) {
        for (int x = 0; x < XSIZE; x++) {
            if (player.cellPrint(x,y)) { continue; }        // playerが(x,y)の位置ならば表示
            if(monster1.hp > 0){
                if (monster1.cellPrint(x,y)) { continue; }      // monster1が(x,y)の位置ならば表示
            } else {        // monster1が瀕死の時
                monster1.x = 0;
                monster1.y = 0;
            }
            if(monster2.hp > 0){
                if (monster2.cellPrint(x,y)) { continue; }      // monster2が(x,y)の位置ならば表示
            } else {        // monster2が瀕死の時
                monster2.x = 0;
                monster2.y = 0;
            }
            if (npc_h.cellPrint(x,y)) { continue; }           // npc_hが(x,y)の位置ならば表示
            if (npc_a.cellPrint(x,y)) { continue; }           // npc_aが(x,y)の位置ならば表示
            cellPrint(x,y);                                 // セルの状態を表示
        }
        cout << endl;
    }
}

// セルの表示
void Map::cellPrint(int x, int y) {
    int e = data[x][y];
    if (e == ROCK) { cout << '#' << ' '; }
    else if (e == EMPTY) { cout << '.' << ' '; }
    else if(e==GOAL) {cout << 'G' << ' ';}
    else { cout << 'E' << ' '; }
}

// プレイヤーの初期化
void Player::init() {
    x = 1;
    y = 1;
    hp = INIT_HP;
}

// プレイヤーの状態の表示
void Player::print() {
    cout << "Player  : < " << status << " >  (" << x << "," << y << ") " << hp << endl;
}

// プレイヤーのセル上への表示
bool Player::cellPrint(int x_, int y_) {
    if ((x_ == x)&&(y_ == y)) {
        cout << '@' << ' ';                 // @と空白文字の表示
        return true;
    }
    return false;
}

// プレイヤーの移動
bool Player::moveTo(int dx, int dy) {
    int targetX = x+dx, targetY = y+dy;
    
    if (map.data[targetX][targetY] == Map::ROCK) {
        player.hp -= 5;     // 壁に向かって移動するとダメージを受ける。
        return false;
    }
    if ((targetX == monster1.x)&&(targetY == monster1.y)) { return false; }      // 移動先に monster1 が居るならば、移動できない
    if ((targetX == monster2.x)&&(targetY == monster2.y)) { return false; }     // 移動先に monster2 が居るならば、移動できない
    if ((targetX == npc_h.x)&&(targetY == npc_h.y)) { return false; }       // 移動先に npc_h が居るならば、移動できない
    if ((targetX == npc_a.x)&&(targetY == npc_a.y)) { return false; }       // 移動先に npc_a が居るならば、移動できない
    x = targetX; y = targetY;
    return true;
}

// プレイヤーの攻撃
void Player::attackTo(int dx, int dy) {
    int targetX = x+dx, targetY = y+dy;
    if ((targetX == monster1.x)&&(targetY == monster1.y)) {
        monster1.hp -= 20;      // 攻撃先に monster1 が居るならば hp を 20 減らす
        monster1.status = "麻痺";     //攻撃対象を麻痺状態にする。
    }
    if ((targetX == monster2.x)&&(targetY == monster2.y)) {
        monster2.hp -= 20;      // 攻撃先に monster2 が居るならば hp を 20 減らす
        monster2.status = "麻痺";     //攻撃対象を麻痺状態にする。
    }
}

// プレイヤーのアクション
void Player::action() {
    int dx, dy;
    // 移動ベクトルの設定
    switch (getKeyChar()) {
        case 'z':
            dx = -1; dy = +1; break;
        case 'x':
            dx =  0; dy = +1; break;
        case 'c':
            dx = +1; dy = +1; break;
        case 'a':
            dx = -1; dy =  0; break;
        case 'd':
            dx = +1; dy =  0; break;
        case 'q':
            dx = -1; dy = -1; break;
        case 'w':
            dx =  0; dy = -1; break;
        case 'e':
            dx = +1; dy = -1; break;
        case 's':           // 詳細情報の表示
            cout << "<Player>" << endl;
            cout << "name  : " << player.name << endl;
            cout << "type  : " << player.type << endl;
            cout << "job   : " << player.job << endl;
            cout << "skill : " << player.skill << endl;
            cout << "      -> " << player.skill_description << endl;
            cout << "<NPC_H>" << endl;
            cout << "name  : " << npc_h.name << endl;
            cout << "type  : " << npc_h.type << endl;
            cout << "job   : " << npc_h.job << endl;
            cout << "skill : " << npc_h.skill << endl;
            cout << "      -> " << npc_h.skill_description << endl;
            cout << "<NPC_A>" << endl;
            cout << "type  : " << npc_a.name << endl;
            cout << "type  : " << npc_a.type << endl;
            cout << "job   : " << npc_a.job << endl;
            cout << "skill : " << npc_a.skill1 << endl;
            cout << "      -> " << npc_a.skill1_description << endl;
            cout << "skill : " << npc_a.skill2 << endl;
            cout << "      -> " << npc_a.skill2_description << endl;
            cout << "<Monster1>" << endl;
            cout << "name  : " << monster1.name << endl;
            cout << "type  : " << monster1.type << endl;
            cout << "skill : " << monster1.skill << endl;
            cout << "      -> " << monster1.skill_description << endl;
            cout << "<Monster2>" << endl;
            cout << "name  : " << monster2.name << endl;
            cout << "type  : " << monster2.type << endl;
            cout << "skill : " << monster2.skill << endl;
            cout << "      -> " << monster2.skill_description << endl;
            dx = 0; dy = 0; break;
        default:
            dx =  0; dy =  0; break;
     }
    
    if (!moveTo(dx,dy)) { attackTo(dx,dy); } // 移動できないならば、攻撃する
}

// モンスターの初期化
void Monster1::init(int x_, int y_) {
    x = x_; y = y_;
    hp = INIT_HP;
}

//　モンスターのセル上への表示
bool Monster1::cellPrint(int x_, int y_) {
    if ((x_ == x)&&(y_ == y)) {
        cout << 'M' << ' ';
        return true;
    }
    return false;
}

// モンスターの状態の表示
void Monster1::print() {
    cout << "Monster1: < " << status << " >  ("  << x << "," << y << ") " << hp << endl;
}

// モンスターの移動
bool Monster1::moveTo(int dx, int dy) {
    int targetX = x+dx, targetY = y+dy;
    if (map.data[targetX][targetY] == Map::ROCK) {
        monster1.hp -= 5;          // 壁に向かって移動するとダメージを受ける。
        return false;
    }
    if ((targetX == player.x)&&(targetY == player.y)) { return false; }     // 移動先に player が居るならば、移動できない
    if ((targetX == monster2.x)&&(targetY == monster2.y)) { return false; }     // 移動先に monster2 が居るならば、移動できない
    if ((targetX == npc_h.x)&&(targetY == npc_h.y)) { return false; }       // 移動先に npc_h が居るならば、移動できない
    if ((targetX == npc_a.x)&&(targetY == npc_a.y)) { return false; }       // 移動先に npc_a が居るならば、移動できない
    
    x = targetX; y = targetY;
    return true;
}

// モンスターの攻撃
void Monster1::attackTo(int dx, int dy) {
    int targetX= x+dx, targetY = y+dy;
    if ((targetX == player.x)&&(targetY == player.y)) {
        player.hp -= 30;
        player.status = "どく";       //　攻撃対象をどく状態にする。
    }  // NPCは攻撃対象外
}

// モンスターのアクション
void Monster1::action() {
    int dx = signum(player.x - x);
    int dy = signum(player.y - y);
    
    if (!moveTo(dx,dy)) { attackTo(dx,dy); } // 移動できないならば、攻撃する
}

// モンスターの初期化
void Monster2::init(int x_, int y_) {
    x = x_; y = y_;
    hp = INIT_HP;
}

//　モンスターのセル上への表示
bool Monster2::cellPrint(int x_, int y_) {
    if ((x_ == x)&&(y_ == y)) {
        cout << 'M' << ' ';
        return true;
    }
    return false;
}

// モンスターの状態の表示
void Monster2::print() {
    cout << "Monster2: < " << status << " >  (" << x << "," << y << ") " << hp << endl;
}

// モンスターの移動
bool Monster2::moveTo(int dx, int dy) {
    int targetX = x+dx, targetY = y+dy;
    if (map.data[targetX][targetY] == Map::ROCK) {
        monster2.hp -= 5;          // 壁に向かって移動するとダメージを受ける。
        return false;
    }
    if ((targetX == player.x)&&(targetY == player.y)) { return false; }     // 移動先に player が居るならば、移動できない
    if ((targetX == monster1.x)&&(targetY == monster1.y)) { return false; }     // 移動先に monster1 が居るならば、移動できない
    if ((targetX == npc_h.x)&&(targetY == npc_h.y)) { return false; }       // 移動先に npc_h が居るならば、移動できない
    if ((targetX == npc_a.x)&&(targetY == npc_a.y)) { return false; }       // 移動先に npc_a が居るならば、移動できない
    
    x = targetX; y = targetY;
    return true;
}

// モンスターの攻撃
void Monster2::attackTo(int dx, int dy) {
    int targetX= x+dx, targetY = y+dy;
    if ((targetX == player.x)&&(targetY == player.y)) {
        if(player.job == "勇者"){     // プレイヤーの職業によって与ダメージが変わる。
            player.hp -= 40;
        } else {
            player.hp -= 30;
        }
    }  // NPCは攻撃対象外
}

// モンスターのアクション
void Monster2::action() {
    int dx = signum(player.x - x);
    int dy = signum(player.y - y);
    
    if (!moveTo(dx,dy)) { attackTo(dx,dy); } // 移動できないならば、攻撃する
}

// NPC_Hの初期化
void NPC_H::init(int x_, int y_) {
    x = x_; y = y_;
}

// NPC_Hの表示
void NPC_H::print() {
    cout << "NPC_H   : < " << status << " >  (" << x << "," << y << ") " << endl;

}

// NPC_HのMAP上での表示
bool NPC_H::cellPrint(int x_, int y_) {
    if ((x_ == x)&&(y_ == y)) {
        cout << 'H' << ' ';
        return true;
    }
    return false;
}

// NPC_Hの移動
bool NPC_H::moveTo(int dx, int dy) {
    int targetX = x+dx, targetY = y+dy;
    if (map.data[targetX][targetY] == Map::ROCK) { return false; }      // 移動先に ROCK が居るならば、移動できない
    if ((targetX == player.x)&&(targetY == player.y)) { return false; }     // 移動先に player が居るならば、移動できない
    if ((targetX == monster1.x)&&(targetY == monster1.y)) { return false; }     // 移動先に monster1 が居るならば、移動できない
    if ((targetX == monster2.x)&&(targetY == monster2.y)) { return false; }     // 移動先に monster2 が居るならば、移動できない
    if ((targetX == npc_a.x)&&(targetY == npc_a.y)) { return false; }       // 移動先に npc_a が居るならば、移動できない
    
    x = targetX; y = targetY;
    
    return true;
}

// NPC_Hの回復
void NPC_H::attackTo(int dx, int dy) {
    int targetX= x+dx, targetY = y+dy;
    npc_h.count = npc_h.count + 1;
    if ((targetX == player.x)&&(targetY == player.y)) {
        if(npc_h.count % 3 == 0){
            if(player.hp < 70){
                player.hp = 100;
            } else {
                player.hp += 30;
            }
            // 状態異常を回復
            player.status = "正常";
        } else {
            player.hp += 15;
        }
    }
}

//NPC_Hのアクション
void NPC_H::action() {
    int dx = signum(player.x - x);
    int dy = signum(player.y - y);

    if (!moveTo(dx,dy)) { attackTo(dx,dy); }
}

// NPC_Aの初期化
void NPC_A::init(int x_, int y_) {
    x = x_; y = y_;
}

// NPC_Aの表示
void NPC_A::print() {
    cout << "NPC_A   : < " << status << " >  (" << x << "," << y << ") " << endl;
}

// NPC_AのMAP上での表示
bool NPC_A::cellPrint(int x_, int y_) {
    if ((x_ == x)&&(y_ == y)) {
        cout << 'A' << ' ';
        return true;
    }
    return false;
}

// NPC_Aの移動
bool NPC_A::moveTo(int dx, int dy) {
    int targetX = x+dx, targetY = y+dy;
    
    if (map.data[targetX][targetY] == Map::ROCK) { return false; }      // 移動先に ROCK が居るならば、移動できない
    if ((targetX == player.x)&&(targetY == player.y)) { return false; }     // 移動先に player が居るならば、移動できない
    if ((targetX == monster1.x)&&(targetY == monster1.y)) { return false; }     // 移動先に monster1 が居るならば、移動できない
    if ((targetX == monster2.x)&&(targetY == monster2.y)) { return false; }     // 移動先に monster2 が居るならば、移動できない
    if ((targetX == npc_h.x)&&(targetY == npc_h.y)) { return false; }           // 移動先に npc_h が居るならば、移動できない
    
    x = targetX; y = targetY;
    
    return true;
}

// NPC_Aの攻撃
void NPC_A::attackTo(int dx, int dy) {
    int targetX= x+dx, targetY = y+dy;
    npc_a.count = npc_a.count + 1;
    if ((targetX == monster1.x)&&(targetY == monster1.y)) {
        // skill 変質者
        if(npc_a.status == "正常" && (monster1.type == "どく" && npc_a.type == "どく")){
            npc_a.type = "エスパー";
        }
        // 有利属性の時
        if(monster1.type == "どく" && npc_a.type == "エスパー"){
            if(npc_a.count % 3 != 0){
                monster1.hp -= 25;
            } else {
                monster1.hp -= 40;
            }
        } else if(monster1.type == "どく" && npc_a.type == "どく"){     // 不利属性の時
            if(npc_a.count % 3 != 0){
                monster1.hp -= 5;
            } else {
                monster1.hp -= 20;
            }
        } else {        // その他の時
            if(npc_a.count % 3 != 0){
                monster1.hp -= 15;
            } else {
                monster1.hp -= 30;
            }
        }
        monster1.status = "どく";     // 攻撃対象をどく状態にする。
    }
    if ((targetX == monster2.x)&&(targetY == monster2.y)) {
        // skill 変質者
        if(npc_a.status == "正常" && (monster1.type == "かくとう" && npc_a.type == "どく")){
            npc_a.type = "エスパー";
        }
        // 有利属性の時
        if(monster1.type == "かくとう" && npc_a.type == "エスパー"){
            if(npc_a.count % 3 != 0){
                monster2.hp -= 25;
            } else {
                monster2.hp -= 40;
            }
        } else if(monster2.type == "かくとう" && npc_a.type == "どく"){           // 不利属性の時
            if(npc_a.count % 3 != 0){
                monster2.hp -= 5;
            } else {
                monster2.hp -= 20;
            }
        } else {        // その他の時
            if(npc_a.count % 3 != 0){
                monster2.hp -= 15;
            } else {
                monster2.hp -= 30;
            }
        }
        monster2.status = "どく";         // 攻撃対象をどく状態にする
    }
}

//NPC_Aのアクション
void NPC_A::action() {
    int d1, d2, dx, dy;
    d1 = (monster1.x - npc_a.x)*(monster1.x - npc_a.x) + (monster1.y - npc_a.y)*(monster1.y - npc_a.y);
    d2 = (monster2.x - npc_a.x)*(monster2.x - npc_a.x) + (monster2.y - npc_a.y)*(monster2.y - npc_a.y);
    
    if(d1 < d2){
        if(monster1.hp > 0){
            dx = signum(monster1.x - x);
            dy = signum(monster1.y - y);
        } else {
            dx = signum(monster2.x - x);
            dy = signum(monster2.y - y);
        }
    } else {
        if(monster2.hp > 0){
            dx = signum(monster2.x - x);
            dy = signum(monster2.y - y);
        } else {
            dx = signum(monster1.x - x);
            dy = signum(monster1.y - y);
        }
    }
    if(monster1.hp <= 0 && monster2.hp <= 0){
        dx = signum(player.x - x);
        dy = signum(player.y - y);

    }
    if (!moveTo(dx,dy)) { attackTo(dx,dy); }
}
