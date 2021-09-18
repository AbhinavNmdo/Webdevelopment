function Employees(name, role, salery, branch) {
    this.name = name;
    this.role = role;
    this.salery = salery;
    this.branch = branch;
};

let ashu = new Employees('Ashu', 'CA', '5000000', 'Google');
console.log(ashu);

function Programmer(name, role, salery, branch, language) {
    Employees.call(this, name, role, salery, branch);
    this.language = language;
};

let abhay = new Programmer('Abhay', 'Programmer', '6000000', 'Google', 'Java, Python, HTML, CSS, Javascript');
console.log(abhay);