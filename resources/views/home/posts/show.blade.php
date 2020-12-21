@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __("پـســت $post->title") }}
                        <a class="btn btn-outline-dark" href="{{ route('home') }}">{{ __('بازگشــت') }}</a>
                    </div>

                    <div class="card-body">

                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif


                        <table class="table table-info">
                            <thead>
                            <tr>
                                <td>عـنوان:</td>
                                <td>{{$post->title}}</td>
                            </tr>
                            <tr>
                                <td>مـحتـوی:</td>
                                <td>{{$post->content}}</td>
                            </tr>
                            <tr>
                                <td>نـویسـنده:</td>
                                <td>{{$post->author->name}}</td>
                            </tr>
                            <tr>
                                <td>دسـته بـندی:</td>
                                <td>
                                    @foreach($post->categories as $category)
                                        <div class="badge badge-light border-dark border">{{ucfirst($category->title)}}</div>
                                @endforeach
                                <td>
                            </tr>
                            <tr>
                                <td>تــگ:</td>
                                <td>
                                    @foreach($post->tags as $tag)
                                        <div class="badge badge-info border-dark border">{{ucfirst($tag->title)}}</div>
                                    @endforeach
                                </td>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

