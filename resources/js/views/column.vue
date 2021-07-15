<template>
    <div class=column-wrapper>
        <div class="column">
            <div class="column-title">
                <span>{{ column.title }}</span>
                <button @click="emitDeleteColumnEvent()">+</button>
            </div>
            <div class="column-body">
                <draggable v-model="cards" group="cards" @start="drag=true" @end="drag=false">
                    <card v-for="card in cards" :key="card.id" :board-card="card"></card>
                </draggable>
            </div>
            <div class="column-footer">
                <button v-show="!addCardClicked" @click="toggleAddCard">+ Add card</button>
                <div v-show="addCardClicked">
                    <textarea v-model="newCardTitle" placeholder="Card title"></textarea>
                    <div>
                        <button @click="saveNewCard">Save</button>
                        <button @click="toggleAddCard">x</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Card from '../views/card.vue'
    import axios from "axios";
    import draggable from 'vuedraggable'

    export default {
        name: "column",
        props: ['boardColumn'],
        data() {
            return {
                newCardTitle: '',
                addCardClicked: false,
                column: this.boardColumn,
                cards: this.boardColumn.cards
            }
        },
        methods: {
            emitDeleteColumnEvent(){
                this.$emit('delete-column', this.column);
            },
            toggleAddCard(){
                this.addCardClicked = !this.addCardClicked;
            },
            saveNewCard(){
                this.addCardClicked = false;
                axios.post('/api/board-cards', {
                    title: this.newCardTitle,
                    description: '',
                    board_column_id: this.column.id
                })
                    .then(response => {
                        this.newCardTitle = '';
                        console.log(response.data.data);
                        this.cards.push(response.data.data);
                    })
                    .catch(error => (console.log(error)));
            }
        },
        components: {
            Card,
            draggable
        }
    }
</script>

<style scoped>

</style>
