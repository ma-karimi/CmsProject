@extends('layouts.users')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('مـدیریــت پسـت ها') }}
                        <div class="d-flex flex-row">
                            <form action="{{route('posts.index')}}" class="form-group d-flex flex-row">
                                <select class="form-control" name="filter">
                                    @if(auth()->user()->hasPermissionTo('publisher'))
                                        @foreach(\App\Models\Post::$admin_filters as $admin_filter)
                                            <option value="{{$admin_filter}}" @if(request('filter') == $admin_filter) selected @endif>{{__($admin_filter)}}</option>
                                        @endforeach
                                    @else
                                        @foreach(\App\Models\Post::$user_filters as $user_filter)
                                            <option value="{{$user_filter}}" @if(request('filter') == $user_filter) selected @endif>{{__($user_filter)}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <button type="submit" class="btn btn-outline-secondary mx-1">
                                    {{ __('✓') }}
                                </button>
                            </form>
                            <a class="btn btn-outline-dark" href="{{ route('posts.create') }}">{{ __('پسـت جدید') }}</a>
                            <a class="btn btn-outline-dark" href="{{ route('users.dashboard') }}">{{ __('بازگشــت') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عـنوان</th>
                                <th>پـیوند یـکتــا</th>
                                @can('publisher')
                                    <th>نـویسـنده</th>
                                @endcan
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
                                    @can('publisher')
                                        <td>{{ucfirst($post->author->name)}}</td>
                                    @endcan
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
                                    <td class="d-flex flex-row">
                                        <a class="btn btn-outline-dark" href="{{route('posts.show', $post->id)}}">{{ __('نـمایــش') }}</a>
                                        @if($post->deleted_at == true)
                                            <form action="{{route('posts.terminate',$post)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger mx-1">
                                                    {{ __('حـذف') }}
                                                </button>
                                            </form>
                                        @endif
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
