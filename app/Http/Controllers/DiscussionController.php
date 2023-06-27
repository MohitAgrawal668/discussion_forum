<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscussionRequest;
use App\Models\Discussion;
use App\Models\Reply;
use App\Notifications\MarkAsBestReply;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    } 

    public function index()
    {
        $discussions = Discussion::filterByChannel()->paginate(1);
        $data = compact('discussions');
        return view('discussion.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("discussion.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
            'title' => $request->title,
            'content' => $request->content,
            'channel_id' => $request->channel,
            'slug' => Str::slug($request->title)
        ]);

        return redirect(route('discussion.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Discussion $discussion)
    {
        $data = compact('discussion');
        return view('discussion.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function bestReply(Discussion $discussion, Reply $reply)
        {
             $discussion->update([
                'reply_id' => $reply->id
             ]);
             
             $reply->user->notify(new MarkAsBestReply($discussion));

             session()->flash('success',"Marked as best");

             return redirect()->back();
        }
}
