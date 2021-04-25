let input = document.getElementById('add-page');
let label = document.getElementById('label');
let button = document.getElementById('submit-button');
let cancelButton = document.getElementById('cancel-button');
let addButton = document.getElementById('button-add-page');

function displayInput(){
    input.removeAttribute('style');
    label.removeAttribute('style');
    button.removeAttribute('style');
    cancelButton.removeAttribute('style');
    addButton.setAttribute('style', 'display: none;');

}

function cancel(){
    input.setAttribute('style', 'display: none;');
    label.setAttribute('style', 'display: none;');
    button.setAttribute('style', 'display: none;');
    cancelButton.setAttribute('style', 'display: none;');
    addButton.removeAttribute('style');
}
