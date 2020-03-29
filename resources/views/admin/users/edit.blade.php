@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>
    <div class="row">

        @include('includes.form_error')

    </div>

    <div class="row">

        <div class=" col-sm-3 ">

            <h4>Profile Photo: </h4>
            <img  src="{{$user->photo ? $user->photo->path : '/images/Profile_photo.png'}}" alt="" class="col-sm-12  img-responsive img-rounded">

            <p class="text-break">{{$user->photo ?  str_replace("/images/","", $user->photo->path) : '/images/Profile_photo.png'}}</p>
        </div>

        <div class="col-sm-9 ">
{{--Update ----}}
            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>
            {{--    Chrome auto filler shows your email instead of that user's email--}}

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id',  $roles , null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), null , ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6 col-lg-3']) !!}
            </div>

            {!! Form::close() !!}

{{--Delete  -------------------------------------------------------------------------------------------------}}

            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-6 col-lg-3 pull-right']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>


@stop
