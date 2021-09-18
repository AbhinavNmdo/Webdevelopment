showNotes();
let addbtn = document.getElementById('addnote');
addbtn.addEventListener('click', function () {
    let title = document.getElementById('title');
    let textarea = document.getElementById('textarea');
    let notes = localStorage.getItem('notes');
    if (notes == null) {
        notesArry = [];
    }
    else {
        notesArry = JSON.parse(notes);
    }
    let obj = {
        title: title.value,
        notes: textarea.value
    };
    notesArry.push(obj);
    localStorage.setItem('notes', JSON.stringify(notesArry));
    textarea.value = "";
    title.value = "";
    showNotes();
});

function showNotes() {
    let notes = localStorage.getItem('notes');
    if (notes == null) {
        notesArry = [];
    }
    else {
        notesArry = JSON.parse(notes);
    }

    let html = "";
    notesArry.forEach(function (element, index) {
        html += `<div class="cardNote col-md-4">
        <div class="row-md-4 m-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title ${element.title}</h5>
                <br>
                <p class="card-text">${element.notes}</p>
                <br>
                <button id="${index}" onclick="deleteNotes(this.id)" class="btn btn-primary">Delete Note</button>
            </div>
            </div>
        </div>
        </div>`;
    });

    let appe = document.getElementById('notes');
    if (notesArry.length != 0) {
        appe.innerHTML = html;
    }
    else {
        appe.innerHTML = "Nothing to Show Here, Please Add note first";
    }
}

function deleteNotes(index) {
    console.log(index);
    let notes = localStorage.getItem('notes');
    if (notes == null) {
        notesArry = [];
    }
    else {
        notesArry = JSON.parse(notes);
    }

    notesArry.splice(index, 1);
    localStorage.setItem('notes', JSON.stringify(notesArry));
    showNotes();
}

let search = document.getElementById('searchTxt');
search.addEventListener('input', function(){
    let value = search.value.toLowerCase();
    let cardNote = document.getElementsByClassName('cardNote');
    Array.from(cardNote).forEach(function(element){
        let searchtext = element.getElementsByTagName('p')[0].innerText.toLowerCase();
        if (searchtext.includes(value)){
            element.style.display = 'block';
        }
        else {
            element.style.display = 'none';
        }
    })

})