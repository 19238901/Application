import java.io.*;
import java.util.Random;
import java.util.Scanner;
import java.util.ArrayList;

class Game {
    public static void main(String args[]) {
        Game game = new Game();
        game.mainLoop();
    }

    static Random random = new Random();

    Map map;
    ArrayList<Actor> actors;
    final static int PLAYER_ID = 0;
    final static int NUM_OF_MONSTERS = 4;

    int p_c = 0, m_c = 0, r_c = 0;

    Game() {
        // プレイヤーの名前の入力
        Scanner a = new Scanner(System.in);
        System.out.print("name：");
        String name = a.next();
        map = new Map(this);
        actors = new ArrayList<Actor>();
        actors.add(new Player(this, name, "normal"));
        for (int i = 0; i < NUM_OF_MONSTERS; i++) {
            if (random.nextInt(2) == 0) {
                actors.add(new Monster(this));
            }
            else {
                actors.add(new RedMonster(this));
            }
        }
    }
    
    void print() {
        map.print();
        for (Actor a : actors) { System.out.println(a); }
        System.out.println();
    }   
    
    void mainLoop() {
        print();
        while (true) { turn(); }
    }

    void turn() {
        for (Actor a : actors) {
            //アクターの生存を確認
            if(a.hp > 0){ 
                //アクターの状態を確認
                if(a.status == "sleeping"){                 
                    if(a instanceof Player){                //アクターが誰か確認
                        //睡眠状態のターン数をカウント
                        p_c = p_c + 1;
                        if(p_c == 3){               //睡眠状態が３ターン経ったら状態異常から回復
                            a.status = "normal";
                            p_c = 0;
                        } else {                    //アクターの状態を表示
                            System.out.println(a.name + " 睡眠 : 行動不能");
                        }
                    } else if(a instanceof Monster){        //アクターが誰か確認
                        //睡眠状態のターン数をカウント
                        m_c = m_c + 1;
                        if(m_c == 3){               //睡眠状態が３ターン経ったら状態異常から回復
                            a.status = "normal";
                            m_c = 0;
                        } else {                    //アクターの状態を表示
                            System.out.println(a.name + " 睡眠 : 行動不能");
                        }
                    } else if(a instanceof RedMonster){     //アクターが誰か確認 
                        //睡眠状態のターン数をカウント
                        r_c = r_c + 1;
                        if(r_c == 3){               //睡眠状態が３ターン経ったら状態異常から回復
                            a.status = "normal";
                            r_c = 0;
                        } else {                    //アクターの状態を表示
                            System.out.println(a.name + " 睡眠 : 行動不能");
                        }
                    }
                } else if(a.status == "invincible"){
                    //無敵状態のターン数をカウント
                    p_c = p_c + 1;
                    if(p_c == 5){                   //無敵状態で５ターン経つと、通常状態に戻る。
                        a.status = "normal";
                        p_c = 0;
                    }
                    //アクターのアクションはスキップされない。
                    a.action();
                } else if(a.status == "normal"){
                    a.action();
                }
            } else {
                if(a instanceof Player){            //アクターが誰か判定    
                    //プレイヤーが瀕死なら強制終了
                    System.out.println(a.name + " 瀕死 : ゲーム終了");
                    System.out.println("GAME OVER");
                    System.exit(0);
                } else {
                    //モンスターが瀕死ならモンスターはactionを止める
                    System.out.println(a.name + " 瀕死 : 行動不能");
                }
            }
        }
        System.out.println();
        print();
    }    
    static char getKeyChar() {
        char c = 0;
        System.out.print("? ");
        try {
            BufferedReader in = new BufferedReader(
                                 new InputStreamReader(System.in));
            c = in.readLine().charAt(0);
        } catch(IOException e){
            System.out.println("ERROR:: getKeyChar()");
        }
        return c;
    }
}

class Map {
    static final int XSIZE = 13;
    static final int YSIZE = 11;

    Game game;
    Cell data[][]= new Cell[XSIZE][YSIZE];
    
    Map(Game game) {
        this.game = game;
        for (int x = 0; x < XSIZE; x++) {  
            for (int y = 0; y < YSIZE; y++) {
                if ((x == 0)||(x == XSIZE-1)||
                   (y == 0)||(y == YSIZE-1)||
                   ((Math.abs(x-XSIZE/2) <= 1)&&
                    (Math.abs(y-YSIZE/2) <= 1))) { 
                    data[x][y] = new RockCell(); 
                }
                else { 
                    switch (Game.random.nextInt(7)) {
                    case 0: data[x][y] = new PotionCell();
                            break;
                    case 1: data[x][y] = new PoisonCell();
                            break;
                    case 2: data[x][y] = new MyTestCell();   // !!!!
                            break;
                    case 3: data[x][y] = new BadEndingCell();
                            break;
                    case 4: data[x][y] = new HealingSpringCell();
                            break;
                    case 5: data[x][y] = new SleepingCell();
                            break;
                    case 6: data[x][y] = new InvincibleCell();
                            break;        
                    default: data[x][y] = new EmptyCell();
                    }
                }
            }
        }
        data[XSIZE-2][YSIZE-2] = new GoalCell();
    }

