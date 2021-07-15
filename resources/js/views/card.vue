<template>
    <div class="card">{{ card.title }}</div>
</template>

<script>
    export default {
        name: "card",
        props: ['boardCard'],
        data() {
            return {
                card: this.boardCard
            }
        }
    }
</script>

<style scoped>

</style>
