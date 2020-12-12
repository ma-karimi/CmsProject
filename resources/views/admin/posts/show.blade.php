@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('پــنل') }}</div>

                    <div class="card-body">

                        @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif


                        <table class="table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>{{$post->id}}</td>
                            </tr>
                            <tr>
                                <td>عـنوان:</td>
                                <td>{{$post->title}}</td>
                            </tr>
                            <tr>
                                <td>مـحتـوی:</td>
                                <td>{{$post->content}}</td>
                            </tr>
                            <tr>
                                <td>پـیوند یـکتــا:</td>
                                <td>{{$post->slug}}</td>
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
                                    @foreach($post->tags as $tags)
                                        <div class="badge badge-info border-dark border">{{ucfirst($tags->title)}}</div>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>وضـعیـت:</td>
                                <td>{{$post->status ? 'انتـشــار' : 'بایـگانی'}}</td>
                            </tr>
                            <tr>
                                <td>عمـلیات:</td>
                                <td class="d-flex flex-row">
                                    <form action="{{route('posts.destroy',$post)}}" method="post">
                                        @csrf @method('delete')
                                        <button type="submit" class="btn btn-danger m-1">{{ __('حــذف') }}</button>
                                    </form>

                                    <form action="{{route('posts.status',$post)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-1">
                                            {{$post->status ? 'بایـگانی' : 'انتـشــار'}}
                                        </button>

                                    </form>
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

