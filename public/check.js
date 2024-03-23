const cek = document.getElementById("checkbox");
const pas = document.getElementById("pass");
const confir = document.getElementById("confirm");
const cek2 = document.getElementById("checkbox2");

cek.checked = false;
cek2.checked = false;


cek.addEventListener("click",()=>{
    if(cek.checked){
        pas.type = "text";
    }else{
        pas.type = "password";
    }
});
cek2.addEventListener("click", ()=>{
    if(cek2.checked){
        confir.type = "text";
    }else{
        confir.type = "password";
    }
});