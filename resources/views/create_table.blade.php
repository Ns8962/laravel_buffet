@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card" >
                <form action="{{route('send_api_create')}}" method="post">
                    @csrf
                    <div class="group-form rq_code ">
                        <div class=" col-md-6">
                            <span>หมายเลขโต๊ะ</span>
                              <input type="text" class="form-control" name="name_table" id="name_table" value="โต๊ะ ">
                              <input type="hidden" name="status" id="status" value="1">
                        </div>
                    </div>
                    <div class="group-form py-3  ms-5">
                        <button type="submit" class="btn btn-info" >เพิ่ม</button>
                        <a href="{{ route('home') }}" class="btn btn-danger" >ย้อนกลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
