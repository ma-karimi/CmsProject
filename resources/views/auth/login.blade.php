@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ورود') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('checkNumber') }}">
                            @csrf

                            @if(session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif

                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('شماره موبایل:') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="number">
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ورود') }}
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
