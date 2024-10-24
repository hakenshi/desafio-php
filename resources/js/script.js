const loginForm = document.querySelector("#login")
const registerForm = document.querySelector('#register-form')
const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${Math.floor(Math.random() * 20)}`)
const data = await response.json()
const login = (form) => {

    if (!form.email.value.trim()) {
        alert("O email não pode estar vazio.");
        return;
    }
    if (!form.password.value.trim()) {
        alert("A senha não pode estar vazia.");
        return;
    }

    fetch(form.action, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({
            email_user: form.email.value,
            password_user: form.password.value,
        })
    }).then(async (response) => {
        if (response.ok) {
            const json = JSON.parse(await response.text())
            if (json.status === 200) {
                alert("Login efetuado com sucesso.")
                location.replace("/index.php?action=auth")
            }
        }
    }).catch((e) => {
        console.log(e)
    });
}

const cadastro = (form) => {

    if (!form.nome.value.trim()) {
        alert("O email não pode estar vazio.");
        return;
    }
    if (!form.email.value.trim()) {
        alert("O email não pode estar vazio.");
        return;
    }
    if (!form.password.value.trim()) {
        alert("A senha não pode estar vazia.");
        return;
    }
    if (!form['confirm-password'].value.trim()) {
        alert("A confirmação da senha não pode estar vazia.");
        return;
    }
    if (!form.code.value.trim()) {
        alert("O código não pode estar vazio.");
        return;
    }
    if (form.password.value !== form['confirm-password'].value) {
        alert("As senhas não coincidem")
        return
    }

    fetch("/index.php?action=register", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({
            name_user: form.nome.value,
            email_user: form.email.value,
            password_user: form.password.value,
            title_user: data.title,
            code_user: form.code.value
        })
    }).then(async (response) => {
        if (response.ok) {
            const json = JSON.parse(await response.text())
            if (json.status === 201) {
                location.replace("/index.php?action=auth")
            }
        }
    }).catch((e) => {
        console.log(e)
    });
}

loginForm && loginForm.addEventListener('submit', (e) => {
    e.preventDefault()
    login(e.target)
})
registerForm && registerForm.addEventListener('submit', (e) => {
    e.preventDefault()
    cadastro(e.target)
})
