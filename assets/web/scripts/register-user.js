function eye() {
    password = document.querySelector('#register-password');
    if (password.type == "password") {
        document.querySelector('button').addEventListener('click', () => {
            password.type = "text";
        });
    } else {
        document.querySelector('button').addEventListener('click', () => {
            password.type = "password";
        });
    }
}

function cpf(i) {

    var v = i.value;

    if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
        i.value = v.substring(0, v.length - 1);
        return;
    }

    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";

}

function phone(i) {
    var v = i.value;

    i.setAttribute("maxlength", "19");
    if (v.length == 8) i.value += " ";
    if (v.length == 14) i.value += "-";
}