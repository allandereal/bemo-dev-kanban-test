<template>
    <div class=column-wrapper>
        <div class="column">
            <div class="column-title">
                <span>title</span>
                <button>+</button>
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

        components: {
            Card
        }
    }
</script>

<style scoped>

</style>
