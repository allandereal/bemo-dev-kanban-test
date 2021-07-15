<template>
    <div class="board">
        <column v-for="column in columns" :key="column.id" :board-column="column" @delete-column="deleteColumn"></column>
        <div class="new-board">
            <button @click="toggleAddColumn" v-show="!newBoardClicked">+ Add column</button>
            <div v-show="newBoardClicked">
                <input v-model="newBoardTitle" type="text" placeholder="Column title">
                <button @click="saveNewColumn">Save</button>
                <button @click="toggleAddColumn">+</button>
            </div>
        </div>
    </div>
</template>
<script>
    import Column from '../views/column.vue'
    import axios from 'axios'

    export default {
        name: "board",
        computed: {},
        data() {
            return {
                columns: [],
                newBoardClicked: false,
                newBoardTitle: ''
            }
        },
        created() {
            this.fetchColumns();
        },

        methods: {
            fetchColumns(){
                axios.get('/api/board-columns')
                    .then(response => (this.columns = response.data.data))
                    .catch(error => (console.log(error)));
            },
            toggleAddColumn(){
                this.newBoardClicked = !this.newBoardClicked;
            },
            saveNewColumn(){
                this.newBoardClicked = false;
                axios.post('/api/board-columns', {
                    title: this.newBoardTitle
                })
                    .then(response => {
                        this.newBoardTitle = '';
                        console.log(response);
                        this.columns.push(response.data.data);
                    })
                    .catch(error => (console.log(error)));
            },
            deleteColumn(column){
                axios.delete('/api/board-columns/'+column.id)
                    .then(response => {
                        console.log(response);
                        this.columns = this.columns.filter((val) => (val.id !== column.id));
                    })
                    .catch(error => (console.log(error)));
            },
        },

        components: {
            Column
        }
    };
</script>
