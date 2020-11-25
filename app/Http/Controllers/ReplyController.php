<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReplyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Comment::find($request->comment_id)
                ->replies()
                ->create([
                    'content' => $request->reply
                ]);
        } catch (Exception $e) {
            Log::error("Reply Storage Exception: \n $e");
            // For the sake of fun and to move quickly I'll use error 41
            // https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/418
            return response("An unknow error was encountered", 418);
        }
    }
}
