@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('دسـتــه بنـدی جدید') }}
                        <a class="btn btn-outline-dark" href="{{ route('categories.index') }}">{{ __('بازگشــت') }}</a>
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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('categories.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('عـنوان:') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('پـیوند یـکتــا:') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="slug">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('تصـویر:') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alt" class="col-md-4 col-form-label text-md-right">{{ __('متـن جایـگزین :') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="alt">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('افـزودن') }}
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
