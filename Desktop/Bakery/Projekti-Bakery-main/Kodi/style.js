const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");

signupBtn.onclick = (()=>{
 loginForm.style.marginLeft = "-50%";
 loginText.style.marginLeft = "-50%";
});

loginBtn.onclick = (()=>{
 loginForm.style.marginLeft = "0%";
 loginText.style.marginLeft = "0%";
});

signupLink.onclick = (()=>{
 signupBtn.click();
 return false;
});

// Add a submit event listener to the login form
loginForm.addEventListener("submit", function (event) {
  // Prevent the default form submission behavior
  event.preventDefault();
  
  // Redirect to the Home page
  redirectToHomePage();
});

// Function to redirect to the Home page
// function redirectToHomePage() {
//   // Assuming you want to redirect to "Bakery.html"
//   window.location.href = "Bakery.html";
// }
