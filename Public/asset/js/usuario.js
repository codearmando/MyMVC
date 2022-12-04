const usuarios = async () => {
  const url = "/MVC/Public/usuarios/table";

  let response = await fetch(url);
  let response_data = await response.json();

  console.table(response_data);

  if (response_data.success) {
    const users_tbody_table = document.getElementById("users_tbody_table");
    users_tbody_table.innerHTML = ''
    response_data.result.forEach((item) => {
      users_tbody_table.insertAdjacentHTML("beforeend",

        `
          <tr>
            <td>${item.NOMBRE}</td>
            <td>${item.APELLIDO}</td>
            <td>${item.PASSWORD}</td>
            <td>
            
              <a href= "/MVC/Public/usuarios/edit/?id=${item.ID}"> 
                <button>Editar</button>
              </a>
              <button onclick = "eliminaruser(${item.ID})">Eliminar</button>
              
            </td>
          </tr>

        `
      );
      console.table(item.NOMBRE);
    });
  }
};
usuarios();



async function eliminaruser(id){
  const url = "/MVC/Public/usuarios/delete"
  const parameters ={
    method:'DELETE',
    body:JSON.stringify({id})
  }

  let response = await fetch(url,parameters);
  let response_data = await response.json();

  // console.log(response_data)

  usuarios();
}