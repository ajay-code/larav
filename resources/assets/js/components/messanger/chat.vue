<template>
    <div class="col-md-6">
        <h1 v-text="thread.subject"></h1>
        <template v-for="message in thread.messages">
            <message-left v-if="currentUser.id == message.user.id"  :message="message" ></message-left>
            <message-right v-else  :message="message" ></message-left>
        </template>
        <message-form :action="postUrl" @posted="refresh"> </message-form>   
    </div>
</template>

<script>
import form from "./form";
    export default {
        data() {
            return {

            }
        },
        props: ['thread', 'users', 'currentUser', 'postUrl'], 
        mounted() {
        },
        methods: {
            refresh(){
                console.log('hello');
            }
        }
    }
</script>
