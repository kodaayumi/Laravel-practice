<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class RemotePostController extends Controller
{
    //
    public function createNewPost(Request $request){
        try{
            $post = new Post();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->save();
            return response()->json([
                'massage' => 'success post', data, => $post], 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
