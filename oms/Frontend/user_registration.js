document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault();
    console.log('hyyy');
    const form = e.target;
    const password = form.upass.value;
    console.log(password);
    const confirmpassword = form.confirmupass.value;
    console.log(confirmpassword);
    const mobile = form.mobile.value;
    console.log(mobile);
    const email = form.email_id.value;
    console.log(email);
    const errorContainer = getElementById('errorContainer');
    errorContainer.innerHTML = '';

    let hasError = false;

    // Checking confirm password with password
    if(confirmpassword != password){
        document.getElementById('confirmupass').style.borderColor = "red";
        document.getElementById('passerrormsg').textContent = 'Confirm Password must be same as password';
        hasError = true;
    }else {
        document.getElementById('confirmupass').style.borderColor = "";
        document.getElementById('passerrormsg').textContent = "";
    }

    // Checking length of mobile number
    if(!/^\d{10}$/.test(mobile)){
        document.getElementById('mobile').style.borderColor = "red";
        document.getElementById('mobileerrormsg').textContent = 'Mobile must be of 10 number';
        hasError = true;
    }else {
        document.getElementById('mobile').style.borderColor = "";
        document.getElementById('mobileerrormsg').textContent = "";
    }


    const emailRegex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)){
        document.getElementById('email_id').style.borderColor = "red";
        document.getElementById('emailerrormsg').textContent = 'Invalid email format';
        hasError = true;
    }else {
        document.getElementById('email_id').style.borderColor = "";
        document.getElementById('emailerrormsg').textContent = "";
    }

    const minLength = 8;
    const hasLowercase = /[a-z]/.test(password);
    const hasUppercase = /[A-Z]/.test(password);
    const hasDigit = /\d/.test(password);
    const hasSpecialChar = /[@$!%*?&]/.test(password);

    const errors = [];
    if (password.length < minLength) errors.push("Password must be at least 8 characters long.");
    if (!hasLowercase) errors.push("Password must include at least one lowercase letter.");
    if (!hasUppercase) errors.push("Password must include at least one uppercase letter.");
    if (!hasDigit) errors.push("Password must include at least one digit.");
    if (!hasSpecialChar) errors.push("Password must include at least one special character (@$!%*?&).");
    // Display Errors
     if(errors.length > 0) {
        for (let i = 0; i < errors.length; i++) {
          const errorItem = document.createElement("li");
          errorItem.textContent = errors[i];
          errorContainer.appendChild(errorItem);
        }
      };

    // If there are no errors, allow form submission
    if (!hasError) {
    form.submit();
    }

});

// Check for username error
const unameError = localStorage.getItem('unameError');
if (unameError) {
    document.getElementById('unameerrormsg').textContent = unameError;
    localStorage.removeItem('unameError'); // Clear the message
}

// Check for email error
const emailError = localStorage.getItem('emailError');
if (emailError) {
    document.getElementById('emailerrormsg').textContent = emailError;
    localStorage.removeItem('emailError'); // Clear the message
}

// document.addEventListener("DOMContentLoaded", () => {
//             const alert = document.getElementById('alertbox');
//             if (alert) {
//                 // Remove the alert after 5 seconds
//                 setTimeout(() => {
//                     alert.remove();
//                 }, 5000);
//             }
//         });