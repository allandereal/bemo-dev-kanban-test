<template>
    <div class="board">
        <column v-for="column in columns" :key="column.id" :column="column" @delete-column="deleteColumn"></column>
        <button @click="addColumn">+ Add column</button>
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
                columns: []
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
            addColumn(){
                axios.post('/api/board-columns', {
                    title: 'test'
                })
                    .then(response => {
                        console.log(response);
                        this.columns.push(response.data);
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
            }
        },
        components: {
            Column
        }
    };
</script>
