<template>
    <div class="row">
        <div class="col-md-7">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">All sub-categories</div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"
                            @click.stop.prevent="refresh"
                        >
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Sub-category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(subCategory, index) in subCategories">
                            <td v-text="subCategory.category.name"></td>
                            <td v-text="subCategory.name"></td>
                            <td>

                                <a href="#" data-rel="collapse" class="padding"
                                   @click.stop.prevent="change(index)"
                                >
                                    <i class="glyphicon glyphicon-pencil"></i></a>
                                <a href="#" data-rel="reload" class="padding"
                                   @click.stop.prevent="removeSubCategory"
                                ><i class="glyphicon glyphicon-trash"></i></a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">Add new category</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <form class="form-horizontal" role="form" @submit.stop.prevent="addSubCategory">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select name="category" class="form-control" v-model="newSubCategory.categoryId">
                                        <option value="">Select Category</option>
                                        <option v-for="category in categories" :value="category.id"
                                                v-text="category.name"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="category"
                                           placeholder="Add subcategory" v-model="newSubCategory.name">
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
                        <div class="panel-title">Edit sub category</div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <form class="form-horizontal" role="form" @submit.stop.prevent="changeInDB">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select name="category" class="form-control" v-model="editedSubCategory.categoryId">
                                        <option value=""></option>
                                        <option v-for="category in categories" :value="category.id"
                                                v-text="category.name"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="edit_category" name="category"
                                           placeholder="Edit category"
                                           v-model="editedSubCategory.name"
                                    >
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
                subCategories: [],
                categories: [],
                index: '',
                editedSubCategory: {
                    id: '',
                    categoryId: '',
                    name: ''
                },
                newSubCategory: {
                    'categoryId': '',
                    'name': ''
                }
            }
        },
        mounted() {
            this.getSubCategories();
            this.getCategories();
        },
        methods: {

            refresh(){
                this.getSubCategories();
                this.getCategories();
            },
            getSubCategories(){
                axios.get('api/subcategory').then(res => {
                    this.subCategories = res.data;
                })
            },
            getCategories(){
                axios.get('api/category').then(res => {
                    this.categories = res.data;
                })
            },
            addSubCategory(){
                axios.post('api/subcategory', this.newSubCategory).then(res => {
                    this.newSubCategory.categoryId = '';
                    this.newSubCategory.name = '';
                    this.subCategories.push(res.data);
                });
            },
            removeSubCategory(index){
                let subCategory = this.categories.splice(index, 1)[0];
                axios.delete('api/subcategory/' + subCategory.id).then(res => {
                    if (! res.status == 200) {
                        this.getSubCategories();
                    }
                });
            },

            change(index){
                this.index = index;
                this.editedSubCategory.id = this.subCategories[this.index].id;
                this.editedSubCategory.name = this.subCategories[this.index].name;
                this.editedSubCategory.categoryId = this.subCategories[this.index].category.id;

            },

            changeInDB(){
                if (this.editedSubCategory.id) {
                    axios.patch('api/subcategory/' + this.editedSubCategory.id,
                        this.editedSubCategory ).then(res => {
                        if (res.status == 200) {
                            this.subCategories[this.index] = res.data;
                            this.editedSubCategory.id = '';
                            this.editedSubCategory.name = '';
                            this.editedSubCategory.categoryId = '';
                            this.index = '';
                        }
                    })
                }

            }


        }
    }
</script>
