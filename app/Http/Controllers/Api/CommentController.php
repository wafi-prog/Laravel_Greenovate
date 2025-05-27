<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($artikelId)
    {
        $comments = Comment::where('artikel_id', $artikelId)->with('user')->get();
        return response()->json($comments);
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'artikel_id' => 'required|exists:artikels,id',
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'artikel_id' => $validated['artikel_id'],
            'user_id' => Auth::id(),
            'content' => $validated['content'],
        ]);

        return response()->json($comment, 201);
    }

     public function update(Request $request, $commentId)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->update([
            'content' => $validated['content'],
        ]);

        return response()->json($comment);
    }

    // Delete a comment
   public function destroy($artikelId, $commentId)
{
    $comment = Comment::where('artikel_id', $artikelId)->findOrFail($commentId);

    if ($comment->user_id != Auth::id()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    $comment->delete();

    return response()->json(['message' => 'Comment deleted successfully']);
}


}
