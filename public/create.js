const submitButton = document.getElementById("submit");
const input1 = document.querySelector("#input1");   
const input2 = document.querySelector("#input1"); 
const input3 = document.querySelector("#input1"); 
const input4 = document.querySelector("#input1");  
const myAlert = document.getElementById("myAlert");

myAlert.style.display = "none";

submitButton.addEventListener("click", () => {
    if (input1.value === "") {
      if (input2.value === "") {
        if (input3.value === "") {
          if (input4.value === "") {
              myAlert.classList.add("alert-danger");
              myAlert.style.display = "block";
              myAlert.textContent = "Harap Untuk mengisi colom: Kode, Nama, Jam Masuk dan Jam Keluar";
              myAlert.classList.remove("alert-success");
          }
        }
      }
    }else {
        myAlert.style.display = "block";
        myAlert.textContent = "Absensi Berhasil";
        myAlert.classList.add("alert-success");
        myAlert.classList.remove("alert-danger");
    }
});