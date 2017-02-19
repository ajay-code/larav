<template>
    <div class="col-md-6">
        <h1 v-text="thread.subject"></h1>
            <!--  -->
        <div id="chat">
            
        </div>

        <!--  -->
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
        props: ['thread', 'users', 'postUrl'], 
        mounted() {
            this.refresh()
            setInterval(()=>{
                this.refresh()
            },5000)

            eventHub.$on('posted', this.refresh)
        },
        methods: {
            refresh(){
                axios.get(this.postUrl + "/chat").then(res=>{
                    window.$('#chat').html(res.data);
                });
            }
        }
    }
</script>