    Cell getAt(Int2 position) { return data[position.x][position.y]; }

    void setAt(Int2 position, Cell cell) { 
        data[position.x][position.y] = cell; 
    }

    void print() {
        for (int y = 0; y < YSIZE; y++) {
            x_level: 
            for (int x = 0; x < XSIZE; x++) {
                Int2 position = new Int2(x,y);

                for (Actor a : game.actors) { 
                    if (a.cellPrint(position)) {
                        continue x_level;
                    }
                }
                getAt(position).cellPrint();
            }
            System.out.println();
        }
    }

    Int2 getRandomCellPosition() {
        while (true) {
            Int2 position = new Int2(Game.random.nextInt(XSIZE), Game.random.nextInt(YSIZE));
            
            if (!getAt(position).isRockCell()) { return position; }
        }
    }
}

abstract class Actor {
    //名前と状態を追加
    Game game;
    Int2 position;
    int hp;
    String name;
    char cellChar;
    String status;
    
    Actor(Game game, Int2 position, int hp, char cellChar, String name, String status) {        //名前と状態を追加
        this.game = game;
        this.position = position;
        this.hp = hp;
        this.cellChar = cellChar;
        this.name = name;
        this.status = status;
    }

    Actor(Game game, int hp, char cellChar, String name, String status) {                       //名前と状態を追加
        this.game = game;
        this.hp = hp;
        this.cellChar = cellChar;
        this.name = name;
        this.status = status;
        while_loop:
        while (true) {
            position = game.map.getRandomCellPosition();
            for (Actor a : game.actors) {
                if (position.equal(a.position)) { continue while_loop; }
            }
            return;
        }
    }

    boolean cellPrint(Int2 position) {
        if (this.position.equal(position)) {
            System.out.print(cellChar+" ");
            return true;
        }
        return false;
    }

    boolean moveTo(Int2 direction) {
        Int2 target = position.add(direction);

        Cell cell = game.map.getAt(target);
        if (cell.isRockCell()) { return false; }

        for (Actor a : game.actors) {
            if (target.equal(a.position)) { return false; } 
        }

        Cell newCell = cell.affectOn(this);
        game.map.setAt(target, newCell);
        position = target;
        return true;
    }

    abstract void action();
}

class Player extends Actor {
    static final int INIT_HP = 100;
    //名前と状態を追加
    String name;
    static String status = "normal";

    Player(Game game, String name, String status) {                     //名前と状態を追加
        super(game, new Int2(1,1), INIT_HP, '@', name, status);
        this.name = name;
    }
    
    Player(Game game) { this(game, "Player", Player.status); }
    
    public String toString() {
        return name+" : "+position+" "+hp;
    }
    
    void attackTo(Int2 direction) {
        Int2 target = position.add(direction);

        for (Actor a : game.actors) {
            if (target.equal(a.position)) {
                if (a instanceof RedMonster) {
                    a.hp -= 10;
                    //ログ表示を追加
                    System.out.println(name + " → "  + a.name + " : " + a.name + "のhp " + a.hp + " → " + (a.hp-10));
                }
                else if (a instanceof Monster) {
                    a.hp -= 20;
                    //ログ表示を追加
                    System.out.println(name + " → "  + a.name + " : " + a.name + "のhp " + a.hp + " → " + (a.hp-20));
                }
                return;
            }
        } 
    }

    @Override
    void action() {
        Int2 direction;
        switch (Game.getKeyChar()) {
            case 'z': direction = new Int2(-1,+1); break;
            case 'x': direction = new Int2( 0,+1); break;
            case 'c': direction = new Int2(+1,+1); break;
            case 'a': direction = new Int2(-1, 0); break;
            case 'd': direction = new Int2(+1, 0); break;
            case 'q': direction = new Int2(-1,-1); break;
            case 'w': direction = new Int2( 0,-1); break;
            case 'e': direction = new Int2(+1,-1); break;
            default:  direction = new Int2( 0, 0); 
        }
        if (!moveTo(direction)) { attackTo(direction); }
    }
}

class Monster extends Actor {
    static final int INIT_HP = 150;
    //名前と状態を追加
    String name = "Monster";
    static String status = "normal";
    
