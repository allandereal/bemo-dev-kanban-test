<template>
    <div class="card" @click="showCardModal">{{ card.title }}</div>
</template>

<script>
    import CardModal from "./CardModal";

    export default {
        name: "card",
        props: ['boardCard'],
        data() {
            return {
                card: this.boardCard
            }
        },
        methods: {
            showCardModal(){
                this.$modal.show(
                    CardModal,
                    { card: this.card }
                )
            }
        }
    }
</script>

<style scoped>

</style>
