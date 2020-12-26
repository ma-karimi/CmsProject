@extends('layouts.users')

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
                                <td>
                                    @if(!$user->hasPermissionTo('manager') or auth()->user()->hasRole('super-admin'))
                                    <form action={{route('users.role',$user)}} method="post" class="d-flex flex-row">
                                        @csrf
                                        <select class="form-control col-md-3" name="role">
                                            @foreach($roles as $role)
                                                @component('components.select',[
                                                    'value'=>$role->name, 'lable'=>$role->name,])
                                                @endcomponent
                                            @endforeach
                                        </select>
                                        <button type="submit" class="badge btn-outline-info mx-2">
                                            {{ __('✓') }}
                                        </button>
                                    </form>
                                    @else
                                        @foreach($user->roles as $role)
                                            <span class="badge btn-warning">{{$role->name}}</span>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>دستـرسی:</td>
                                <td>
                                    @if(!$user->hasPermissionTo('manager') or auth()->user()->hasRole('super-admin'))
                                        <form action={{route('users.permission',$user)}} method="post" class="d-flex flex-row">
                                            @csrf
                                            <select class="form-control col-md-3" name="role">
                                                @foreach($permissions as $permission)
                                                    @component('components.select',['value'=>$permission->name, 'lable'=>$permission->name,])
                                                    @endcomponent
                                                @endforeach
                                            </select>
                                            <button type="submit" class="badge btn-outline-info mx-2">
                                                {{ __('✓') }}
                                            </button>
                                        </form>
                                    @else
                                        @foreach($user->permissions as $permission)
                                            <span class="badge btn-info">{{$permission->name}}</span>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            @can('manager')
                                @if(!$user->hasPermissionTo('manager'))
                                    <tr>
                                        <td>وضـعیـت:</td>
                                        <td>
                                            <form action={{route('users.status',$user)}} method="post" class="d-flex flex-row">
                                                @csrf
                                                @component('components.checkbox',[
                                                'name'   => 'status', 'value'  => 1,
                                                'checked'=> $user->status == 1, 'lable'  => 'فـعال'])
                                                @endcomponent
                                                @component('components.checkbox',[
                                                    'name'   => 'status', 'value'  => 0,
                                                    'checked'=> $user->status == 0, 'lable'  => 'غـیرفـعال'])
                                                @endcomponent
                                                <button type="submit" class="badge btn-outline-info">
                                                    {{ __('✓') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endcan
                            @can('manager')
                                @if(!$user->hasPermissionTo('manager'))
                                    <tr>
                                        <td>عمـلیات:</td>
                                        <td class="d-flex flex-row">
                                            <form action="{{route('users.destroy',$user)}}" method="post">
                                                @csrf @method('delete')
                                                <button type="submit"
                                                        class="btn btn-outline-danger m-1">{{ __('حــذف') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endcan
                            </thead>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

