<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Comment::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $comment = User::find($request->user_id)
                ->comments()
                ->create([
                    'content' => $request->comment
                ]);

            return response()->json($comment);

        } catch (Exception $e) {
            Log::error("Comment Storage Exception: \n $e");
            // For the sake of fun and to move quickly I'll use error 41
            // https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/418
            return response("An unknow error was encountered", 418);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return response()->json(
            $comment
        );
    }
}
