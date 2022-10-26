"use strict";
const { createApp } = Vue
createApp({
    data() {
        return {
            titulo: 'Vue.js ',
            subtitulo: 'sub generado con Vue.js',
            show: false,
            nombres: ["mauro", "abc", "aqwe", "jsq"]
        }
    },
}).mount('#app');



