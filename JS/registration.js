let password = '';

function generatePassword() {
    var chars = "abcdefghijklmnopqrstuvwxyz1234567890";
    for (let i = 0; i < 12; i++) {
        var randomNumber = Math.floor(Math.random() * chars.length);
        password += chars.substring(randomNumber, randomNumber + 1);
    }
    console.log(password);
}

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

    const userdate = new Date();


    const newDate = userdate.getDate()
    const day = userdate.getDay();

    const weekdays = ["Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag"]

    let dayOfTheWeek = weekdays[day]

    document.getElementById("date").value = newDate;
    document.getElementById("weekday").value = dayOfTheWeek;
}

function sending_data() {
    generatePassword();
    document.getElementById("pw").value = password;
    check_for_username();
    check_systeminfo();
}
