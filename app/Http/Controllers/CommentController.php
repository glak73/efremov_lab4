<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'comment_body' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->comment_body = $validatedData['comment_body'];
        $comment->product_id = $product->id;
        $comment->save();

        return redirect()->back()->with('success', 'Комментарий добавлен успешно!');
    }
}
