const form = document.querySelector("form");
const confirmedPasswordInput = form.querySelector('#rPassword');

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    if(!condition)
        element.classList.add('passwordValidation')
    else
        element.classList.remove('passwordValidation')


    // !condition ? element.classList.add('passwordValidation') : element.classList.remove('passwordValidation');
}
function getLabelValue(label){
    return label.getElementsByTagName("input")[0].value;
}
function validatePassword() {
    const condition = arePasswordsSame(
        getLabelValue(confirmedPasswordInput.previousElementSibling),
        getLabelValue(confirmedPasswordInput)
    );
    markValidation(confirmedPasswordInput, condition);
}

confirmedPasswordInput.addEventListener('keyup', validatePassword);


