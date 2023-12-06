const selector = document.querySelector.bind(document);
const selectorAll = document.querySelectorAll.bind(document);

var change = true;
// Phần tử chuyển form
const changeElement = selectorAll(".change-form");
const formLogin = selector("#form-login");
const formSignin = selector("#form-signin");

// Phần tử mật khẩu
const password = selector("#account-password-signin-input");
const repassword = selector("#account-repassword-signin-input");
const warning_repass = selector("#warning-repass");
const warning_pass = selector("#warning-pass");
const warning_account = selector("#warning-acc");
function ChangeForm() {
    changeElement.forEach((ChangeFormElement, index) => {
        ChangeFormElement.addEventListener("click", () => {
            change = !change;
            if (change) {
                formLogin.style.display = "flex";
                formSignin.style.display = "none";
            } else {
                formLogin.style.display = "none";
                formSignin.style.display = "flex";
            }
        });
    });
}


function checkInfoSignIn() {
    const accountName = selector("#account-name-input-signin");
    const signInBtn = selector("#submit-login-input");
    const password = selector("#account-password-signin-input");
    accountName.addEventListener("blur", () => {
        if (
            accountName.value !=
            accountName.value
                .normalize("NFD")
                .replace(/[\u0300-\u036f]/g, "")
                .replace(/\s/g, "")
        ) {
            warning_account.classList.remove("none");
            
        } else {
            warning_account.classList.add("none");
        }
    });
    password.addEventListener("blur", () => {
        if (password.value.length >= 8) {
            warning_pass.classList.add("none");
        } else {
            warning_pass.classList.remove("none");
        }
    });
    repassword.addEventListener("blur", () => {
        if (repassword.value != password.value) {
            warning_repass.classList.remove("none");
        } else {
            warning_repass.classList.add("none");
        }
    });
}
ChangeForm();
checkInfoSignIn();
