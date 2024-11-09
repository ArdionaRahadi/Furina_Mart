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
