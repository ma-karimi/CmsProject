@extends('layouts.users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h4>{{ Auth::user()->name }} خوش آمدید </h4>
                        <a class="btn btn-outline-dark" href="{{ route('logout') }}">{{ __('خـروج') }}</a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>نام کـاربری:</td>
                                    <td>{{$user->name}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>ایمیـل:</td>
                                    <td>{{$user->email}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>شـماره همـراه:</td>
                                    <td>{{$user->number}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>نـقـــش:</td>
                                    <td>{{$user->RoleNames ?: 'کاربر ساده'}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>وضـعیـت:</td>
                                    <td>{{$user->status ? 'فعال' : 'غیرفعال'}}</td>
                                    <td>
                                        <a class="btn btn-outline-dark"
                                           href="{{route('users.edit',$user)}}">
                                            {{ __('ویـرایــش') }}
                                        </a>
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
