@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('پــنل') }}</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td>نام کـاربری:</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>ایمیـل:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>شـماره همـراه:</td>
                                <td>{{$user->number}}</td>
                            </tr>
                            <tr>
                                <td>نـقـــش:</td>
                                <td>{{$user->RoleNames}}</td>
                            </tr>
                            <tr>
                                <td>وضـعیـت:</td>
                                <td id="status">{{$user->status ? 'غـیر فـعال' : 'فـعال'}}</td>
                            </tr>
                            <tr>
                                <td>عمـلیات:</td>
                                <td class="d-flex flex-row">
                                    <form action="" method="post">
                                        @csrf @method('delete')
                                        <button type="submit" class="btn btn-danger m-1">{{ __('حــذف') }}</button>
                                    </form>

                                    <div>
                                        <bottun class="btn btn-info m-1" onclick="status()">
                                            {{$user->status ? 'غیرفعال' : 'فعال'}}
                                        </bottun>
                                    </div>

                                </td>
                            </tr>

                            </thead>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        function status() {
            $.ajax({
                'method' : 'post',
                'url' : '{{ route('users.status', $user)}}',
                success : function (response){
                    console.log(response)
                    if(response.success)
                        $('#status').html(response.data.title + "(" + (response.data.status ? 'غیرفعال' : 'فعال' ) + ")")
                }
            })
        }
@endsection
