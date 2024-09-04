@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reserve</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/main.scss',])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h5>จอง -โต๊ะ</h5>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('add_table')}}" method="post" id="form_add">
                        <input type="hidden" id="tb_id" name="tb_id" value="">
                        @csrf
                        @foreach ($get_table as $item)
                            @if ( $item->status == 1 )
                                <ol class="list-group" onclick="call_table({{$item->id}})">
                                    <li class="list-group-item d-flex justify-content-between align-items-start ck_status">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$item->name_table}}</div>
                                        @if ( $item->status == 0 )
                                        เวลา {{$item->check_in_time}} น. -   {{$item->check_out_time}} น. 
                                        @endif
                                    </div>
                                            @if ( $item->status == 1 )
                                                <span class="badge bg-success rounded-pill"> ว่าง </span>
                                            @else
                                                <span class="badge bg-danger rounded-pill"> ไม่ว่าง </span> 
                                            @endif
                                    </li>
                                </ol>
                            @else
                                <ol class="list-group" >
                                    <li class="list-group-item d-flex justify-content-between align-items-start ck_status">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$item->name_table}}</div>
                                        @if ( $item->status == 0 )
                                        เวลา {{$item->check_in_time}} น. -   {{$item->check_out_time}} น. 
                                        @endif
                                    </div>
                                            @if ( $item->status == 1 )
                                                <span class="badge bg-success rounded-pill"> ว่าง </span>
                                            @else
                                                <span class="badge bg-danger rounded-pill"> ไม่ว่าง </span> 
                                            @endif
                                    </li>
                                </ol>
                            @endif
                        @endforeach
                        <div class="group-form py-3">
                            <a href="{{ route('home') }}" class="btn btn-danger" >ย้อนกลับ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function call_table(id_table){
        document.getElementById('tb_id').value = id_table;
        document.getElementById('form_add').submit();
    }
</script>


@endsection