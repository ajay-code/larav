<template>
    <a  href="#" @click.prevent="AddToWishList"  >
        <button class="btn btn-orange" :disabled="disabled">
            Add To My WishList
        </button>
    </a>
</template>

<script>
    export default {
        data(){
            return {
                disabled: false
            }
        },
        props: ['productId'],
        methods: {
            AddToWishList(){
                axios.post('../addtowishlist', {
                    id: this.productId
                }).then(res => {
                    if(res.status == 200){
                        swal("Sucess", "The Product was added to your wishlist", "success")
                        this.disabled = true;
                    }
                });
            }
        }
    }
</script>

<style scoped>
    a{
        text-decoration: none;
    }
</style>