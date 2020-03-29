@extends('layouts.admin')
@section('title')
    <title>Categories Clock Posts</title>
@stop
@section('content')
    @if(Session::has('deleted_category'))
        <p class=" label-danger">{{session('deleted_category')}}</p>
    @endif
    <h1>Categories</h1>

<div class="d-flex">
    <div class="col-sm-4 ">

        {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}
             <div class="form-group">
                 {!! Form::label('name', 'Name:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control'])!!}
             </div>

             <div class="form-group">
                 {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
             </div>
        {!! Form::close() !!}

    </div>

    <div class="col-sm-8">

        @if($categories)

            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created date</th>
                    <th>Updated date</th>
                    <th>Deleted date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'No date'}}</td>
                        <td>{{$category->deleted_at ? $category->deleted_at->diffForHumans() : 'No date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif

    </div>
</div>
@stop
