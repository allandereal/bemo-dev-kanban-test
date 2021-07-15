<template>
    <div class="board">
        <column></column>
    </div>
</template>
<script>
    import Column from '../views/column.vue'
    export default {
        name: "board",
        computed: {},
        data() {
            return {
                message:'This is a board.'
            }
        },
        components: {
            Column
        }
    };
</script>
