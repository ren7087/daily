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
        $input = $request->only('customer', 'location', 'product', 'start', 'end', 'action', 'transportation', 'fee', 'content',  'comment');

        $post = new Post();
        $post->customer = $input["customer"];
        $post->location = $input["location"];
        $post->product = implode(",", $input["product"]);
        $post->start = $_POST['date1']." ".$input["start"];
        $post->end = $_POST['date2']. " ".$input["end"];
        $post->action = implode("," , $_POST["action"]);
        $post->transportation = implode("," , $_POST["transportation"]);
        $post->fee = $input["fee"];
        $post->content = $input["content"];
        $post->comment = $input["comment"];
        $post->save();

        return redirect('/')->with('success', '日報を登録しました');
    }

    public function page(Request $request) {
        $day = $request->input('target');
        // $date = Post::whereDate('created_at', $day)->get();
        $date = Post::get();
        return view('post.page', compact("day", 'date'));
    }

    public function page2(Request $request) {
        $day = $request->input('target');
        // $date = Post::whereDate('created_at', $day)->get();
        $date = Post::get();
        return view('post.page2', compact("day", 'date'));
    }

    public function fee(){
        $fees = Post::selectRaw('SUM(fee) as max_price')->first();
        return view('post.fee', compact("fees"));
    }

    // public function edit(TimeRequest $request){
    //     $textData = [];
    //     // $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
    //     $data = $request->all();
    //     // $data = json_decode($json);

    //     foreach ($data as $Data) {
    //     $data [] = [
    //         'id' => $Data['id'] ?? null,
    //         'customer' => $Data['customer'],
    //         'location' => $Data['locaion'],
    //         'product' => $Data['product'],
    //         'start' => $Data['start'],
    //         'end' => $Data['end'],
    //         'action' => $Data['action'],
    //         'transportation' => $Data['transportation'],
    //         'fee' => $Data['fee'],
    //         'content' => $Data['content'],
    //         'created_at' => $Data['created_at'],
    //         'updated_at' => $Data['updated_at'],
    //     ];
    //     }

    //     // idが一致するレコードがあれば更新、無ければレコード作成する
    //     Post::upsert($data, ['id']);

    // }

    // public function edit(TimeRequest $request)
    // {
    //     $Post = $this->Post->create([
    //         'id' => $request->post('name') ?? null,
    //         'customer' => $request->post('customer'),
    //         'location' => $request->post('location'),
    //         'product' => $request->post('product'),
    //         'start' => $request->post('start'),
    //         'end' => $request->post('end'),
    //         'action' => $request->post('action'),
    //         'transportation' => $request->post('transportation'),
    //         'fee' => $request->post('fee'),
    //         'content' => $request->post('content'),
    //         'created_at' => $request->post('created_at'),
    //         'updated_at' => $request->post('updated_at'),
    //      ]);

    //     return response()->json(['status'=>true,'message'=>'Post created　successfully','data'=>$Post]);
    // }

    public function edit(TimeRequest $request)
    {
        // $data = ["id"=>"1","customer"=>"吉田です","location"=>"八王子駅","product"=>"テレビ","start"=>"2022-06-04 17:00","end"=>"2022-06-04 18:00","action"=>"打ち合わせ","transportation"=>"電車","fee"=>"1000円","content"=>"これはtestですこれはtestですこれはtestです","comment"=>"これはtestですこれはtestです"];
        $data = $request->all();
        $post = new Post();
        $post->data = $data;
        $post->save();
    }


}
