let page = document.getElementById('div');

// let test = document.getElementsByClassName('trumbowyg-textarea');


function addLink(){
    let html = `<a href="#" class="link" id="draggable-elmt">Un Lien</a>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addButton(){
    let html = `<button id="draggable-elmt">Un bouton</button>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addNavigation(){
    let html = `<ul id="draggable-elmt">
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                    <li><a href="#">Item plus long</a></li>
                </ul>`;


    page.insertAdjacentHTML('beforeend', html);
}

function addImage(){
    let html = `<input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">`;

    page.insertAdjacentHTML('beforeend', html);
}

//Ajouter un menu de navigation
//Insertion d'un mini formulaire ?