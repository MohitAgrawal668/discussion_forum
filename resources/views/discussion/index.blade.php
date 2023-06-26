@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <p style="text-align:right"><a href="{{route('discussion.create')}}"><button type="button" class='btn btn-success'>Add Discussion</button></a></p>
            <div class="card">
                
                <div class="card-header">Discussions</div>
                <div class="card-body">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Title</th>
                                <th>Channel</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($discussions as $discussion)
                                    <tr>
                                        <td scope="row">{{ $discussion->title }}</td>
                                        <td>{{ $discussion->channel->name }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    {{ $discussions->links() }}                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


