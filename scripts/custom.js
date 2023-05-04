// Hide and Show the password
function showMe() {
    let myPassword= document.getElementById('password');
    if (myPassword.type==="password") {
        myPassword.type="text";
    }
    else {
        myPassword.type = "password";
    }

}