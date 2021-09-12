// Creating Element
let divele = document.createElement('div');
// Giving Class and Ids
divele.className = 'select';
divele.id = 'select';
divele.setAttribute('style', 'border:2px solid black; display: flex; justify-content: center; align-item: center; padding: 45px; font-size: 40px;');
// Giving TextNode
let val = localStorage.getItem('text');
let tet;
if (val == null){
    tet = document.createTextNode('Click here to edit');
}
else {
    tet = document.createTextNode(val);
}

divele.appendChild(tet);

// Append where to show
let cont = document.querySelector('.container');
let head = document.querySelector('.heading');
cont.insertBefore(divele, head)
// Add Event Listner
divele.addEventListener('click', function(){
    let noText = document.getElementsByClassName('textarea').length;
    if (noText == 0){
        let text = select.innerHTML;
        divele.innerHTML = `<textarea id="textarea" class="from-control textarea" rows="3">${text}</textarea>`;
        let textarea = document.getElementById('textarea');
        textarea.addEventListener('blur', function(){
            select.innerHTML = textarea.value;
            localStorage.setItem('text', textarea.value);
        })

    }
})
// console.log(divele);