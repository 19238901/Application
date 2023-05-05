import UIKit

class MyFriend {
    var name: String
    var age: Int
    
    init(name: String, age: Int) {
        self.name = name
        self.age = age
    }
    
    func hello() -> String {
        let message = "Hello! \(name) です。 \(age) 歳です。"
        return message
    }
}

class GoodFriend: MyFriend {
    let fortune = ["大吉", "吉", "小吉", "凶"]
    var nickname: String
    
    init(name: String, age: Int, nickname: String) {
        self.nickname = nickname
        super.init(name: name, age: age)
    }
    
    func unsei() -> String {
        let index = Int.random(in: 0 ..< fortune.count)
        let result = "今日の運勢：" + fortune[index]
        return result
    }
    
    func who() -> String {
        return "I'm " + name + ". Nice to meet you!"
    }
}

class player {
    var name: String = ""
    func hello() {
        print("Hi! " + name)
    }
}
extension player {
    var who: String {
        get {
            return name
        }
        set(value) {
            name = value
        }
    }
    
    func bye() {
        print("Bye! " + name)
    }
}
/*
let friend1 = MyFriend(name: "植木", age: 31)
let friend2 = MyFriend(name: "さくら", age: 26)

let str1 = friend1.name + " と " + friend2.name + " は、友達です。"
let str2 = friend1.name + " は " + String(friend1.age) + " 歳です。"

friend2.age += 1

let str3 = friend2.name + " は、誕生日で " + String(friend2.age) + " 歳になりました。"

print(str1)
print(str2)
print(str3)

let str4 = friend1.hello()
let str5 = friend2.hello()

print(str4)
print(str5)
*/
/*
let friend3 = GoodFriend(name: "のん", age: 12, nickname: "NON")
let unsei = friend3.unsei()
let iam = friend3.who()
let msg = friend3.hello()

print(unsei)
print(iam)
print(msg)
*/
let user = player()
user.who = "健治"
user.hello()
user.bye()
