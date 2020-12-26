@extends('layouts.users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('مـدیریــت کاربـران') }}
                        <div class="d-flex flex-row">
                            <form action="{{route('users.index')}}" class="form-group d-flex flex-row">
                                <select class="form-control" name="filter">
                                    @foreach(\App\Models\User::$statuses as $status)
                                        <option value="{{$status}}" @if(request('filter') == $status) selected @endif>{{__($status)}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-outline-secondary mx-1">
                                    {{ __('✓') }}
                                </button>
                            </form>
                            <a class="btn btn-outline-dark" href="{{ route('users.dashboard') }}">{{ __('بازگشــت') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>

                            </tr>
                            <tr>
                                <th>نام کـاربر</th>
                                <th>ایمیـل</th>
                                <th>شـماره همـراه</th>
                                <th>نـقـــش</th>
                                <th>دستـرسی</th>
                                <th>وضـعیـت</th>
                                <th>عمـلیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                @if(auth()->user()->id != $user->id && !$user->hasRole('super-admin'))
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->number}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                <span class="badge btn-warning">{{$role->name}}</span> <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($user->permissions as $permission)
                                                <span class="badge btn-info">{{$permission->name}}</span> <br>
                                            @endforeach
                                        </td>
                                        <td>{{$user->status ? 'فـعال' : 'غـیرفـعال'}}</td>
                                        <td>
                                            <a class="btn btn-outline-dark" href="{{route('users.show', $user->id)}}">{{ __('نـمایــش') }}</a>
                                        </td>
                                    </tr>
                                @endif
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
