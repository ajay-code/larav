<template>
    <form @submit.prevent="onSubmit">
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
            <button class="btn btn-default" :disabled="form.errors.any()">Send Proposal</button>
        </div>
    </form>
</template>

<script>
    import Form from '../../form/Form';
    export default {
        data(){
            return {
                form: new Form({
                    budget: '',
                    message: ''
                })
            }
        },
        props: ['slug'],
        mounted() {
        },
        methods: {
            onSubmit(){
                this.form.post('/products/' + this.slug + '/bid').then(res => {
                    console.log(res);
                    this.form.clear();
                })
            }
        }
    }
</script>