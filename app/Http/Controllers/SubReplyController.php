<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubReplyController extends Controller
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
            Reply::find($request->reply_id)
                ->sub_replies()
                ->create([
                    'content' => $request->sub_reply
                ]);
        } catch (Exception $e) {
            Log::error("SubReply Storage Exception: \n $e");
            // For the sake of fun and to move quickly I'll use error 41
            // https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/418
            return response("An unknow error was encountered", 418);
        }
        
    }
}
