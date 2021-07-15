<template>
    <div class=column-wrapper>
        <div class="column">
            <div class="column-title">
                <span>{{ column.name }}</span>
                <button @click="emitDeleteColumnEvent()">+</button>
            </div>
            <div class="column-body">
                <card></card>
                <card></card>
            </div>
            <div class="column-footer">
                <button>+ Add card</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Card from '../views/card.vue'

    export default {
        name: "column",
        props: ['column'],
        methods: {
            emitDeleteColumnEvent(){
                this.$emit('delete-column', this.column);
            }
        },
        components: {
            Card
        }
    }
</script>

<style scoped>

</style>
