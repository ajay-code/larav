<template>
    <div class="row">
        <div class="col-md-5">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">All categories</div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse" @click.stop.prevent="getCategories"><i
                                class="glyphicon glyphicon-refresh"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table">

                        <thead>
                        <tr>
                            <th>Category</th>
                            <th><span class="pull-right">Actions</span></th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="(category, index) in categories">
                            <td v-text="category.name"></td>

                            <td>
                                    <span class="pull-right">
                                        <a href="#" data-rel="collapse" class="padding"
                                           @click.stop.prevent="change(index)"
                                        >
                                            <i class=" glyphicon glyphicon-pencil"></i>
                                        </a>

                                        <a href="#" data-rel="reload" class="padding"
                                           @click.stop.prevent="removeCategory(index)"
                                        >
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </span>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Add new category</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <form class="form-horizontal" role="form" @submit.stop.prevent="addCategory">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="category" name="category"
                                           v-model="newCategory"
                                           placeholder="Add category">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Edit category</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <form class="form-horizontal" role="form" @submit.stop.prevent="changeInDB">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_category" name="category"
                                           v-model="editedCategory.name"
                                           placeholder="Edit category">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                categories: [],
                index: '',
                editedCategory: {
                    id: '',
                    name: ''
                },
                newCategory: ''
            }
        },
        created(){
            this.getCategories();
        },

        methods: {

            getCategories(){
                axios.get('api/category').then(res => {
                    this.categories = res.data;
                })
            },

            removeCategory(index){
                let category = this.categories.splice(index, 1)[0];
                axios.delete('api/category/' + category.id).then(res => {
                    if (!res.status == 200) {
                        this.getCategories();
                    }
                });
            },

            addCategory(){
                axios.post('api/category', {'name': this.newCategory}).then(res => {
                    this.newCategory = '';
                    this.categories.push(res.data);
                    console.log(res.data);
                });
            },

            change(index){
                this.index = index
                this.editedCategory.id = this.categories[this.index].id;
                this.editedCategory.name = this.categories[this.index].name;
            },

            changeInDB(){
                if (this.editedCategory.id) {

                    axios.patch('api/category/' + this.editedCategory.id, {
                        'name': this.editedCategory.name
                    }).then(res => {
                        if (res.status == 200) {
                            this.categories[this.index].name = this.editedCategory.name;
                            this.editedCategory.id = '';
                            this.editedCategory.name = '';
                            this.index = '';
                        }
                    })
                }

            }
        }

    }
</script>
