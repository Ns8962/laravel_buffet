@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card" >
                <form action="" method="post">
                    @csrf
                    <div class="group-form rq_code ms-5">
                        <h3><b>Buffet.01 </b></h3>
                        <label > โต๊ะที่ :  {{ $tb_id }}</label><br>
                        <label > เวลาเริ่ม :  {{ $chk_time }} - {{ $chk_out_time }}</label>
                        <div class="group-form py-2 ">
                            {{ $qrCode }}
                        </div>
                        <label class="py-2">แสกน QR เพื่อสั่งอาหาร</label>
                    </div>
                    <div class="group-form py-3  ms-5">
                        {{-- <button class="btn btn-info">พิมพ์</button> --}}
                        <a href="{{ route('report_qrcode', ['tb_id' => $tb_id]) }}" class="btn btn-info">พิมพ์</a>
                        <a href="{{ route('reserve') }}" class="btn btn-danger" >ย้อนกลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
