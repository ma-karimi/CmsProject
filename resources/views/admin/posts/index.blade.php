@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('مـدیریــت پسـت ها') }}
                        <a class="btn btn-outline-dark" href="{{ route('admin.dashboard') }}">{{ __('بازگشــت') }}</a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عـنوان</th>
                                <th>پـیوند یـکتــا</th>
                                <th>نـویسـنده</th>
                                <th>دسـته بـندی</th>
                                <th>تــگ</th>
                                <th>وضـعیـت</th>
                                <th>عمـلیات</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{ucfirst($post->title)}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{ucfirst($post->author->name)}}</td>
                                    <td>
                                        @foreach($post->categories as $category)
                                            <div class="badge badge-light border-dark border">{{ucfirst($category->title)."\n"}}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($post->tags as $tags)
                                            <div class="badge badge-info border-dark border">{{ucfirst($tags->title)}}</div>
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>{{$post->status ? 'انتـشــار' : 'بایـگانی' }}</td>
                                    <td>
                                        <a class="btn btn-outline-dark" href="{{route('posts.show', $post->id)}}">{{ __('نـمایــش') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="my-4 row justify-content-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
