const emailInput = document.getElementById("email");
const emailFeedback = document.getElementById("email-feedback");
const submitButton = document.querySelector(".register-submit-btn");

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// event listener for checking if email is present in the database
emailInput.addEventListener("input", function(){
    const email = emailInput.value.trim();

    emailFeedback.textContent = "";
    submitButton.disabled = true;

    if(isValidEmail(email)){
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "validate_email.php?email=" + encodeURIComponent(email), true);

        xhttp.onload = function(){
            if(xhttp.status === 200){
                const response = xhttp.responseText;
                if(response === "exists"){
                    emailFeedback.textContent = "This email is allready registered.";
                    emailFeedback.className = "reg-error";
                    submitButton.disabled = true;
                    emailInput.style.border = "2px solid red";
                    emailInput.style.outline = "none";
                } else if(response === "available"){
                    emailFeedback.textContent = "This email is available.";
                    emailFeedback.className = "reg-success";
                    submitButton.disabled = false;
                    emailInput.style.borderColor = "green";
                } else{
                    emailFeedback.textContent = "Error validating email.";
                    emailFeedback.className = "reg-error";
                    submitButton.disabled = true;
                }
            }
        }
        xhttp.send();
    }
})
