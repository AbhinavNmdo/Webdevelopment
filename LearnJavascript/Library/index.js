function Book(name, author, type) {
    this.name = name;
    this.author = author;
    this.type = type;
};

class Display{
    add(book){
        let books = localStorage.getItem('books');
        let availableBook;
        if(books == null){
            availableBook = [];
        }
        else{
            availableBook = JSON.parse(books);
        }
        let obj = {
            name: book.name,
            author: book.author,
            type: book.type
        }
        availableBook.push(obj)
        localStorage.setItem('books', JSON.stringify(availableBook));
        // let row = `<tr>
        //             <td>${book.name}</td>
        //             <td>${book.author}</td>
        //             <td>${book.type}</td>
        //         </tr>`;
        // let table = document.getElementById('table');
        // table.innerHTML += row;
    };

    show(){
        let books = localStorage.getItem('books');
        if(books == null){
            availableBook = [];
        }
        else{
            availableBook = JSON.parse(books);
        }
        let row = "";
        let table = document.getElementById('table');
        availableBook.forEach(function (element){
            row = `<tr>
                                    <td>${element.name}</td>
                                    <td>${element.author}</td>
                                    <td>${element.type}</td>
                                </tr>`;;
        });
        if(availableBook.length != 0){
            table.innerHTML += row;
        }
        else{
            table.innerText = "Nothing to show";
        }
    };

    clear(){
        let form = document.getElementById('librarybook');
        form.reset();
    };

    validate(book){
        if(book.name.length < 2 || book.author.length < 2){
            return false;
        }
        else{
            return true;
        }
    };

    alert(type, msg){
        let msgalert = document.getElementById('msgalert')
        msgalert.innerHTML = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
        <strong>Message:</strong> ${msg}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`
      setTimeout(() => {
          msgalert.innerHTML = ``;
      }, 5000);
    };
}

let addbook = document.getElementById('addbook');
addbook.addEventListener('click', function library(e) {
    let bookname = document.getElementById('bookname').value;
    let bookauthor = document.getElementById('bookauthor').value;
    let booktype;
    let science = document.getElementById('science');
    let cooking = document.getElementById('cooking');
    let programming = document.getElementById('programming');

    if(science.selected){
        booktype = science.value;
    }
    else if(cooking.selected){
        booktype = cooking.value;
    }
    else if(programming.selected){
        booktype = programming.value;
    }
    e.preventDefault();
    let display = new Display();
    let book = new Book(bookname, bookauthor, booktype);
    if(display.validate(book)){
        display.add(book);
        display.clear();
        display.show()
        display.alert('success', 'Successful Added');
    }
    else{
        display.show();
        display.alert('danger', 'Not Added');
        display.clear();
    }
});