function editProductInfo() {
  var edits = document.querySelectorAll(".info-field-input");
  var pen = document.querySelector(".fa-pen");
  var button = document.querySelector(".button-save");

  pen.addEventListener("click", () => {
    button.style.display = "block";
    edits.forEach((edit) => {
      edit.removeAttribute("readonly");
    });
  });
}

function setDateSale() {
    const dateSaleInput = document.getElementById("dateSale");
    let currentDate = new Date();
    dateSaleInput.addEventListener("change", () => {
        let dateSale = new Date(dateSaleInput.value);
        if (dateSale < currentDate) {
            dateSaleInput.value = currentDate.toISOString().slice(0, 10);
        }
    })
}