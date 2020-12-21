@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('تــگ ها') }}
                        <a class="btn btn-outline-dark" href="{{ route('home') }}">{{ __('بازگشــت') }}</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-info">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عـنوان</th>
                                <th>پـیوند یـکتــا</th>
                                <th>عمـلیات</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{ucfirst($tag->title)}}</td>
                                    <td>{{ucfirst($tag->slug)}}</td>
                                    <td>
                                        <a class="btn btn-outline-dark" href="{{route('tags.show', $tag->id)}}">{{ __('نـمایــش') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="my-4 row justify-content-center">
                            {!! $tags->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
