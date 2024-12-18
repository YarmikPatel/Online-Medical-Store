// Handle form submission
document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const password = form.upass.value;
    const confirmpassword = form.confirmupass.value;
    const mobile = form.mobile.value;
    const email = form.email_id.value;

    // Checking confirm password with password
    if(confirmpassword != password){
        document.getElementById('confirmupass').style.borderColor = "red";
        document.getElementById('passerrormsg').textContent = 'Confirm Password must be same as password';
    };

    // Checking length of mobile number
    if(mobile != 10){
        document.getElementById('mobile').style.borderColor = "red";
        document.getElementById('mobileerrormsg').textContent = 'Mobile must be of 10 number';
    }


    const emailRegex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(email === emailRegex){
        document.getElementById('email_id').style.borderColor = "red";
        document.getElementById('emailerrormsg').textContent = 'Invalid email';
    }
    // Collect form data
    // const formData = new FormData(this);

});