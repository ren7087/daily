<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/backimage.css') }}">
</head>
<body>
    <div class="container" style="margin-top: 200px;">
        <div class="container">
            <div style="text-align: center">
                <h2 style="color: white">営業結果登録</h2><br />
                <p style="color: white">開始時間</p>
                <select name="month">
                    <option value="jan">10:00</option>
                    <option value="feb">12:00</option>
                    <option value="mar">14:00</option>
                    <option value="apr">16:00</option>
                    <option value="may">18:00</option>
                    <option value="jun">20:00</option>
                    <option value="jul">22:00</option>
                    <option value="aug">24:00</option>
                </select>
            </div>

            <div class="text-center" style="margin: auto">
                <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#exampleModalCenter">
                    登録する
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">営業結果登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            @csrf
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">開始時間<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-name"></p>
                                    <input class="modal-name" type="text" name="name" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">終了時間<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-email"></p>
                                    <input class="modal-email" type="text" name="email" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">内容<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-contents"></p>
                                    <textarea name="comment" id="comment" cols="30" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">感想<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-contents"></p>
                                    <textarea name="comment" id="comment" cols="30" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">修正する</button>
                                <button type="button" class="btn btn-secondary" style="background-color: red" data-dismiss="modal">送信する</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/modal.js') }}"></script>
</body>
</html>

<script>
    // windowOpen()
    // alert("このデータを登録しますか？ \n https://○○○○○○○.com");
    function windowOpen(){
        window.open('https://ja.wikipedia.org/wiki/%E3%83%A1%E3%82%A4%E3%83%B3%E3%83%9A%E3%83%BC%E3%82%B8', null ,'top=100,left=100,width=400,height=300');
    }
</script>
