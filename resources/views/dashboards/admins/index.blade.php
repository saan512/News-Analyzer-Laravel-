@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')
<head>
    <style>       
        /* for charts */
        .graphBox{
            align-items: baseline;
            position: relative;
            width: 100%;
            padding: 10px;
            display: grid;
            grid-template-columns: 0.5fr 0.5fr 0.5fr;
            /* grid-template-rows: 0.5fr 0.5fr; */
            grid-gap: 15px;
        }

        .graphBox .box{
            background: #fff;
            padding: 10px;
            width: min-content;
            border-radius: 20px;
            box-shadow: 0 7px 25px rgba(0,0,0,0.1);
            position: relative;
            min-height: 220px;
            min-width: 300px;
        }

        .alin{
            display: flex;
            justify-content: space-between;
            margin: 20px 35px;
        }

        .ccl:hover{
            background-color: #333;
            color: #fff;
            transition: 0.6s;
        }

        .fade{
            transition: 0.6s;
        }
        

        @media (max-width: 991px) {
            .graphBox{
                grid-template-columns: 1fr 1fr;
                height: auto;
                padding: 10px 100px; 
            }
            .alin{
                display: block;
                margin: 20px 0px;
            }
            .box{
                margin: 10px 0px;
            }

        }
    </style>
</head>
<body>
    <div class="graphBox container border shadow">
        <div class="tab-content">
            <div id="Content" class="tab-pane show fade active">
                <div class="container alin">

                    <div class="box">
                        <canvas id="news_count"></canvas>
                        <h2>Total News</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="user_conut"></canvas>
                        <h2>User Count</h2>
                    </div>

                    <div class="box">
                        <canvas id="sen_count"></canvas>
                        <h2>Sentiment Count</h2>
                    </div>
                    
                </div>
            {{-- </div>
            
           
                </div> --}}
            </div> 
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js" integrity="sha512-d6nObkPJgV791iTGuBoVC9Aa2iecqzJRE0Jiqvk85BhLHAPhWqkuBiQb1xz2jvuHNqHLYoN3ymPfpiB1o+Zgpw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    

    

    

    <script>
        // for News Count
        var ctx = document.getElementById('news_count').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [ 'Eng News', 'Urdu News'],
                datasets: [{
                    label: 'News Count',
                    data: [{{ $eng_news_count }}, {{ $urdu_news_count }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        // for User Count
        var ctx = document.getElementById('user_conut').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [  'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
                datasets: [{
                    label: 'User Count',
                    data: [ 0,0,0,0,0,0,0,0,0,0,1,{{ $users }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(110, 200, 132, 1)'
                        
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        // for User Count
        var ctx = document.getElementById('sen_count').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [ 'Positive', 'Negative', 'Neutral'],
                datasets: [{
                    label: 'Sentiment Count',
                    data: [ {{ $total_pos_sentiment }}, {{ $total_neg_sentiment }}, {{ $total_neu_sentiment }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(99, 255, 132, 0.2)',
                        'rgba(99, 132, 255, 0.2)'                        
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(99, 255, 132, 1)',
                        'rgba(99, 132, 255, 1)'                        
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

@endsection