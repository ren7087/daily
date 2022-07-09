<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TimeRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('auth')->except(['index2']);
    //     $this->middleware('auth');
    // }

    public function getPosts()
    {
        return PostResource::collection(Post::all());
    }

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
        if(isset($_POST['date1'])) {
            $post->start = $_POST['date1']." ".$input["start"];
        } else {
            $post->start = $input["start"];
        }
        if(isset($_POST['date2'])) {
            $post->end = $_POST['date2']. " ".$input["end"];
        } else {
            $post->end = $input["end"];
        }
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

    public function calendar(Request $request) {
        $day = $request->input('target');
        // $date = Post::whereDate('created_at', $day)->get();
        $date = Post::get();
        return view('post.calendar', compact("day", 'date'));
    }

    public function reactCalendar(Request $request) {
        $day = $request->input('target');
        // $date = Post::whereDate('created_at', $day)->get();
        $date = Post::get();
        return view('post.react-calendar', compact("day", 'date'));
    }

    public function reactIndex() {
        return view('post.react-index');
    }

    public function reactInput(Request $request) {
        $time = new Carbon(Carbon::now());
        $today = $time->format('Y-m-d');
        return view('post.react-input', compact("time", 'today'));
    }

    public function reactExcel() {
        $date = Post::get();
        return view('post.react-excel', compact("date"));
    }

    public function reactHundsontable() {
        $date = Post::get();
        return view('post.react-hundsontable', compact("date"));
    }

    public function reactExcelJs() {
        return view('post.react-excelJs');
    }

    public function hundsontable() {
        $date = Post::get();
        return view('post.hundsontable', compact("date"));
    }

    public function tabulator()
    {
        $date = Post::get();
        return view('post.tabulator', compact("date"));
    }

    public function fee(){
        $fees = Post::selectRaw('SUM(fee) as max_price')->first();
        return view('post.fee', compact("fees"));
    }

    // public function edit(Request $request){
    //     $textData = [];
    //     // $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
    //     $data = $request->all();
    //     // dd($data);
    //     // $data = json_decode($data);

    //     // foreach ($data as $Data) {
    //     // $textData [] = [
    //     //     'id' => $Data['id'] ?? null,
    //     //     'customer' => $Data['customer'],
    //     //     'location' => $Data['locaion'],
    //     //     'product' => $Data['product'],
    //     //     'start' => $Data['start'],
    //     //     'end' => $Data['end'],
    //     //     'action' => $Data['action'],
    //     //     'transportation' => $Data['transportation'],
    //     //     'fee' => $Data['fee'],
    //     //     'content' => $Data['content'],
    //     //     'created_at' => $Data['created_at'],
    //     //     'updated_at' => $Data['updated_at'],
    //     // ];
    //     // }

    //     // // idが一致するレコードがあれば更新、無ければレコード作成する
    //     // Post::upsert($data, ['id']);
    //     return response()->json($data);

    // }

    // public function edit(Request $request)
    // {
    //     $post = $this->Post->create([
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
    //      $post->save();

    //     return response()->json($post);
    // }

    // public function edit(TimeRequest $request)
    // {
    //     $data = ["id"=>"1","customer"=>"吉田です","location"=>"八王子駅","product"=>"テレビ","start"=>"2022-06-04 17:00","end"=>"2022-06-04 18:00","action"=>"打ち合わせ","transportation"=>"電車","fee"=>"1000円","content"=>"これはtestですこれはtestですこれはtestです","comment"=>"これはtestですこれはtestです"];
    //     // $data = $request->all();
    //     // $post = new Post();
    //     // $post->data = $data;
    //     // $post->save();
    //     // return response()->json($post);
    //     return response()->json($data);
    // }

    // public function edit(Request $request){
    //     $textData = [];
    //     $data = $request->all();
    //     foreach ($data as $Data) {
    //     $textData[] = [
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
    //     Post::upsert($textData, ['id']);
    //     return response()->json($textData);
    // }

    // public function edit(Request $request)
    // {
    // $data = $request->get('data');
    // // Biasakan untuk selalu membungkus dengan transaction jika melakukan insert/update/delete beberapa query sekaligus
    // DB::transaction(function () use ($data) {

    //     // hapus data
    //     $ids = collect($data)->pluck('id');
    //     if (!empty($ids)) {
    //     Post::whereNotIn('id', $ids)->delete();
    //     }

    //     foreach ($data as $row) {
    //     if ($row['id']) {
    //         // update existing data
    //         Post::whereId($row['id'])->update($row);
    //     } else {
    //         // insert data baru
    //         Post::create($row);
    //     }
    //     }
    // });
    // return redirect()->back()->withSuccess(sprintf("Berhasil menyimpan %d data mobil", count($data)));
    // }

    public function edit()
    {
        $handle = fopen('./nippou.json', 'w');
        $params = file_get_contents('php://input');
        fwrite($handle, $params);
        fclose($handle);
    }

    public function store2(Request $request)
    {
        $input = $request->only('customer', 'location', 'product', 'start', 'end', 'action', 'transportation', 'fee', 'content',  'comment');

        $post = new Post();
        $post->customer = $input["customer"];
        $post->location = $input["location"];
        $post->product = $input["product"];
        if(isset($_POST['date1'])) {
            $post->start = $_POST['date1']." ".$input["start"];
        } else {
            $post->start = $input["start"];
        }
        if(isset($_POST['date2'])) {
            $post->end = $_POST['date2']. " ".$input["end"];
        } else {
            $post->end = $input["end"];
        }
        $post->action = $input["action"];
        $post->transportation = $input["transportation"];
        $post->fee = $input["fee"];
        $post->content = $input["content"];
        $post->comment = $input["comment"];
        $post->save();

        return redirect('/')->with('success', '日報を登録しました');
    }

}
