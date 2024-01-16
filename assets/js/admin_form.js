const rform = document.getElementById('drop3');
let adminid = document.getElementById('adminid');
let admin_name = document.getElementById('admin_name');
let email = document.getElementById('admin_email');
let cpassword = document.getElementById('create_password');
let conpassword = document.getElementById('confirm_password');
// Main Function 

rform.addEventListener('submit', function (e) {
    e.preventDefault();
    let valid = formvalidation();
    if (valid == true) {
        e.currentTarget.submit();
    }
});
function formvalidation() {
    const vadmin_id = adminid.value.trim();
    const vadmin_name = admin_name.value.trim();
    const vemail = email.value.trim();
    const vcpassword = cpassword.value.trim();
    const vconpassword = conpassword.value.trim();
    /*validation functions */
    let sid = idvalidate(vadmin_id);
    let sname = namevalidate(vadmin_name);
    let spass = passvalidate(vcpassword, vconpassword);
    let semail = emailvalidate(vemail);

    // return true if all the validation is true 

    if (sid && sname && spass && semail == true) {
        return true;

    }
}
// id validate

function idvalidate(vid) {
    if (vid === "") {
        formerror(adminid, `*ID cann't be empty*`);
    }
    else {
        formerror(adminid, "");
        return true;
    }

}

/*name validiate */
function namevalidate(vname) {
    if (vname === "") {
        formerror(admin_name, `* Name field cann't be empty*`);
    }
    else {
        if (/[^a-zA-Z]/.test(vname)) {
            formerror(admin_name, `*Name field should Not contain Number or spacial char*`);
        }
        else {
            formerror(admin_name, "");
            return true;
        }
    }

}

/* email validation */
function emailvalidate(vemail) {
    if (vemail === '') {
        formerror(email, "*Email field cann't be empty*");
        return true;
    }
    else {
        let str = vemail;
        var lastAtPos = str.lastIndexOf('@');
        var lastDotPos = str.lastIndexOf('.');
        let emailresult = (lastAtPos < lastDotPos && lastAtPos > 0 && str.indexOf('@@') == -1 && lastDotPos > 1 && (str.length - lastDotPos) > 1);

        if (emailresult == false) {
            formerror(email, "Not a valid Email");
        }

        else {
            formerror(email, "");
            return true;

        }
    }

}

/* Password validation */
function passvalidate(vcpassword, vconpassword) {
    if (vcpassword == '') {
        formerror(cpassword, "*Password field cann't be empty*");
    }
    else {
        if (vcpassword != vconpassword) {
            formerror(cpassword, "*Password Not mached*");
        }
        else {
            let pattern = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if (!pattern.test(vcpassword)) {
                formerror(cpassword, "*Password Should Contain Upper,<br> Lower, Spacial charector*");
            }
            else {
                formerror(cpassword, "");
                return true;
            }
        }
    }
}

/* error message */
function formerror(input, message) {
    let error = input.parentElement.querySelector('small');
    error.innerHTML = message;
    error.style = "color:red";
}