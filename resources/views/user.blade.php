<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/main.scss'])
</head>
<body>
    <div class="container py-2">
        <div class="card py-2">
            <div class="container">
                <h4>รายการอาหาร</h4>
                <form action="{{route('select_type')}}" method="post" id="select_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 py-2">
                            <div class="card" style="width: 100%;">
                                <img src="../public/upload/2.png" class="card-img-top" alt="..." width="50px" height="80px">
                                <div class="card-body">
                                    <h5 class="card-title">เนื้อหมู</h5>
                                    <p class="card-text">เนื้อหมูเกรดฟรีเมียมแท้ จากฟาร์ม</p>
                                    <button  class="btn btn-primary" onclick="getselect('1')">เลือก</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 py-2">
                            <div class="card" style="width: 100%;">
                                <img src="../public/upload/1.png" class="card-img-top" alt="..." width="50px" height="80px">
                                <div class="card-body">
                                    <h5 class="card-title">เนื้อวัว</h5>
                                    <p class="card-text">เนื้อวัวเกรดฟรีเมียมแท้ จากฟาร์ม</p>
                                    <button  class="btn btn-primary" onclick="getselect('2')">เลือก</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 py-2">
                            <div class="card" style="width: 100%;">
                                <img src="../public/upload/3.png" class="card-img-top" alt="..." width="50px"  height="80px">
                                <div class="card-body">
                                    <h5 class="card-title">อาหาร-ทะเล</h5>
                                    <p class="card-text">อาหาร-ทะเลเกรดฟรีเมียมแท้ สด ๆ</p>
                                    <button  class="btn btn-primary" onclick="getselect('3')">เลือก</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 py-2">
                            <div class="card" style="width: 100%;">
                                <img src="../public/upload/4.png" class="card-img-top" alt="..." width="50px"  height="80px">
                                <div class="card-body">
                                    <h5 class="card-title">อื่น ๆ</h5>
                                    <p class="card-text">ผัก ผลไม้ ของหวาน อาหารสำเร็จรูป ฯลฯ</p>
                                    <button  class="btn btn-primary" onclick="getselect('4')">เลือก</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="select_type" id="select_type" value="">
                        <input type="hidden" name="tb_id" id="tb_id" value="{{$tb_id}}">
                    </div>
                    <button class=" floating-btn icon">
                        <img src="../public/upload/checklist.png" class="card-img-top" width="50px"  height="50px">
                    </button>
                </form>
        </div>
    </div>
</body>
</html>
<script>
    function getselect(type){
        document.getElementById('select_type').value = type;
        document.getElementById('select_form').submit();
    }
</script>
