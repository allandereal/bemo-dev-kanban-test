import Vue from 'vue'

//Main pages
import App from './views/app.vue'
import Board from './views/board.vue'
import Column from './views/column.vue'
import Card from './views/card.vue'


const app = new Vue({
    el: '#app',
    components: { App, Board, Column, Card }
});
