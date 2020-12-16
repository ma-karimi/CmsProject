@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __("کاربـر $user->name") }}
                        <a class="btn btn-outline-dark" href="{{ route('users.index') }}">{{ __('بازگشــت') }}</a>
                    </div>

                    <div class="card-body">

                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif


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
                                    <form action="{{route('users.destroy',$user)}}" method="post">
                                        @csrf @method('delete')
                                        <button type="submit" class="btn btn-danger m-1">{{ __('حــذف') }}</button>
                                    </form>

                                    <form action="{{route('users.status',$user)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-1">
                                            {{$user->status ? 'فـعال سـازی' : 'غـیر فـعال سـازی '}}
                                        </button>
                                    </form>

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

