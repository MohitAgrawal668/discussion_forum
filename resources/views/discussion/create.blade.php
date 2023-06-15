@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Discussion</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group mb-4">
                          <label for="">Title</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="">Content</label>
                            <textarea name="content" id="content" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                            <small id="helpId" class="text-muted"></small>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Channel</label>
                            <select name="channel" id="channel" class="form-control" placeholder="" aria-describedby="helpId">
                                <option value=''>Select Channel</option>
                                @foreach($channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                                @endforeach
                            </select>    
                            <small id="helpId" class="text-muted"></small>
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
