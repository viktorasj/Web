function buyer(name, surname, email) {
    this.name = name;
    this.surname = surname;
    this.email = email;
}

var vardas = document.getElementById('test').innerHTML;
var pavarde = document.getElementById('test1').innerHTML;
var mailas = document.getElementById('test2').innerHTML;


var buyer = new buyer(vardas, pavarde, mailas);

console.log(buyer);