    Monster(Game game, char c, String name, String status) {        //名前と状態を追加
        super(game, INIT_HP, c, name, status);
    }

    Monster(Game game) { this(game, 'M', "Monster", Monster.status); }

    @Override
    public String toString() {
        return name+" : "+position+" "+hp;
    }

    void attackTo(Int2 direction) {
        Int2 target = position.add(direction);

        Actor player = game.actors.get(game.PLAYER_ID);
        if (target.equal(player.position)) {
            if(player.status == "normal"){      //プレイヤーの状態を確認
                //ログ表示を追加
                System.out.println("Monster → "  + player.name + " : " + player.name + "のhp " + player.hp + " → " + (player.hp-30));
                player.hp -= 30;
            } else {                            //プレイヤーの状態を確認
                //ログ表示を追加
                System.out.println("Monster → "  + player.name + " : " + player.name + "に攻撃は効かないようだ");
            }
            return;
        } 
    }
    
    @Override
    void action() {
        Actor player = game.actors.get(game.PLAYER_ID);
        Int2 direction = player.position.sub(position).signum();
        
        if (!moveTo(direction)) { attackTo(direction); }
    }
}

class RedMonster extends Monster {
    //名前と状態の追加
    String name = "RedMonster";
    static String status = "normal";

    RedMonster(Game game, char c, String name, String status) {             //名前と状態の追加
        super(game, c, name, status);
    }

    RedMonster(Game game) { 
        this(game, 'R', "RedMonster", RedMonster.status);
    }
    
    @Override
    public String toString() {
        return name+" : "+position+" "+hp;
    }
    
    @Override
    void attackTo(Int2 direction) {
        Int2 target = position.add(direction);

        Actor player = game.actors.get(game.PLAYER_ID);
        if (target.equal(player.position)) {
            if(player.status == "normal"){          //プレイヤーの状態を確認
                //ログの表示を追加
                System.out.println("RedMonster → "  + player.name + " : " + player.name + "のhp " + player.hp + " → " + (player.hp-60));
                player.hp -= 60;
            } else {     
                //ログの表示を追加                           
                System.out.println("RedMonster → "  + player.name + " : " + player.name + "に攻撃は効かないようだ");
            }
            return;
        } 
    }
}


class Int2 {
    int x,y;
    
    Int2(int x, int y) { this.x = x; this.y = y; }
    Int2 add(Int2 a) { return new Int2(x+a.x,y+a.y); }
    Int2 sub(Int2 a) { return new Int2(x-a.x,y-a.y); }
    Int2 signum() { return new Int2(Integer.signum(x),Integer.signum(y)); }
    boolean equal(Int2 a) { return (x == a.x)&&(y == a.y); }
    
    public String toString(){ return "("+x+","+y+")"; }
}

abstract class Cell {
    abstract void cellPrint();
    
    boolean isRockCell() { return false; }
    
    abstract Cell affectOn(Actor a);
}

abstract class SimpleCell extends Cell {
    @Override
    Cell affectOn(Actor a) { return this; }
}

abstract class TrapCell extends Cell {
    boolean visible = false;

    @Override
    Cell affectOn(Actor a) {
        visible = true;
        return this;
    }
}

class RockCell extends SimpleCell {
    @Override
    void cellPrint() { System.out.print("\u001b[00;42m"+"#"+ "\u001b[00m" + " "); }     //背景色を変更

    @Override
    boolean isRockCell() { return true; }    
}

class EmptyCell extends SimpleCell {
    @Override
    void cellPrint() { System.out.print(". "); }
}

class PotionCell extends SimpleCell {
    @Override
    void cellPrint() { System.out.print("\u001b[00;36m"+"o "+"\u001b[00m"); }           //文字色を変更
    
    @Override
    Cell affectOn(Actor a) {
        System.out.println(a.name + " → PotionCell : " + a.name + "のhp " + a.hp + " → " + (a.hp+50));
        a.hp += 50;
        return new EmptyCell();
    }
}

class GoalCell extends SimpleCell {
    @Override
    void cellPrint() { System.out.print("\u001b[00;33m"+"G"+"\u001b[00m"+ " "); }       //文字色を変更

    @Override
    Cell affectOn(Actor a) {
        if (a instanceof Player) {
            //ログ表示を追加
            System.out.println(a.name + " → GoalCell : ゴール！GAME CLEAR！");
            if(a.hp <= 0){      //プレイヤーの生存を確認
                System.out.println(a.name + "の残りhp : " + a.hp + " ポーションセルを上手く使おう！");
            } else {
                System.out.println("congratulations!");
            }
            System.out.println("YOU WIN"); 
            System.exit(0);
        } else {
            //ログ表示を追加
            System.out.println(a.name + " → GoalCell : 何も起こらない");
        }
        return this; 
    }
}

