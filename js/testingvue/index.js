"use strict";

const { createApp } = Vue

createApp({
    data() {
        return {
            titulo: 'Vue.js ',
            subtitulo: 'sub generado con Vue.js'
        }
    }
}).mount('#app');

document.querySelector("#btn-ok").addEventListener("click", e =>{
   alert(app.data.titulo);
});