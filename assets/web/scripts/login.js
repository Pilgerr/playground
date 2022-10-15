function eye() {
    password = document.querySelector('#password');
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