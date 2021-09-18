let abhay = {
    name: "Abhay",
    role: "Programmer",
    salery: 6000000
};

function ashu(name) {
    this.name = name;
};

ashu.prototype.getname = function gii() {
    return "i m a constructor";
};

let ashu2 = new ashu("ashu");
console.log(ashu2);

