<template>
    <div class="col-md-6">
        <h1 v-text="thread.subject"></h1>
        <template v-for="message in messages">
            <message-left v-if="currentUser.id == message.user.id"  :message="message" ></message-left>
            <message-right v-else  :message="message" ></message-left>
        </template>
        <message-form :action="postUrl"> </message-form>   
    </div>
</template>

<script>
import form from "./form";
import eventHub from "../../event";

    export default {
        data() { 
            return {

            }
        },
        props: ['thread', 'messages', 'users', 'currentUser', 'postUrl'], 
        mounted() {
            eventHub.$on('posted', this.refresh);
        },
        methods: {
            refresh(){
                console.log(this.postUrl + "/get/vue");
                axios.get(this.postUrl + "/get/vue").then(res => {
                    res.data.forEach(data=> {
                        this.messages.push(data);
                    })
                    console.log(res.data);
                })
            }
        }
    }
</script>
