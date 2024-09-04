<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
         @font-face {
            font-family: 'THSarabun';
            src: url('{{ public_path('fonts/THSarabun.ttf') }}') format('truetype');
        }
        body {
            font-family: 'THSarabun', sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card" >
                        <div class="group-form rq_code ms-5">
                            <h3><b>Buffet.01xx </b></h3>
                            <label > โต๊ะที่ :  {{ $tb_id }}</label><br>
                            <label > เวลาเริ่ม :  {{ $chk_time }} - {{ $chk_out_time }}</label>
                            <div class="group-form py-2 ">
                                {{ $qrCode }}
                               
                            </div>
                            <img src="../public/upload/1.png"  width="50px" height="80px">
                            HHHHH
                            <label class="py-2">แสกน QR เพื่อสั่งอาหาร</label>
                        </div>
                </div>
        </div>
     </div>
</body>
</html>