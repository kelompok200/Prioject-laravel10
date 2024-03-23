const cek = document.getElementById("checkbox");
const pas = document.getElementById("pass");
cek.checked = false;

cek.addEventListener("click",()=>{
    if(cek.checked){
        pas.type = "text";
    }else{
        pas.type = "password";
    }
});