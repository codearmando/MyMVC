let form_add_users = document.getElementById('form_add_users');

form_add_users.addEventListener('submit', function(e){
    e.preventDefault();
    register_user();
} )


async function register_user () {
    let users = {}
    users.nombre= document.getElementById('nombre').value
    users.apellido= document.getElementById('apellido').value
    users.pass= document.getElementById('pass').value

    const url = '/MVC/Public/usuarios/insert'
    const parameters = {
        method: 'POST',
        body: JSON.stringify(users),
    } 

    let response = await fetch(url,parameters)
    let response_data = await response.json()
    console.log(response_data);
}