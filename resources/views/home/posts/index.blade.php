@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('پسـت های اخـیر') }}
                    </div>

                    <div class="card-body">

                        <table class="table table-info">
                            <thead>
                            <tr>
                                <th>عـنوان</th>
                                <th>مـتـــن</th>
                                <th>نـویسـنده</th>
                                <th>دسـته بـندی</th>
                                <th>تــگ</th>
                                <th>عمـلیات</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ucfirst($post->title)}}</td>
                                    <td>{{Str::limit($post->content, 20) }}</td>

                                    <td>{{ucfirst($post->author->name)}}</td>
                                    <td>
                                        @foreach($post->categories as $category)
                                            <div class="badge badge-light border-dark border">{{ucfirst($category->title)."\n"}}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            <div class="badge badge-info border-dark border">{{ucfirst($tag->title)}}</div>
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-dark" href="{{route('post', $post->id)}}">{{ __('نـمایــش') }}</a>
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
