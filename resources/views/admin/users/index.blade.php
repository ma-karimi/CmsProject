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
                                    <td>
                                        <a href="{{route('admin.users.show')}}">{{$user->id}}</a>
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->number}}</td>
                                    <td>{{$user->getRoleNames()}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                        <form action="" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
