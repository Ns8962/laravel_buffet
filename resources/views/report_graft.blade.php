@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">

          <div style="width: 80%; height: 50%;" class="py-3">
            <canvas id="myChart"></canvas>
          </div>
    
          <div style="width: 50%; height: 50%;">
            <canvas id="myPieChart"></canvas>
          </div>
                <form action="{{route('send_api_create')}}" method="post">
                    @csrf
                    <div class="group-form py-3  ms-5">
                        <a href="{{ route('home') }}" class="btn btn-danger" >ย้อนกลับ</a>
                    </div>
                </form>
            
        </div>
    </div>
</div>
<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chartData = @json($data);
        
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('myPieChart').getContext('2d');
        var chartData = @json($data2);

        var myPieChart = new Chart(ctx, {
            type: 'pie', // คุณสามารถเปลี่ยนเป็น 'doughnut' หากต้องการ
            data: chartData,
            options: {
                responsive: true
            }
        });


    </script>
@endsection
