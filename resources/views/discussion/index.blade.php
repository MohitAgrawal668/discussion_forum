@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($discussions as $discussion)
                <div class="card m-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img src="{{ Gravatar::get($discussion->user->email) }}" style="width:40px;height:40px;border-radius:50%;" alt="">
                                <strong>{{$discussion->user->name}}</strong>
                            </div>
                            <div>
                                <a href="{{route('discussion.show',['discussion'=> $discussion->slug])}}"><button type="button" class='btn btn-success btn-sm'>View</button></a>
                            </div>
                        </div>        
                    </div>
                    <div class="card-body">
                        {{$discussion->title}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


