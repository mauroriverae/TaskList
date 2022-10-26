"use strict ";
const API_URL = "http://localhost/web2/taskList/TaskList/api/tareas";

async function getTareas(){
    try{
        let response = await fetch(API_URL);
        let tareas = await response.json();
        render(tareas);
    }
    catch(e) {
        console.log(e)
    }
}

function render(tareas){
    let lista = document.querySelector("#tasklist");
    lista.innerHTML = "";
    for(let tarea of tareas) {
        let html = `<li class=" list-group-item d-flex justify-content-between ">
            ${tarea.titulo}
            <div>
                <a href="delete/${tarea.id_tarea}" type='button' class='btn btn-danger'>borrar</a>
                <a href="update/${tarea.id_tarea}" type='button' class='btn btn-success'>Finalizar</a>
            </div>
        </li>`;
        lista.innerHTML += html;
    }
}


getTareas();

