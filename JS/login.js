

function check_for_username() {
    var user_mail = document.getElementById("user_mail").value;

    if (user_mail.length >= 5 && user_mail.includes("@")) {
        console.log("Email format is valid");
        console.log(user_mail);
    } else {
        console.log("Email format is not valid");
        console.log(user_mail);
    }
}

function check_systeminfo() {
    document.getElementById("res").value = window.innerHeight + "x" + window.innerWidth;

    var operatingSystem = "Unknown os";
    if (navigator.userAgent.indexOf("Win") != -1) operatingSystem = "Windows";
    if (navigator.userAgent.indexOf("Mac") != -1) operatingSystem = "Macos";
    if (navigator.userAgent.indexOf("Linux") != -1) operatingSystem = "Linux";
    if (navigator.userAgent.indexOf("Android") != -1) operatingSystem = "Android";

    document.getElementById("os").value = operatingSystem;
const loginDate = new Date();

const day = loginDate.getDay();

const weekdays = ["Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag"];

let dayOfTheWeek = weekdays[day];

document.getElementById("userdate").value = loginDate;
document.getElementById("userweekday").value = dayOfTheWeek;

}

function sending() {
    check_for_username();
    check_systeminfo();
}
