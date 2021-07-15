<template>
    <div class="board">
        <column v-for="column in columns" :key="column.id"></column>
    </div>
</template>
<script>
    import Column from '../views/column.vue'
    export default {
        name: "board",
        computed: {},
        data() {
            return {
                columns: [{id:1,name:1}, {id:2,name:2}]
            }
        },
        created() {
            this.fetchColumns();
        },

        methods: {
            fetchColumns(){
                console.log(1234);
            }
        },
        components: {
            Column
        }
    };
</script>
