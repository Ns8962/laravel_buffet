@extends('layouts.app')
@section('content')
<div class="container">
    <div class="group-form">
        <a href="{{route('create_table')}}" class="btn btn-info"> เพิ่ม - โต๊ะ </a>
        <a href="{{route('reserve')}}" class="btn btn-success"> จองโต๊ะ </a>
        <a href="{{route('report_graft')}}" class="btn btn-danger"> report </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }} @php
                    echo  'วันที่ '. date('Y')+543 .'-'. date('m-d  H:i') 
                @endphp</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                     <div class="row">
                        <table class="table">
                            <thead>
                                <th>no.</th>
                                <th>โต๊ะ</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                            </thead>
                            <tbody>
                             <?php $i=1;?>
                                @foreach ($data as $item)
                                    <tr class="table-active">
                                        <td scope="row">{{$i}}</td>
                                        <td class="table-active">{{$item->table_id}}</td>
                                        <td class="table-active">{{$item->name_menu}}</td>
                                        <td class="table-active">{{$item->count_menu}}</td>
                                    </tr>
                                    <?php $i++;?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
