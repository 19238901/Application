import UIKit
/*
var greeting = "Hello, playground"
1 + 2
1 + 5

var a = 1
var b = 2
var c = 3
var d = a + b + c
c = 4
d = a + b + c
c = 5
d = d + a + b + c

var t:String = """
    BMI計算
    """
var w = 1.62
var h:Double = 48
var bmi = h / (w * w)
let res = "\(bmi)です"

var name = "明石"
name += "華実"
let who = name + "さん"

let n = [1, 2, 3, 4, 5]
var sum = 0
for i in n {
    sum += i
}
print("合計\(sum)")

var sum = 0
for i in 0 ..< 100 {
    sum += i
}
print("合計\(sum)")

var sum = 0
for i in 0 ... 100 {
    sum += i
}
print("合計\(sum)")

for x in 0 ..< 360*2 {
    let r = Double(x) * Double.pi / 180
    let y = sin(r)
    print(x, y)
}

var star = ""
for _ in 0 ..< 5 {
    star += "★"
    print(star)
}

var num : Int {
    let res = 2 * 5
    return res
}
print(num)

var num2 : Int {
    2 * 5
}
print(num2)
*/
/*
var r = 10.0
var d:Double {
    get {
        r * 2
    }
    set (l) {
        r = l / 2
    }
}
var a:Double{
    get {
        let l = 2 * r * Double.pi
        return l
    }
    set (l) {
        r = l / (2 * Double.pi)
    }
}
print("半径\(r)の時の直径の長さは\(d)")
d = 30.0
print("直径\(d)の時の半径の長さは\(r)")
a = 100.0
print("円周の長さ\(a)の円の半径は\(r)")
*/
/*
let week:[String]
var nums:[Int]
week = ["月", "火", "水", "木", "金", "土", "日"]
nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
print(week)
print(nums)
*/
/*
let a = ["a", "b"]
let b = ["1", "2"]
let c = a + b
print(c)
*/
/*
var word = ["a", "b", "c", "d", "e"]
word[1...2] = ["1", "2", "3", "4", "5"]
print(word)
*/
/*
var word:[String] = []
word.append("花")
word.append("鳥")
word.append("風")
word.append("月")
print(word)
*/
/*
var mem = [String]()
mem.append("a")
mem.append("b")
mem.append("c")
mem.append(contentsOf: ["1", "2", "3"])
print(mem)
*/
/*
import UIKit

var data = Array<Double>()
let data1 = [1.2, 9.4, 2.1]
let data2 = [3.9, 5.3, 1.6]
data += data1
data += data2
data.sort()
print(data)
*/
/*
let name = ["a", "b", "c"]
let half = name.count/2
let group1 = name[..<half]
let group2 = name[half...]
print(group1)
print(group2)
*/
/*
func incrimentNums(nums:inout [Int]) {
    for i in 0 ..< nums.count {
        nums[i] += 1
    }
}
var data = [3, 5, 9]
print(data)
incrimentNums(nums: &data)
print(data)
*/
/*
struct Member {
    let name: String
    var level = 1
    var age: Int
}
var member1 = Member(name: "鈴木", age: 19)
var member2 = Member(name: "田中", level: 5, age: 23)

let text1 = "\(member1.name)さん \(member1.age)歳 レベル\(member1.level)"
print(text1)

member2.level += 1
let text2 = "\(member2.name)さん \(member2.age)歳 レベル\(member2.level)"
print(text2)

let ageSum = member1.age + member2.age
let text3 = "年齢の合計：\(ageSum)歳"
print(text3)
*/
/*
func calc(aduld: Int = 0, child: Int = 0) -> Int{
    let money = aduld * 1200 + child * 500
    return money
}

let price = calc(aduld: 3, child: 2)
print(price)

let adult1 = calc(aduld: 1)
let child2 = calc(child: 2)
print("大人１人 \(adult1)")
print("大人１人 \(child2)")
*/
/*
var isPlay = false

func play() -> Void {
    isPlay = true
}

play()
print(isPlay)
*/
/*
for _ in 1 ... 5 {
    let num = Int.random(in: 0 ..< 1)
    print(num)
}
*/
/*
for _ in 1 ... 5 {
    let num = Double.random(in: 0 ..< 1)
    print(num)
}
*/
/*
for _ in 1 ... 5 {
    let num = Bool.random()
    print(num)
}
*/
/*
let color = ["red", "blue", "green"]
for _ in 1 ... 5 {
    let item = color.randomElement()
    print(item!)
}
*/
/*
let char = "ABCDEFGHIJKLMN"
for _ in 1 ... 5 {
    let item = char.randomElement()
    print(item!)
}
*/

func hantei(tokuten: Int) -> String {
    var result = "結果：\(tokuten)"
    if(tokuten >= 80){
        result += " → 合格"
    } else {
        result += " → 不合格"
    }
    return result
}
let test1 = hantei(tokuten: 67)
let test2 = hantei(tokuten: 82)
let test3 = hantei(tokuten: 56)
print(test1)
print(test2)
print(test3)
