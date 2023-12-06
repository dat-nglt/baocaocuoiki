// var countDown = new Date("November 6, 2023 0:0:0").getTime();
// var countDownInterval = setInterval(() => {
//     var nowTime = new Date().getTime();
//     var distance = countDown - nowTime;
//     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//     var hours = Math.floor(
//         (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
//     );
//     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//     var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//     document.getElementById("time").innerHTML =
//         "Chỉ còn: " +
//         days +
//         " ngày " +
//         hours +
//         " giờ " +
//         minutes +
//         " phút " +
//         seconds +
//         " giây ";

//     if (distance < 0) {
//         clearInterval(countDownInterval);
//         document.getElementById("time").innerHTML =
//             "Đã kết thúc thời gian sale";
//     }
// });

function changeFormInfo() {
  const infoFormBtn = document.querySelector("#info-form-account");
  const passFormBtn = document.querySelector("#info-password-account");
  const infoBasicForm = document.querySelector("#info-basic-form");
  const infoPasswordForm = document.querySelector("#info-password-form");
  infoFormBtn.addEventListener("click", () => {
    passFormBtn.classList.remove("active");
    infoFormBtn.classList.add("active");
    infoPasswordForm.style.display = "none";
    infoBasicForm.style.display = "";
  });
  passFormBtn.addEventListener("click", () => {
    infoFormBtn.classList.remove("active");
    passFormBtn.classList.add("active");
    infoBasicForm.style.display = "none";
    infoPasswordForm.style.display = "";
  });
}

function checkPassword() {
  const passwordField = document.querySelector("#password-field");
  const repasswordField = document.querySelector("#repassword-field");
  const warningPass = document.querySelector("#warning-pass");
  repasswordField.addEventListener("blur", () => {
    if (passwordField.value != repasswordField.value) {
      warningPass.style.display = "";
      repasswordField.value = "";
    } else {
      warningPass.style.display = "none";
    }
  });
}
