<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TimeRequest;

class PostController extends Controller
{
    public function index2() {
        $time = new Carbon(Carbon::now());
        $today = $time->format('Y-m-d');
        return view('post.index2', compact("time", "today"));
    }

    public function add()
    {
        $time = new Carbon(Carbon::now());
        $today = $time->format('Y-m-d');
        return view('post.add', compact("time", "today"));
    }

    public function store(TimeRequest $request)
    {
        $input = $request->only('customer', 'product', 'start', 'end', 'action', 'content',  'comment');

        $post = new Post();
        $post->customer = $input["customer"];
        $post->product = implode(",", $input["product"]);
        $post->start = $_POST['date1']." ".$input["start"];
        $post->end = $_POST['date2']. " ".$input["end"];
        $post->action = implode("," , $_POST["action"]);
        $post->content = $input["content"];
        $post->comment = $input["comment"];
        $post->save();

        return redirect('/')->with('success', '日報を登録しました');
    }

    public function page2(Request $request) {
        $day = $request->input('target');
        // $date = Post::whereDate('created_at', $day)->get();
        $date = Post::get();
        return view('post.page2', compact("day", 'date'));
    }

}
