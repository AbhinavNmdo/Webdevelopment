console.log("Hello");
// Creating Element
let element = document.createElement('a');
// Setting Class and Ids
element.innerText = 'BazarOffline';
element.className = 'bazar';
element.id = 'offline';
// Select where to add this text
let cont = document.querySelector('.container');
// Printing the element
cont.appendChild(element);
// Setting attribute
element.setAttribute('href', 'https://bazaroffline.000webhostapp.com/');
console.log(element);