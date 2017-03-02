@extends('admin.layouts.main')

@section('content')
    <div class="row" id="user">
        <div class="col-md-7">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">All Users</div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>view</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>#{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ url('admin/products/user/'.$user->id) }}">{{ 'products' }}</a>
                                </td>
                                <td>
                                    <a href="#"
                                       @click.stop.prevent="getDetail({{ $user->id }})"
                                    >{{ 'Detail...' }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>

        <div class="col-md-5">
            <div class="row" v-if="user">
                <div class="col-md-12">
                <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        <img :src="avatar" alt="avatar" class="avatar"> <span v-text="user.name"></span>
                    </div>
                </div>
                <div class="panel-body">
                    <p><b>Email: </b><span v-text="user.email"></span></p>
                    <p v-if="user.country"><b>Country: </b><span v-text="user.country"></span></p>
                    <p v-if="user.city"><b>city: </b><span v-text="user.city"></span></p>
                    <p><b>Created at:  </b><span v-text="this.createdAt"></span></p>
                    <p><b>Total Wishes: </b> <span v-text="this.user.total"></span></p>
                    <p><b>Completed Wishes: </b> <span v-text="this.user.completed"></span></p>
                    <button v-if="user.isActive" @click="deactivate" class="btn btn-danger">Deactivate</button>
                    <button v-else @click="activate" class="btn btn-primary">Activate</button>
                </div>
                </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        new Vue({
            el: '#user',
            data: {
                user: ''
            },
            computed: {
                avatar: function(){
                    return this.user.profile_picture || '/storage/avatar/gray.png'
                },
                createdAt: function(){
                    return moment(this.user.created_at).format('MMMM Do YYYY');
                }
            },
            methods: {
                getDetail: function (id) {
                    axios.get('api/user/' + id).then(res => {
                        this.user = res.data;
                    })
                },
                activate: function(){
                    axios.get('api/user/' + this.user.id + '/activate').then(res => {
                        this.user = res.data;
                    })
                },
                deactivate: function(){
                  axios.get('api/user/' + this.user.id + '/deactivate').then(res => {
                        this.user = res.data;
                    })  
                }
            }

        });
    </script>
@endsection