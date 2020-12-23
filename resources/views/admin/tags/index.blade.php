@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('مـدیریــت تــگ ها') }}
                        <div class="d-flex flex-row ">
                            <a class="btn btn-outline-dark mx-1" href="{{ route('tags.create') }}">{{ __('تــگ جدید') }}</a>
                            <a class="btn btn-outline-dark mx-1" href="{{ route('admin.dashboard') }}">{{ __('بازگشــت') }}</a>
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
                                <th>عمـلیات</th>
                            </tr>
                            </thead>
                            @foreach($tags as $tag)
                                <tbody>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->title}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td class="d-flex flex-row">
                                        <a class="btn btn-outline-success m-1" href="{{route('tags.edit',$tag)}}">{{__('ویرایـش')}}</a>

                                        <form action="{{route('tags.destroy',$tag)}}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-danger m-1">{{ __('حــذف') }}</button>
                                        </form>
                                    </td>
                                </tbody>
                            @endforeach
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
