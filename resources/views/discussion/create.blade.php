@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Discussion</div>
                <div class="card-body">
                    <form action="{{route('discussion.store')}}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                          <label for="">Title</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                          </small>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="">Content</label>
                            <input id="x" type="hidden" name="content">
                            <trix-editor input="x"></trix-editor>
                            <small id="helpId" class="text-danger">
                                @error('content')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Channel</label>
                            <select name="channel" id="channel" class="form-control" placeholder="" aria-describedby="helpId">
                                <option value=''>Select Channel</option>
                                @foreach($channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                                @endforeach
                            </select>    
                            <small id="helpId" class="text-danger">
                                @error('channel')
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
