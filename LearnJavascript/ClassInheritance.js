class Emplayees{
    constructor(name, role, salery, company){
        this.name = name;
        this.role = role;
        this.salery = salery;
        this.company = company;
    };

    slogan(){
        return `Hello, I am ${this.name}, and this company is best`;
    };

    static add(a, b){
        return a + b ;
    }
};

let ashu = new Emplayees('Ashu', 'CA', '5000000', 'Google');

console.log(ashu);
console.log(ashu.slogan());
console.log(Emplayees.add(45, 65));


class Programmer extends Emplayees{
    constructor(name, role, salery, company, language, github){
        super(name, role, salery, company);
        this.language = language;
        this.github = github;
    };

    favoritelanguage(){
        return "Python";
    };
};

let abhay = new Programmer('Abhay', 'Programmer', 6000000, 'Google, Amazaon', 'Java, Python, HTML, CSS, Javascript', 'AbhinavNmdo');
console.log(abhay);
console.log(abhay.slogan());
console.log(abhay.favoritelanguage());