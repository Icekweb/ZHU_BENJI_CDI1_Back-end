let form = document.querySelector('form');
let password = document.querySelector('#password');
let pseudo = document.querySelector('#pseudo');
let email = document.querySelector('#email');
let errorContainer = document.querySelector('.message-error')
let passwordRepeat = document.querySelector('#passwordRepeat');
let successContainer = document.querySelector('.message-success')
let errorList = document.querySelector('.message-error ul');
let passCheck = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[-+_!@#$%^&*.,?]).+$"
    );

form.addEventListener('submit', function(event) {
    event.preventDefault();
    
    errorList.innerHTML = ""; // enlever messages error en mettant qu il sont rien



    if (email.value == '') {
    email.classList.add('error');
    email.classList.remove('success')
    } else {
    email.classList.add('success');
    email.classList.remove('error')
    }

    

    if (pseudo.value.length < 6) {
        //faut avoir 6 chiffres 

        errorContainer.classList.add('visible')
        pseudo.classList.remove('success')
        pseudo.classList.add('error')

        let err = document.createElement('li')
        err.innerText = "Le champ pseudo doit contenir au moins 6 caractere"

        errorList.appendChild(err)
    } else {
        pseudo.classList.remove('error')
        pseudo.classList.add('success')
    }

    // avoir au moins 10 chiffres
    if (password.value.length < 10 || passCheck.test(password.value) == false) {
        // sinon faux
        errorContainer.classList.add('visible')
        password.classList.remove('success')
        password.classList.add('error')

        let err = document.createElement('li')
        err.innerText = "Le mot de passe doit contenir au moins 10 caractere"

        errorList.appendChild(err)
    } 
    else {
        password.classList.remove('error')
        password.classList.add('success')
    }

    if (passwordRepeat.value !== password.value) {

    
        errorContainer.classList.add('visible')
        passwordRepeat.classList.remove('success')
        passwordRepeat.classList.add('error')
    } else {
        passwordRepeat.classList.remove('success')
        passwordRepeat.classList.add('success')

    }

    
    successContainer.classList.remove('visible')

    if(
        pseudo.classList.contains('success') &&
        email.classList.contains('success') &&
        password.classList.contains('success') &&
        passwordRepeat.classList.contains('success') 

    ) {
    successContainer.classList.add('visible')
}

});

