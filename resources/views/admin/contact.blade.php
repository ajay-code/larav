@extends('admin.layouts.main')

@section('content')
    <div class="row" id="contact">
        <div class="col-md-6">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Latest Contacts</div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Subject</th>
                            <th>name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <a href="#"
                                       @click.stop.prevent="getDetail({{ $contact->id }})"
                                    >{{ 'Detail...' }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $contacts->links() }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="row" v-if="contact">
                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title">By: <span v-text="contact.name"></span></div>
                    </div>
                    <div class="content-box-header">
                        <div class="panel-title">Subject: <span v-text="contact.subject"></span></div>
                    </div>
                    <div class="content-box-large box-with-header">
                        <p v-text="contact.message"></p>
                        <br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        new Vue({
            el: '#contact',
            data: {
                contact: '',
            },
            methods: {
                getDetail: function (id) {
                    axios.get('contact/' + id).then(res => {
                        this.contact = res.data;
                    })
                }
            }

        });
    </script>
@endsection