var a = 3;
var b = 4;
var c = 5;

/*
if((a+b > c) && (a+c > b) && (b+c > a)){

}
*/

/*
var y ="";
var x = hello(y);

function hello(e){

    console.log("hello");
    return e;
}

console.log(x);
*/

//var a = "Hello Word";



function tinhtuoi(y, m, d){
    var input = new Date(year, month, date);
    var current = new Date();
    var birthday = new Date((current.getFullYear(), month, date) / (24 * 60 * 60 * 1000));
    var yearage, dayage;

    yearage = current.getFullYear() - year;
    dayage = parseInt(current.getTime() - birthday.getTime());
    console.log("Bạn được "+yearage+" tuổi "+dayage+" ngày.")
}