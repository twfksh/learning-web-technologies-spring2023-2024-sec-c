function register() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let headline = document.getElementById("headline").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let confPassword = document.getElementById("conf-password").value;
    let org = document.getElementById("org").value;
    let role = document.getElementById("role").value;
    let gender = getRadioValue("gender");
    let dob = document.getElementById("dob").value;

    console.log(dob);

    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controllers/reg.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
        `name=${name}&email=${email}&headline=${headline}&username=${username}&password=${password}&conf-password=${confPassword}&org=${org}&role=${role}&gender=${gender}&dob=${dob}`
    );

    xhttp.onreadystatechange = function() {
        alert(this.responseText);
    }
}

function getRadioValue(radioGroup) {
    let elements = document.getElementsByName(radioGroup);
    for (let i = 0; i < elements.length; i++) {
        if (elements[i].checked) return elements[i].value;
    }
}