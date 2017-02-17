<template>
    <div>
        <form :action="action" @submit.prevent="post">    
            <!-- Message Form Input -->
            <div class="form-group">
                <textarea name="message" v-model="form.message" class="form-control"></textarea>
            </div>
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
            
        </form>
    </div>
</template>

<script>
    import Form from "../../form/Form"
    export default {
        data(){
            return {
                form: new Form({
                    message: "",
                })
            }
        },
        props: ['action'],
        methods: {
            post(){
                this.form.put(this.action).then(
                    res => {
                        this.form.clear();
                        this.$emit('posted');
                    }
                )
            }    
        }
    }
</script>