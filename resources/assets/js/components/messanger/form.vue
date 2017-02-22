 <template>
    <div class="margin-20">
        <form :action="action" @submit.prevent="post" class="message-form">    
            <!-- Message Form Input -->
            <div class="form-group col-sm-9">
                <textarea class="form-control message-form__textarea" name="message" v-model="form.message" 
                @keydown="form.errors.clear()"
                ></textarea>
                <span   class="text-danger"
                    v-if="form.errors.has('message')"
                    v-text="form.errors.get('message')"
                >
            </div>
            <!-- Submit Form Input -->
            <div class="form-group col-sm-3">
                <button type="submit" class="btn btn-primary form-control message-form__submit" >Submit <i class="fa fa-paper-plane-o"></i></button>
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
                this.form.put(this.action).then(
                    res => {
                        eventHub.$emit('posted', res.data);
                        this.form.clear();
                    }
                )
            }    
        }
    }
</script>

<style>
    .message-form__textarea{
        min-height:20px !important;
        height: 80px !important;
    }

    .message-form__submit{
        border-radius: 5px !important;
        color: white;
    }
</style>