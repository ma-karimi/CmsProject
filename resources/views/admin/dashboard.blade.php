@extends('layouts.admin')

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
                                    <td>#</td>
                                    <td>{{$admin->id}}</td>
                                </tr>
                                <tr>
                                    <td>نام کـاربری:</td>
                                    <td>{{$admin->name}}</td>
                                </tr>
                                <tr>
                                    <td>ایمیـل:</td>
                                    <td>{{$admin->email}}</td>
                                </tr>
                                <tr>
                                    <td>شـماره همـراه:</td>
                                    <td>{{$admin->number}}</td>
                                </tr>
                                <tr>
                                    <td>نـقـــش:</td>
                                    <td>{{$admin->RoleNames}}</td>
                                </tr>
                                <tr>
                                    <td>وضـعیـت:</td>
                                    <td>{{$admin->status ? 'غیرفعال' : 'فعال'}}</td>
                                </tr>
                                <tr>
                                    <td>عمـلیات:</td>
                                    <td>{{$admin->id}}</td>
                                </tr>

                            </thead>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
