const submitButton = document.getElementById("submit");  // Use a more descriptive name
const inputs = document.querySelectorAll("#input");     // Handle multiple inputs
const myAlert = document.getElementById("myAlert");

myAlert.style.display = "none";

submitButton.addEventListener("click", () => {

  inputs.forEach((input) => {
    if (input.value === "") {
        myAlert.classList.add("alert-danger");
        myAlert.style.display = "block";
        myAlert.textContent = "Harap Untuk mengisi colom: Kode, Nama, Jam Masuk dan Jam Keluar";
        myAlert.classList.remove("alert-success");
    }else {
        myAlert.style.display = "block";
        myAlert.textContent = "Absensi Berhasil";
        myAlert.classList.add("alert-success");
        myAlert.classList.remove("alert-danger");
    }
  });
});