class PoisonCell extends TrapCell {
    @Override
    void cellPrint() {
        if (visible) { System.out.print("\u001b[00;34m"+"x "+"\u001b[00m"); }       //文字色を変更
        else { System.out.print(". "); }
    }

    @Override
    Cell affectOn(Actor a) {
        if(a.status == "invincible"){       //プレイヤーが無敵状態ならダメージ無効により効かない
            //ログ表示を追加
            System.out.println(a.name + " → PoisonCell : " + a.name + "は状態異常は効かないようだ");
        } else {
            //ログ表示を追加
            System.out.println(a.name + " → HealingSpring : " + a.name + "のhp " + a.hp + " → " + (a.hp+10));
            a.hp -= 10; 
        }
        return super.affectOn(a);
    }
}

class MyTestCell extends SimpleCell {   // !!!!
    @Override
    void cellPrint() { System.out.print("\u001b[00;35m"+"! "+"\u001b[00m"); }       //文字色を変更

    @Override
    Cell affectOn(Actor a) {
        //ログ表示の追加
        System.out.println(a.name + " → MyTestCell : " + a.name + "『Ruuuuu♪ Ruuuuuu♪』 "+ a.name + "が歌い始めた"); // アクターが歌い出す
        return this;
    }
}

//BadEndingCellの追加：プレイヤが移動すると強制終了
class BadEndingCell extends TrapCell {
    @Override
    void cellPrint() {
        System.out.print("\u001b[00;31m"+"e "+"\u001b[00m");        //文字色の変更
    }

    Cell affectOn(Actor a) {
        if(a instanceof Player){        //アクターが誰か確認する
            //ログ表示の追加
            System.out.println(a.name + " → BadEndingCell : ゲーム終了");  
            System.out.println("GAME OVER");
            //強制終了
            System.exit(0);
        } else {
            //ログ表示の追加
            System.out.println(a.name + " → BadEndingCell : " + a.name + "のhp " + a.hp + " → " + (a.hp-100));
            a.hp -= 100;
            return super.affectOn(a);
        }
        return this;
    }
}

//HealingSpringCellの追加：アクターを回復
class HealingSpringCell extends SimpleCell {
    @Override
    void cellPrint() { System.out.print("\u001b[00;46m"+"h"+"\u001b[00m" + " "); }      //背景色の追加
    
    @Override
    Cell affectOn(Actor a) {
        if(a instanceof Player){        //アクターが誰か確認する
            //ログ表示の追加
            System.out.println(a.name + " → HealingSpring : " + a.name + "のhp " + a.hp + " → " + (a.hp+200));
            a.hp += 200;
        } else {
            //ログ教示の追加
            System.out.println(a.name + " → HealingSpring : " + a.name + "のhp " + a.hp + " → " + (a.hp+10));
            a.hp += 10;
        }
        return this;
    }
}

//SleepingCellの追加：アクターを睡眠状態にする
class SleepingCell extends TrapCell{
    @Override
    void cellPrint() { System.out.print("\u001b[00;32m"+"s "+"\u001b[00m"); }       //文字色の変化

    @Override
    Cell affectOn(Actor a) {
        if(a instanceof Player){        //アクターが誰か確認
            if(a.status == "invincible"){       //プレイヤーが無敵状態なら状態異常無効により効かない
                //ログ表示の追加
                System.out.println(a.name + " → SleepingCell : " + a.name + "は状態異常は効かないようだ");
            } else {
                //ログ表示の追加
                System.out.println(a.name + " → SleepingCell : " + a.name + "が睡眠状態(３ターン：行動不可)になった");
                //通常状態から睡眠状態へ
                a.status = "sleeping";
            }
        } else {
            //ログ表示の追加
            System.out.println(a.name + " → SleepingCell : " + a.name + "が睡眠状態(３ターン：行動不可)になった");
            //通常状態から睡眠状態へ
            a.status = "sleeping";
        }
        return this;
    }
}

//InvincibleCellの追加：プレイヤーを無敵状態にする
class InvincibleCell extends SimpleCell{
    @Override
    void cellPrint() { System.out.print("\u001b[00;33m"+"* "+"\u001b[00m"); }       //文字色の変更

    @Override
    Cell affectOn(Actor a) {
        if(a instanceof Player){        //アクターが誰か確認
            //ログ表示の追加
            System.out.println(a.name + " → InvincibleCell : " + a.name + "が無敵状態(5ターン：ダメージ無効・状態異常無効)になった");
            //通常状態から無敵状態へ
            a.status = "invincible";
        } else {
            //ログ表示の追加
            System.out.println(a.name + " → InvincibleCell : 何も起こらない");
        }
        return this;
    }
}