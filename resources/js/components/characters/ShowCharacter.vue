<template>
    <div>
        <button @click="backTolist"> Back to all characters</button>

        <div class="uk-margin-top uk-animation-fade">
            <h1> <img class="avatar" :src="character.img"> {{ character.name }}</h1>
        </div>
        <div class="uk-section uk-section-muted">
            <div class="uk-padding-small">
               <div>
                   <span class="title">Occupation:</span>
                    <li v-for="occupation in character.occupation">{{ occupation }}</li>
               </div>
               <div v-if="character.nickname" class="uk-margin-small-top">
                   <span class="title">Nickname:</span><br>
                   <li>{{ character.nickname }}</li>
               </div>
               <div v-if="character.status == 'Alive'" class="uk-margin-small-top">
                   <span class="title">Status:</span><br>
                   <li>{{ character.status }}</li>
               </div>
               <div v-else class="uk-margin-small-top">
                   <span class="title">Status:</span><br>
                   <li>{{ character.status }}</li>
                   <span class="title">Cause of death:</span><br>
                   <li>Here supposed to be information about death, but I don';t have death id and specific API to get information for specific character. Not featured in the documentation</li>
               </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'

    export default{
        props: ['character'],
        data() {
            return {
                death: []
            }
        },
        methods: {
            backTolist() {
                this.$emit('backToList')
            },
            getDeathInfo() {
                // No API presented for this method
                // axios.get('https://breakingbadapi.com/')
            }
        }
    };
</script>
<style>
    .avatar {
        width: 60px;
        height: 60px;
        border-radius: 8px
    }
    .title {
        font-size: 1.5rem;
    }
</style>
