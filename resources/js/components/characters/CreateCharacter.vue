<template>
    <div>

        <form class="uk-form-horizontal uk-margin-large">

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" v-model="character.name" required>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Birthday</label>
                <div class="uk-form-controls">
                    <input class="uk-input" v-model="character.birthday">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Occupation</label>
                <div class="uk-form-controls">
                    <input class="uk-input" v-model="newOccupation"><span @click="addOccupation">Add</span>
                    <li v-for="occupation in character.occupation">{{ occupation }}</li>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-select">Status</label>
                <div class="uk-form-controls">
                    <select class="uk-select" v-model="character.status" required>
                        <option value="Alive" selected>Alive</option>
                        <option value="Dead">Dead</option>
                    </select>
                </div>
            </div>

            <button class="uk-button uk-button-primary" style="border-radius: 8px" @click.prevent="storeCharacter">Save Character</button>

        </form>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                character: {
                    name: '',
                    birthday:'',
                    occupation: [],
                    status: ''
                },
                newOccupation: ''
            }
        },
        methods: {
            backTolist() {
                this.$emit('backToList')
            },
            storeCharacter() {
                axios.post('/api/store', {
                    name: this.character.name,
                    birthday: this.character.birthday,
                    occupation: this.character.occupation,
                    status: this.character.status
                })
                .then(response => (console.log(response), this.backTolist()))
                .catch(error =>(console.log(error)))
            },
            addOccupation() {
                var self = this
                var i = 1;
                var addNew = true
                this.character.occupation.forEach(function(occupation) {
                    if (occupation == self.newOccupation) {
                        addNew = false
                        self.newOccupation = ''
                        alert('occupation already added')
                    }
                })
                if (addNew == true) {
                    this.character.occupation.push(self.newOccupation)
                    this.newOccupation = ''
                }

            }
        }
    };
</script>
