<template>
    <div class="media col-sm-6 message-color">
            <a class="pull-left" href="#">
                <img :src="imageUrl"
                    :alt="message.user.name" class="img-circle">
            </a>

            <div class="media-body">
                <div class="pull-right">
                    <h5 class="media-heading" v-text="message.user.name"> </h5>
                    <p v-text="message.body"></p>
                    <div class="text-muted">
                        <small>Posted  <span v-text="at"></span> </small>
                    </div>
                </div>
            </div>
        
    </div>
</template>

<script>
import md5 from "md5";   
import moment from "moment";
    export default {
        props: ['message'],
        data() {
            return {
            }
        },
        computed: {
            imageUrl(){
                return "//www.gravatar.com/avatar/" + md5(this.message.user.email) +"?s=64&d=mm";
            },
            at(){
                return moment.utc(this.message.created_at).fromNow();
            }  
        },
        mounted() {
           
        }
    } 
</script>
<style scoped>
    .message-color{
        background-color: #ccc !important;
    }
</style>