// let boutonLien = document.getElementById('add-link');
let header = document.getElementById('header');
let test2 = document.getElementById('textarea');
let test3 = document.getElementById('div');
// let textarea = document.getElementById('textarea');
let test = document.getElementsByClassName('trumbowyg-textarea');


function addLink(){
    test3.innerHTML = "<a href=\"#\">Un Lien</a>";
}

function addButton(){
    // header.innerHTML = "<button>Un bouton</button>";
    test3.insertAdjacentHTML('beforeend', "<button>Un bouton</button>");
}

function insertHeader(){
    // let a = "<textarea>";
    // header.innerHTML = "<textarea>";
    // header.insertAdjacentHTML('beforeend', "</textarea>");
    // header.appendChild(a);
    // header.insertBefore("<textarea>");
    // document.createElement("textarea");
    // textarea.removeAttribute('style');
}