function asideactive()
{
    var menu = document.querySelector(".lemenu");

    menu.classList.toggle("active");   
}


function QSecrete()
{
var Connexion = document.getElementById("connexion");
var getQsecrete = document.getElementById("formQsecrete");

var Qsecrete = document.getElementById('Qsecrete');
var formConnexion = document.getElementById('formConnexion');

    formConnexion.classList.add('planque');
    Qsecrete.classList.add('show');
    Qsecrete.classList.remove('planque');
    Connexion.classList.add('planque');
    getQsecrete.classList.add('show');
    getQsecrete.classList.remove('planque');
}
