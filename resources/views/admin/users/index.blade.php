@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('مـدیریــت کاربـران') }}
                        <a class="btn btn-outline-dark" href="{{ route('admin.dashboard') }}">{{ __('بازگشــت') }}</a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کـاربری</th>
                                <th>ایمیـل</th>
                                <th>شـماره همـراه</th>
                                <th>نـقـــش</th>
                                <th>وضـعیـت</th>
                                <th>عمـلیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->number}}</td>
                                    <td>{{$user->RoleNames}}</td>
                                    <td>{{$user->status ? 'غیرفعال' : 'فعال'}}</td>
                                    <td>
                                        <a class="btn btn-outline-dark" href="{{route('users.show', $user->id)}}">{{ __('نـمایــش') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="my-4 row justify-content-center">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
