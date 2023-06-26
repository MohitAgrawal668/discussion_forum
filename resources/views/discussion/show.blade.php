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
                    <p class="text-center">
                        <strong>{{$discussion->title}}</strong>
                    </p>
                    
                    <hr>
                    {!! $discussion->content !!}
                </div>
            </div>

            <div class="card m-3">
                <div class="card-header">Add Replies</div>
                <div class="card-body">
                    <form action="{{route('reply.store',['discussion'=>$discussion->slug])}}" method="post">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <label for="">Content</label>
                            <input id="content" type="hidden" name="content">
                            <trix-editor input="content"></trix-editor>
                            <small id="helpId" class="text-danger">
                                @error('content')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection

@section('script')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection


