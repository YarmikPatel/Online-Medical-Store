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

    // If there are no errors, allow form submission
    if (!hasError) {
    form.submit();
    }

});
document.addEventListener("DOMContentLoaded", () => {
            const alert = document.getElementById('alertbox');
            if (alert) {
                // Remove the alert after 5 seconds
                setTimeout(() => {
                    alert.remove();
                }, 5000);
            }
        });