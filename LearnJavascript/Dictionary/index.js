console.log("Hii all done");
let btn = document.getElementById('searchsub');
btn.addEventListener('click', (e) => {
    let search = document.getElementById('searchtxt').value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `https://api.dictionaryapi.dev/api/v2/entries/en/${search}`, true);
    
    xhr.onload = function () {
        if (this.status === 200){
            let json = JSON.parse(this.responseText);
            console.log(json);
            let meaning = json.meanings;
            let audio = json.phonetics.audio;
            let result = ``

        }
    }
    xhr.send();
    e.preventDefault();
});