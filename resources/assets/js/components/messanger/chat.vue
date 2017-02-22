<template>
    <div>
        <div id="chat" class="row message-body">
            
        </div>
        <div class="row">
        
            <message-form :action="postUrl"></message-form>   
        </div>
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

            setTimeout(()=>{
                window.$('#chat').scrollTop(document.getElementById("chat").scrollHeight);
            },1000)
            
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
