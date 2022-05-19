<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        return view('post.index');
    }

    public function add()
    {
        $time = new Carbon(Carbon::now());
        $today = $time->format('Y年m月d日');
        return view('post.add', compact("time", "today"));
    }

    public function store(Request $request)
    {
        $input = $request->only('customer', 'product', 'start', 'end', 'action', 'content',  'comment');

        $post = new Post();
        $post->customer = $input["customer"];
        $post->product = implode(",", $input["product"]);
        $post->start = $input["start"];
        $post->end = $input["end"];
        $post->action = implode("," , $_POST["action"]);
        $post->content = $input["content"];
        $post->comment = $input["comment"];
        $post->save();

        return redirect('/')->with('success', '日報を登録しました');
    }

    public function page(Request $request) {
        $target = $request->input('target');
        $match = Post::whereDate('created_at', $target)->get();
        return view('post.page', compact("target", 'match'));
    }

    public function page2(Request $request) {
        $day = $request->input('target');
        // $date = Post::whereDate('created_at', $day)->get();
        $date = Post::get();
        return view('post.page2', compact("day", 'date'));
    }

}
