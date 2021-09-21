console.log("Welcome to Alarm App");
let btn = document.getElementById('submittime');
btn.addEventListener('click', function (e) {
    e.preventDefault();
    let alarm = document.getElementById('alarmtime');
    let alarmtype = document.getElementById('alarmtype');
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
    alarm.value = "";
});
