let form_edit_users = document.getElementById('form_edit_users')
form_edit_users.addEventListener('submit',function (e){
    e.preventDefault();
    edit_users();
} )


async function edit_users() {
    let users = {}
    users.nombre= document.getElementById('nombre').value
    users.apellido= document.getElementById('apellido').value
    users.pass= document.getElementById('pass').value
    users.id= document.getElementById('id').value

    const url = '/MVC/Public/usuarios/update'
    const parameters = {
        method:'POST',
        body:JSON.stringify(users)
    }

    let response = await fetch(url,parameters)
    let response_data = await response.json();

    console.log(response_data)

}