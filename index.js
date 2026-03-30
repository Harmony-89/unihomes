let logPage = document.querySelector(".logSect");
let signPage = document.querySelector(".signSect");
let login = document.querySelector("#loginbtn");
let login2 = document.querySelector("#loginbtn2");
let signin = document.querySelector("#signbtn");
let signin2 = document.querySelector("#signbtn2");
let xmark = document.querySelector("#exit");
let xmark2 = document.querySelector("#exit2");

login.addEventListener("click", function () {
  logIn();
});
login2.addEventListener("click", function () {
  logIn();
});
signin.addEventListener("click", function () {
  signIn();
});
signin2.addEventListener("click", function () {
  signIn();
});
xmark.addEventListener("click", function () {
  close();
});
xmark2.addEventListener("click", function () {
  close();
});

function logIn() {
  if (signPage.classList.contains("active")) {
    signPage.classList.remove("active");
    logPage.classList.toggle("active");
  } else {
    logPage.classList.toggle("active");
  }
}

function signIn() {
  if (logPage.classList.contains("active")) {
    logPage.classList.remove("active");
    signPage.classList.toggle("active");
  } else {
    signPage.classList.toggle("active");
  }
}

function close() {
  logPage.classList.remove("active");
  signPage.classList.remove("active");
}

// GO BACK FEATURE
let back = document.querySelector("#backBtn");
back.addEventListener("click", function () {
  window.history.back();
});
