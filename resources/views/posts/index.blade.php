@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Author</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Operations</th>
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
                                            <div>{{ucfirst($category->title)."\n"}}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($post->tags as $tags)
                                            <div class="badge badge-dark border-info border">{{ucfirst($tags->title)}}</div>
                                            <br>
                                        @endforeach</td>
                                    <td>
                                        <form action="{{route('delete',['post'=>$post->id])}}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
