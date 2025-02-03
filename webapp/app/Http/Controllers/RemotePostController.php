<?php
//app/Http/Controllers/RemotePostController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class RemotePostController extends Controller
{
    //
    public function createNewPost(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|integer|exists:users,id' 
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        try{
            $post = new Post();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->author_id = $request->input('author_id');
            $post->save();
            return response()->json([
                'message' => 'success post',
                'data' => $post
            ], 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
