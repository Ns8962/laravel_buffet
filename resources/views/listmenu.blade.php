<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/main.scss'])
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
</head>
<body>
    <div class="container py-2">
        <div class="card py-2">
            <div class="container">
                <h4>รายการอาหาร</h4>
              
                <button type="button" onclick="back()" class="btn">
                    <img src="../public/upload/arrow.png" class="card-img-top" width="40px"  height="40px" title="กลับ">
                </button>
                    <div class="row">
                        @foreach ($get_menu as $item)
                        <form action="{{route('add_menu')}}" method="post" id="list_menu_form_{{$item->id}}">
                            @csrf
                                    <div class="col-md-2 py-2">
                                        <div class="card" style="width: 100%;">
                                            <img src="../public/upload/{{$item->type_id}}.png" class="card-img-top" alt="" width="50px" height="80px">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$item->menu_name}}</h5>
                                                <div class="d-flex align-items-center py-2">
                                                    <input type="hidden" name="menu_id" id="menu_id" value="{{$item->id}}">
                                                    <input type="hidden" name="table_id" id="table_id" value="{{$tb_id}}">
                                                    <input type="hidden" name="menu_name" id="menu_name" value="{{$item->menu_name}}">
                                                    <input type="hidden" name="menu_type_id" id="menu_type_id" value="{{$item->type_id}}">
                                                    <input type="number" class="form-control" name="menu_count" id="menu_count" value="" min="0" max="25">
                                                    <button type="button" class="btn btn-info" onclick="getselect(`{{$item->id}}`)"> เพิ่ม </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        @endforeach    
                    </div>
                    <form action="{{route('preorder')}}" method="post" id="order_menu_form">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="tb" id="tb" value="">
                            <button type="button" class=" floating-btn icon"  onclick="getorder()">
                                <img src="../public/upload/checklist.png" class="card-img-top" width="50px"  height="50px" title="คำสั่งซื้อ">
                            </button>
                        </div>
                    </form>
        </div>
    </div>
</body>
</html>
<script>
function getselect(id){
   document.getElementById('list_menu_form_'+ id ).submit();
}
function back(){
    window.location.href = `{{ url('user?tb_id=') }}` + document.getElementById('table_id').value;
}
function getorder(){
    document.getElementById('tb').value = document.getElementById('table_id').value;
    document.getElementById('order_menu_form').submit();
}
</script>
