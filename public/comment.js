
const b = document.getElementById('b');
const i = document.getElementById('i');
const u = document.getElementById('u');
const text = document.getElementById('text');
const form = document.querySelector('form');

b.addEventListener('click', ()=>{
    text.innerHTML = "<b><input type='text' name='comment' id='text'></b>";
});