function formValidation() {
    var uname = document.form.uname;
    var email = document.form.email;
    var age = document.form.age;
    var phone = document.form.phone;
    var query = document.form.query;

    // Reset visibility for all error messages
    resetErrorVisibility();

    if (allLetter(uname)) {
        if (allnumeric(age)) {
            if (validage(age)) {
                if (valphone(phone)) {
                    if (allnumeric(phone)) {
                        if (ValidateEmail(email)) {
                            if (validateQuery(query)) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}

// Your validation functions...

function resetErrorVisibility() {
    document.getElementById("unameError").style.visibility = "hidden";
    document.getElementById("emailError").style.visibility = "hidden";
    document.getElementById("ageError").style.visibility = "hidden";
    document.getElementById("phoneError").style.visibility = "hidden";
    document.getElementById("queryError").style.visibility = "hidden";
}

function allLetter(uname) {
    var letters = /^[A-Za-z\s]+$/;
    if (uname.value.match(letters)) {
        return true;
    } else {
        document.getElementById("unameError").style.visibility = "visible";
        uname.focus();
        return false;
    }
}




function valphone(phone) {
    var phoneno = phone.value.length;
    if (phoneno == 0 || phoneno >= 12 || phoneno < 10) {
        document.getElementById("phoneError").style.visibility = "visible";
        phone.focus();
        return false;
    }
    return true;
}

function ValidateEmail(email) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value.match(mailformat)) {
        return true;
    } else {
        document.getElementById("emailError").style.visibility = "visible";
        
        return false;
    }
}

function validateQuery(query) {
    var regex = /^[A-Za-z0-9\s.?]+$/;
    if (query.value.match(regex)) {
        return true;
    } else {
        document.getElementById("queryError").style.visibility = "visible";
      
        return false;
    }
}




