@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-3">
                <div class="card-header">
                    Notifications        
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($notifications as $notification)
                            @if($notification->type=='App\Notifications\NewReplyAdded')
                                <li class="list-group-item">A new reply added on this discussion 
                                    <a href="{{ route('discussion.show',['discussion' => $notification->data['discussion']['slug']]) }}" class="btn btn-info btn-sm text-white" style="float:right">View Discussion</a>
                                </li>
                            @elseif($notification->type=='App\Notifications\MarkAsBestReply')
                                <li class="list-group-item">Your reply to discussion <strong>{{ $notification->data['discussion']['title'] }}</strong> was marked as best reply.
                                    <a href="{{ route('discussion.show',['discussion' => $notification->data['discussion']['slug']]) }}" class="btn btn-info btn-sm text-white" style="float:right">View Discussion</a>
                                </li>    
                            @endif
                        @endforeach        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


