@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-3">
                <div class="card-header">
                    <img src="{{ Gravatar::get($discussion->user->email) }}" style="width:40px;height:40px;border-radius:50%;" alt="">
                    <strong>{{$discussion->user->name}}</strong>
                </div>
                <div class="card-body">
                    <strong>{{$discussion->title}}</strong>
                    {!! $discussion->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


