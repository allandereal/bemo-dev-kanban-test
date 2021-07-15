import Vue from 'vue'

//Main pages
import App from './views/app.vue'
import Board from './views/board.vue'

const app = new Vue({
    el: '#app',
    components: { App, Board }
});
