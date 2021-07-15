<template>
    <div class="board">
        <column v-for="column in columns" :key="column.id" :board-column="column" @delete-column="deleteColumn"></column>
        <div class="new-column">
            <button @click="toggleAddColumn" v-show="!newColumnClicked">+ Add column</button>
            <div v-show="newColumnClicked">
                <input v-model="newColumnTitle" type="text" placeholder="Column title">
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
                newColumnClicked: false,
                newColumnTitle: ''
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
                this.newColumnClicked = !this.newColumnClicked;
            },
            saveNewColumn(){
                this.newColumnClicked = false;
                axios.post('/api/board-columns', {
                    title: this.newColumnTitle
                })
                    .then(response => {
                        this.newColumnTitle = '';
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
