@extends('layouts.users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('ویـرایــش') }}
                        <a class="btn btn-outline-dark" href="{{ route('users.dashboard') }}">{{ __('بازگشــت') }}</a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update',$user) }}">
                            @csrf @method('put')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نــام:') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایـمیــــل:') }}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('شـماره هـمراه:') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="number" value="{{$user->number}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('پـســورد:') }}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تــکـرار پـســورد:') }}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ویـرایــش') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
