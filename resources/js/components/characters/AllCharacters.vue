<template>
    <div>
        <div></div>
        <div v-if="mode == 'list'" class="uk-flex">
            <div class="uk-width-1-6@s">
                <h4>Filter by show</h4>
                <div>
                    <button @click="switchCategory('Breaking Bad')" class="filter-button" :class="filters.category == 'Breaking Bad' ? '' : 'disabled-button'">Breaking Bad</button>
                    <button @click="switchCategory('Better Call Saul')" style="margin-top: 5px;" class="filter-button" :class="filters.category == 'Better Call Saul' ? '' : 'disabled-button'">Better Call Saul 7</button>
                </div>

                <h4>Search by name</h4>
                <input placeholder="Type character name" class="uk-input" v-model="filters.name">

                <div>
                    <button @click="mode = 'create-character'"> Add new</button>
                </div>

            </div>
            <div class="uk-width-5-6@s">
                <div class="uk-grid uk-child-width-1-3 uk-margin-left">
                    <div class="uk-card"  v-for="character in result">

                        <div class="uk-card uk-card-default uk-margin-bottom">
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <img class="uk-border-circle" style="height: 40px !important; width: 40px " :src="character.img">
                                    </div>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-card-title uk-margin-remove-bottom">{{ character.name }}</h3>
                                        <p v-if="character.nickname" class="uk-text-meta uk-margin-remove-top">aka {{ character.nickname }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <p>Show: {{ character.category }}</p>
                            </div>
                            <div class="uk-card-footer">
                                <a @click="showCharacter(character)" class="uk-button uk-button-text">Read more</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div v-if="mode == 'show-character'">
            <show-character
                :character="characterToDisplay"
                @backToList="characterToDisplay = [], mode = 'list'"
            ></show-character>
        </div>
        <div v-if="mode == 'create-character'">
            <create-character
                :character="characterToDisplay"
                @backToList="mode = 'list'"
            ></create-character>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                mode: 'list',
                allCharacters: [],
                characterToDisplay: [],
                filters: {
                    category: 'Breaking Bad',
                    name: ''
                }
            }
        },
        computed: {
            result() {
                var result = []
                var self = this
                if(this.filters.name !== '') {
                    this.allCharacters.forEach(function(character) {
                        if (character.name.includes(self.filters.name)) {
                            result.push(character)
                        }
                    })
                } else {
                    this.allCharacters.forEach(function(character) {
                        if (character.category.includes(self.filters.category)) {
                            result.push(character)
                        }
                    })

                }
                return result
            }
        },
        methods: {
            showCharacter(character) {
                this.mode = 'show-character'
                this.characterToDisplay = character
            },
            switchCategory(category) {
                this.filters.category = category
            },
            getAllCharacters() {
                axios.get('https://breakingbadapi.com/api/characters')
                .then(response => (
                    this.allCharacters = response.data
                ))
            }
        },
        beforeMount() {
            this.getAllCharacters()
        }
    };
</script>
<style>
    .uk-card-title {
        font-size: 1.1rem;
    }
</style>
