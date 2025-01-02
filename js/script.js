// Show Password
let check = document.getElementById("show-pw");
let passwd = document.getElementById("password");
check.addEventListener("click", () => {
    if (passwd.type === "password") {
        passwd.type = "text";
    } else {
        passwd.type = "password";
    }
});

const forgot = document.getElementById("forgot-password");
forgot.addEventListener("click", function () {
    Swal.fire({
        title: "👋👋👋",
        text: "Usernamenya admin, Passwordnya admin#123",
        icon: "info",
        showConfirmButton: false
    });
});
