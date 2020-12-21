@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('دسـته بنـدی ها') }}
                        <a class="btn btn-outline-dark" href="{{ route('home') }}">{{ __('بازگشــت') }}</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-info">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عـنوان</th>
                                <th>پـیوند یـکتــا</th>
                                <th>تـصویــر</th>
                                <th>عمـلیات</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{ucfirst($category->title)}}</td>
                                    <td>{{ucfirst($category->slug)}}</td>
                                    <td>
                                        <img style="max-height: 15%;max-width: 15%" src="{{Storage::url($category->image->path)}}">
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-dark" href="{{route('categories.show', $category->id)}}">{{ __('نـمایــش') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="my-4 row justify-content-center">
                            {!! $categories->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
