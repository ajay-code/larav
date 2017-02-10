@extends('admin.layouts.main')

@section('content')
    <div class="row" id="user">
        <div class="col-md-6">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Latest Contacts</div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
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

        <div class="col-md-6">
            <div class="row" v-if="user">
                <div class="col-md-12">

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
            methods: {
                getDetail: function (id) {
                    axios.get('api/user/' + id).then(res => {
                        this.user = res.data;
                        console.log(res.data);
                    })
                }
            }

        });
    </script>
@endsection