<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/main.scss'])
</head>
<body>
    <div class="container py-2">
        <div class="card py-2">
            <div class="container">
                <h4>รายการอาหารที่สั่ง</h4>
              
                {{-- <a href="{{ url('user?tb_id=' . request()->get('tb_id')) }}" class="btn">
                    <img src="../public/upload/arrow.png" class="card-img-top" width="40px"  height="40px" title="กลับหน้าหลัก">
                </a> --}}
                    <div class="row">
                        <table class="table">
                            <thead>
                                <th>no.</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                            </thead>
                            <tbody>
                             <?php $i=1;?>
                                @foreach ($getdata as $item)
                                    <tr class="table-active">
                                        <td scope="row">{{$i}}</td>
                                        <td class="table-active">{{$item->name_menu}}</td>
                                        <td class="table-active">{{$item->count_menu}}</td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                        <a href="{{ url('user?tb_id=' . request()->get('tb_id')) }}" class=" floating-btn icon">
                            <img src="../public/upload/checklist.png" class="card-img-top" width="50px"  height="50px" title="คำสั่งซื้อ">
                        </a>
                    </div> --}}
        </div>
    </div>
</body>
</html>
<script>
function getselect(id){
    document.getElementById('list_menu_form').submit();
}
</script>
