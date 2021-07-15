<template>
    <div class="card-modal">
        <h3>{{ card.title }}</h3>
        <div>
            <h4>Description</h4>
            <button v-show="hasDescription">edit</button>
            <p @click="editDescriptionClicked = true" class="">{{ card.description ? card.description : 'Add detailed description' }}</p>
            <div v-show="editDescriptionClicked">
                <textarea v-model="cardDescription" placeholder="Describe this card"></textarea>
                <button @click="saveCardDescription">save</button>
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
                editDescriptionClicked: false
            }
        },
        methods: {
            saveCardDescription(){
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
            }
        }
    }
</script>

<style scoped>

</style>
