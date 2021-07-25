let page = document.getElementById('wysiwyg');

// let page = document.getElementById('trumbowyg');

// let test = document.getElementsByClassName('trumbowyg-textarea');


function addLink(){
    console.log("click");
    let html = `<a href="#" class="link">Un Lien</a>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addButton(){
    let html = `<button>Un bouton</button>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addBlackNavigation(){
    let html = `<ul class="navbar-horizontale">
                    <li class="li-horizontale-nav"><a href="#">Item 1</a></li>
                    <li class="li-horizontale-nav"><a href="#">Item 2</a></li>
                    <li class="li-horizontale-nav"><a href="#">Item plus long</a></li>
                </ul>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addDarkBlueNavigation(){
    let html = `<ul class="navbar2">
                   <li class="li-menu2"><a href="#">Home</a></li>
                   <li class="li-menu2"><a href="#">News</a></li>
                   <li class="li-menu2"><a href="#">Contact</a></li>
                </div>`;
    
    page.insertAdjacentHTML('beforeend', html);
}

function addSkyBlueNavigation(){
    let html = `<nav class="navbar3">
                    <ul>
                        <li><a href="#">Item1</a></li>
                        <li><a href="#">Item2</a></li>
                        <li><a href="#">Item3</a></li>
                        <li><a href="#">Item4</a></li>
                    </ul>
                </nav>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addDropDownMenuBlack(){
    let html = `<nav class="nav-dropdown-black">
                    <ul class="ul-menu-dropdown-black">
                        <li class="li-menu-dropdown-black deroulant-black"><a class="a-menu-dropdown-black" href="#">Item 1</a>
                            <ul class="sous-dropdown-black">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown-black"><a class="a-menu-dropdown-black" href="#">Item 2</a>
                            <ul class="sous-dropdown-black">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown-black"><a class="a-menu-dropdown-black" href="#">Item 3</a>
                            <ul class="sous-dropdown-black">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown-black"><a class="a-menu-dropdown-black" href="#">Item 4</a>
                            <ul class="sous-dropdown-black">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addDropDownMenuSkyBlue(){
    let html = `<nav class="nav-dropdown-skyblue">
                    <ul class="ul-menu-dropdown-skyblue">
                        <li class="li-menu-dropdown-skyblue deroulant-skyblue"><a class="a-menu-dropdown-skyblue" href="#">Item 1</a>
                            <ul class="sous-dropdown-skyblue">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown-skyblue"><a class="a-menu-dropdown-skyblue" href="#">Item 2</a>
                            <ul class="sous-dropdown-skyblue">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown-skyblue"><a class="a-menu-dropdown-skyblue" href="#">Item 3</a>
                            <ul class="sous-dropdown-skyblue">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown-skyblue"><a class="a-menu-dropdown-skyblue" href="#">Item 4</a>
                            <ul class="sous-dropdown-skyblue">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addDropDownMenuDarkBlue(){
    let html = `<nav class="nav-dropdown">
                    <ul class="ul-menu-dropdown">
                        <li class="li-menu-dropdown deroulant"><a class="a-menu-dropdown" href="#">Item 1</a>
                            <ul class="sous-dropdown">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown"><a class="a-menu-dropdown" href="#">Item 2</a>
                            <ul class="sous-dropdown">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown"><a class="a-menu-dropdown" href="#">Item 3</a>
                            <ul class="sous-dropdown">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown"><a class="a-menu-dropdown" href="#">Item 4</a>
                            <ul class="sous-dropdown">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>`;
    
    page.insertAdjacentHTML('beforeend', html);
}

function addText(){
    let html = `<p class="text-apparence">Zone de texte</p>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addTitle(){
    let html = `<h1>Un titre</h1>`;

    page.insertAdjacentHTML('beforeend', html);
}

// function addFooter(){
//     let html = `<div class="footer-apparence">
//                     <div class="contain">
//                         <div class="colonne-footer">
//                             <h1>Company</h1>
//                             <ul>
//                                 <li>About</li>
//                                 <li>Mission</li>
//                                 <li>Services</li>
//                                 <li>Social</li>
//                                 <li>Get in touch</li>
//                             </ul>
//                         </div>
//                         <div class="colonne-footer">
//                             <h1>Products</h1>
//                             <ul>
//                                 <li>About</li>
//                                 <li>Mission</li>
//                                 <li>Services</li>
//                                 <li>Social</li>
//                                 <li>Get in touch</li>
//                             </ul>
//                         </div>
//                         <div class="colonne-footer">
//                             <h1>Accounts</h1>
//                             <ul>
//                                 <li>About</li>
//                                 <li>Mission</li>
//                                 <li>Services</li>
//                                 <li>Social</li>
//                                 <li>Get in touch</li>
//                             </ul>
//                         </div>
//                         <div class="colonne-footer">
//                             <h1>Resources</h1>
//                             <ul>
//                                 <li>About</li>
//                                 <li>Mission</li>
//                                 <li>Services</li>
//                                 <li>Social</li>
//                                 <li>Get in touch</li>
//                             </ul>
//                         </div>
//                         <div class="colonne-footer">
//                             <h1>Support</h1>
//                             <ul>
//                                 <li>Contact us</li>
//                                 <li>Web chat</li>
//                                 <li>Open ticket</li>
//                             </ul>
//                         </div>
//                         <div class="colonne-footer social">
//                             <h1>Social</h1>
//                             <ul>
//                                 <li><img src="https://svgshare.com/i/5fq.svg" style="width: 32px;"></li>
//                                 <li><img src="https://svgshare.com/i/5fq.svg" style="width: 32px;"></li>
//                                 <li><img src="https://svgshare.com/i/5fq.svg" style="width: 32px;></li>
//                             </ul>
//                         </div>
//                         <div class="clearfix"></div>
//                     </div>
//                 </div>`;

//     page.insertAdjacentHTML('beforeend', html);
// }

function addRedButton(){
    let html = `<div class="div-red-button">
                    <a href="#" class="red-button-apparence">Button</a>
                </div>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addDarkBlueButton(){
    let html = `<div class="div-darkBlue-button">
                    <a href="#" class="darkBlue-button-apparence">Button</a>
                </div>`;

    page.insertAdjacentHTML('beforeend', html);
}

function addBlackButton(){
    let html = `<div class="div-black-button">
                    <a href="#" class="black-button-apparence">Button</a>
                </div>`;
    
    page.insertAdjacentHTML('beforeend', html);
}

function addPinkButton(){
    let html = `<div class="div-pink-button">
                    <a href="#" class="pink-button-apparence">Button</a>
                </div>`;
    
    page.insertAdjacentHTML('beforeend', html);
}

function addGreenButton(){
    let html = `<div class="div-green-button">
                    <a href="#" class="green-button-apparence">Button</a>
                </div>`;
    
    page.insertAdjacentHTML('beforeend', html);
}

function addGreyButton(){
    let html = `<div class="div-grey-button">
                    <a href="#" class="grey-button-apparence">Button</a>
                </div>`;
    
    page.insertAdjacentHTML('beforeend', html);
}

function addTemplateUn(){
    let html = `<div>
                    <div class="flex-menu">
                        <div class="menu-left-template-carousel">
                            <ul class="menu-template-carousel">
                                <li><a href="#">- Item 1</a></li>
                                <li><a href="#">- Item 2</a></li>
                                <li><a href="#">- Item 3</a></li><br />

                                <li><a href="#">- Item 4</a></li>
                                <li><a href="#>- Item 5</a></li>
                                <li><a href="#">- Item 6</a></li><br />

                                <li><a href="#">- Item 7</a></li>
                                <li><a href="#">- Item 8</a></li>
                                <li><a href="#">- Item 9</a></li><br />

                                <li><a href="#">- Item 10</a></li>
                                <li><a href="#">- Item 11</a></li>
                                <li><a href="#">- Item 12</a></li><br />
                            </ul>
                        </div>
        
    
                        <div class="h1-template-carousel">
                            <h1 class="titre-template-carousel">Titre de la page</h1>
                            
                            <div class="zone-texte-tpl1">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin feugiat nulla eu ex sodales, at lobortis eros semper.
                                Curabitur quis felis sit amet lectus tempus egestas. Proin sodales enim at metus accumsan, non vestibulum augue pharetra. 
                                Donec maximus lorem lectus, eget congue sem efficitur eu. Pellentesque habitant morbi tristique senectus et netus et 
                                malesuada fames ac turpis egestas. Mauris a mi nunc. Aliquam erat volutpat. Curabitur ac sodales justo. 
                                Suspendisse et elit rutrum, efficitur mauris eu, tristique odio. In finibus sit amet arcu vitae accumsan. 
                                Praesent tincidunt dignissim nulla, in porta velit sagittis at. Vestibulum hendrerit nulla ac nibh sodales vehicula. 
                                Sed ac congue lectus, sit amet convallis eros.
                                Phasellus vulputate nisl a posuere pulvinar. In ac velit augue. Aenean velit sem, facilisis eu volutpat et, semper 
                                at elit. Sed ut feugiat eros. Nam sed ultrices nulla. Proin accumsan interdum mi id ornare. 
                                In gravida ex vitae odio ornare congue.
                                </p>
                            </div>

                            <div class="div-darkBlue-button button-tpl1">
                                <a href="#" class="darkBlue-button-apparence">En savoir plus</a>
                            </div>
                            
                        </div>

                       

                    </div>
                </div>`;


    page.insertAdjacentHTML('beforeend', html);
}

function addTemplateDeux(){
    let html = `<nav class="nav-dropdown">
                    <ul class="ul-menu-dropdown">
                        <li class="li-menu-dropdown deroulant"><a class="a-menu-dropdown" href="#">Accueil</a></li>
                        <li class="li-menu-dropdown"><a class="a-menu-dropdown" href="#">A propos</a>
                            <ul class="sous-dropdown">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown"><a class="a-menu-dropdown" href="#">Nos offres</a>
                            <ul class="sous-dropdown">
                                <li><a href="#">Item 1</a></li>
                                <li><a href="#">Item 2</a></li>
                                <li><a href="#">Item 3</a></li>
                            </ul>
                        </li>
                        <li class="li-menu-dropdown"><a class="a-menu-dropdown" href="#">Contact</a></li>
                    </ul>
                </nav>
                
                <h1 class="h1-tpl2">Titre de votre page</h1>
                <div>
                    <div class="zone-texte-tpl2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin feugiat nulla eu ex sodales, at lobortis eros semper.
                        Curabitur quis felis sit amet lectus tempus egestas. Proin sodales enim at metus accumsan, non vestibulum augue pharetra. 
                        Donec maximus lorem lectus, eget congue sem efficitur eu. Pellentesque habitant morbi tristique senectus et netus et 
                        malesuada fames ac turpis egestas. Mauris a mi nunc. Aliquam erat volutpat. Curabitur ac sodales justo. 
                        Suspendisse et elit rutrum, efficitur mauris eu, tristique odio. In finibus sit amet arcu vitae accumsan. 
                        Praesent tincidunt dignissim nulla, in porta velit sagittis at. Vestibulum hendrerit nulla ac nibh sodales vehicula. 
                        Sed ac congue lectus, sit amet convallis eros.
                        Phasellus vulputate nisl a posuere pulvinar. In ac velit augue. Aenean velit sem, facilisis eu volutpat et, semper 
                        at elit. Sed ut feugiat eros. Nam sed ultrices nulla. Proin accumsan interdum mi id ornare. 
                        In gravida ex vitae odio ornare congue.
                        </p>
                    </div>
                </div>

                <div class="div-darkBlue-button button-tpl2">
                    <a href="#" class="darkBlue-button-apparence">En savoir plus</a>
                </div>

                
                
                `;

    page.insertAdjacentHTML('beforeend', html);
}


