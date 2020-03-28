<?php

namespace App\Http\Controllers\API\Forum;

use App\Models\Forum\Like;
use App\Models\Forum\Thread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ThreadController extends Controller
{
    private $relations = ['topic', 'author', 'likes'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topicID)
    {
        return response()->json(Thread::with($this->relations)
            ->orderBy('created_at', 'DESC')
            ->where('topic_id', $topicID)
            ->paginate()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($topicID)
    {
        $validator = Validator::make(request()->all(), [
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        $row = request()->only(['text']);
        $row['topic_id'] = $topicID;
        $row['author_id'] = auth()->id();
        $topic = Thread::create($row);

        return response()->json(Thread::with($this->relations)->find($topic->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function like($topicID, $threadID)
    {
        $like = Like::create([
            'target_id' => $threadID,
            'type'      => 'THREAD',
            'author_id' => auth()->id()
        ]);

        return $like;
    }
}
