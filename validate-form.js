const emailInput = document.getElementById("email");
const emailFeedback = document.getElementById("email-feedback");
const submitButton = document.querySelector(".register-submit-btn");

emailInput.addEventListener("input", function(){
    const email = emailInput.value.trim();

    emailFeedback.textContent = "";
    submitButton.disabled = true;

    if(email.length > 0){
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "validate_email.php?email=" + encodeURIComponent(email), true);

        xhttp.onload = function(){
            if(xhttp.status === 200){
                const response = xhttp.responseText;
                if(response === "exists"){
                    emailFeedback.textContent = "This email is allready registered.";
                    emailFeedback.className = "reg-error";
                    submitButton.disabled = true;
                } else if(response === "available"){
                    emailFeedback.textContent = "This email is available.";
                    emailFeedback.className = "reg-success";
                    submitButton.disabled = false;
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