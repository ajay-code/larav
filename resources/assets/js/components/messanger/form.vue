<template>
    <div>
        <form :action="action" @submit.prevent="post">    
            <!-- Message Form Input -->
            <div class="form-group">
                <textarea name="message" v-model="form.message" class="form-control"
                @keydown="form.errors.clear()"
                ></textarea>
                <span   class="text-danger"
                    v-if="form.errors.has('message')"
                    v-text="form.errors.get('message')"
                >
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
    import eventHub from "../../event";
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
                this.form.put(this.action + '/vue').then(
                    res => {
                        eventHub.$emit('posted', res.data);
                        this.form.clear();
                    }
                )
            }    
        }
    }
</script>