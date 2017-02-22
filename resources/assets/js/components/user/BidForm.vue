<template>
    <div>
    <div v-if="!bid" @click="bid = true">
        <button class="btn btn-default bid-btn">
            Make a Bid
        </button>
    </div>
    <form v-if="bid && !completed" @submit.prevent="onSubmit">
        <h4> Make your Bid </h4>
        <div class="form-group">
            <input type="number" class="form-control" id="budget" name="budget"
                   placeholder="Enter your budget"
                   v-model="form.budget"
                   @keydown="form.errors.clear()"
            >
            <span   class="text-danger"
                    v-if="form.errors.has('budget')"
                    v-text="form.errors.get('budget')" >
            </span>
        </div>
        <div class="form-group">
            <textarea name="message" id="message" class="form-control"
                      v-model="form.message"
                      @keydown="form.errors.clear()"
            ></textarea>
            <span   class="text-danger"
                    v-if="form.errors.has('message')"
                    v-text="form.errors.get('message')"
            >

            </span>
        </div>
        <div class="form-group">
            <button class="btn btn-default bid-btn" :disabled="form.errors.any()">Send Proposal</button>
        </div>
    </form>

        <div v-if="completed">
            <a :href="chatUrl">
                <button class="btn btn-default chat-btn">
                    Start Chatting    
                </button>
            </a>
        </div>
    </div>
</template>

<script>
    import Form from '../../form/Form';
    export default {
        data(){
            return {
                form: new Form({
                    budget: '',
                    message: ''
                }),
                bid: false,
                completed: false,
                chatUrl: ''
            }
        },
        props: ['slug'],
        mounted() {
        },
        methods: {
            onSubmit(){
                $('body').LoadingOverlay('show')
                this.form.post('/products/' + this.slug + '/bid').then(res => {
                    $('body').LoadingOverlay('hide')
                    this.completed = true;
                    window.swal({
                        title: "Success",
                        text: "The bid was made successfully",
                        type: "info",
                    })
                    this.form.clear();
                })
            }
        }
    }
</script>

<style scoped>
    .bid-btn{
        color:white;
        background-color: #fe980f;
        margin:10px 0px;
    }
    .chat-btn{
        color:white;
        background-color: #fe980f;
        margin:10px 0px;
    }
</style>