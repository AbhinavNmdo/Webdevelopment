console.log("Welcome to Alarm App");
let btn = document.getElementById('submittime');
let btn1 = document.getElementById('stopalarm');

btn1.addEventListener('click', function (e) {
    e.preventDefault();
    stopAlarm();
});

btn.addEventListener('click', function (e) {
    e.preventDefault();
    let alarm = document.getElementById('alarmtime');
    let alarmtype = document.getElementById('alarmtype');
    if(alarm.value.length>0){
        if(alarmtype.value == 'date'){
            time1 = (alarm.value)*84600000;
            console.log(time1);
        }
        else if(alarmtype.value == 'hour'){
            time1 = (alarm.value)*3600000;
            console.log(time1);
        }
        else if(alarmtype.value == 'min'){
            time1 = (alarm.value)*60000;
            console.log(time1);
        }
        else if(alarmtype.value == 'sec'){
            time1 = (alarm.value)*1000;
            console.log(time1);
        }
    }
    alarm.value = "";
    alarmtype.value = "null";
    ringAlarm(time1);
});

var audio = new Audio('https://kukuklok.com/audio/alien.mp3');
let form = document.getElementById('form');
let bell = document.getElementsById('bell');
function ringAlarm(timer) {
    setTimeout(() => {
        audio.play();
    }, timer);
    // form.style.display = "none";
    bell.style.display = "block";
}
function stopAlarm() {
    audio.pause();
    audio.currentTime = 0;
    form.style.display = "flex";
    bell.style.display = "none";
}
