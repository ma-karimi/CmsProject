@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        {{ __('مـدیریــت دسـتــه بنـدی ها') }}
                        <div class="d-flex flex-row ">
                            <a class="btn btn-outline-dark mx-1" href="{{ route('categories.create') }}">{{ __('دسـتــه بنـدی جدید') }}</a>
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
                                <th>تصـویـر</th>
                                <th>عمـلیات</th>
                            </tr>
                            </thead>
                            @foreach($categories as $category)
                                <tbody>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <div class="">
                                            <img style="max-width: 10%;max-height: 10%"
                                                 src="{{Storage::url($category->image->path)}}"
                                                 alt="{{$category->image->alt}}">
                                        </div>
                                    </td>
                                    <td class="d-flex flex-row">
                                        <a class="btn btn-outline-success m-1" href="{{route('categories.edit',$category)}}">{{__('ویرایـش')}}</a>

                                        <form action="{{route('categories.destroy',$category)}}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-outline-danger m-1">{{ __('حــذف') }}</button>
                                        </form>
                                    </td>
                                </tbody>
                            @endforeach
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
