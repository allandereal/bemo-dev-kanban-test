<template>
    <div class="card-modal">
        <h3 v-show="!titleClicked" @click="titleClicked = true">{{ card.title }}</h3>
        <div v-show="titleClicked">
            <input v-model="cardTitle">
            <button @click="updateCardTitle">save</button>
            <button @click="toggleEditTitleClicked">x</button>
        </div>
        <div>
            <h4>Description</h4>
            <button v-show="hasDescription">edit</button>
            <p @click="editDescriptionClicked = true" class="">{{ card.description ? card.description : 'Add detailed description' }}</p>
            <div v-show="editDescriptionClicked">
                <textarea v-model="cardDescription" placeholder="Describe this card"></textarea>
                <button @click="updateCardDescription">save</button>
                <button @click="toggleEditDescriptionClicked">x</button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "CardModal",
        props: ['card'],
        data() {
            return {
                hasDescription: !!this.card.description,
                cardDescription: this.card.description,
                editDescriptionClicked: false,
                titleClicked: false,
                cardTitle: this.card.title
            }
        },
        methods: {
            updateCardDescription(){
                this.editDescriptionClicked = false;
                axios.put('/api/board-cards', {
                    id: this.card.id,
                    description: this.cardDescription
                })
                    .then(response => {
                        console.log(response);
                        this.card.description = this.cardDescription
                    })
                    .catch(error => (console.log(error)));
            },
            toggleEditDescriptionClicked(){
                this.editDescriptionClicked = !this.editDescriptionClicked;
            },
            toggleEditTitleClicked(){
                this.editTitleClicked = !this.editTitleClicked;
            },
            updateCardTitle(){
                this.titleClicked = false;
                axios.put('/api/board-cards', {
                    id: this.card.id,
                    title: this.cardTitle
                })
                    .then(response => {
                        console.log(response);
                        this.card.title = this.cardTitle
                    })
                    .catch(error => (console.log(error)));
            }
        }
    }
</script>

<style scoped>

</style>
