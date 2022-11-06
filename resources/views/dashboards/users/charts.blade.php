@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Dashboard')

@section('content')




<head>
    {{-- <link rel="stylesheet" href="chart.css" type="text/css"> --}}
    <style>
        /* for charts */
        .graphBox{
            align-items: baseline;
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: 0.5fr 0.5fr;
            grid-gap: 30px;
        }

        .graphBox .box{
            background: #fff;
            padding: 20px;
            width: max-content;
            border-radius: 20px;
            box-shadow: 0 7px 25px rgba(0,0,0,0.1);
            position: relative;
            min-height: 10px;
        }

        @media (max-width: 991px) {
            .graphBox{
                grid-template-columns: 1fr;
                height: auto;
            }

        }
    </style>
</head>
<body>
    

<div class="container">
        
    <div class="graphBox">

        <div class="m_container">
            <h2>Ary News</h2>
            <div class="box">
                <canvas id="ary_eng"></canvas>
                <h2>English Analysis Sentiments</h2>
            </div>
            <div>
                <h2> </h2>
            </div>
            <div class="box">
                <canvas id="ary_urdu"></canvas>
                <h2>Udru Analysis Sentiments</h2>
            </div>
        </div>

        <div class="m_container">
            <h2>Dawn</h2>
            <div class="box">
                <canvas id="dawn_eng"></canvas>
                <h2>Eng Analysis Sentiments</h2>
            </div>
            <div>
                <h2> </h2>
            </div>
            <div class="box">
                <canvas id="dawn_urdu"></canvas>
                <h2>Urdu Analysis Sentiments</h2>
            </div>
        </div>
        
    </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js" integrity="sha512-d6nObkPJgV791iTGuBoVC9Aa2iecqzJRE0Jiqvk85BhLHAPhWqkuBiQb1xz2jvuHNqHLYoN3ymPfpiB1o+Zgpw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    

    <script>
        var p_urdu = <?php echo $positive_urdu; ?>;
        var n_urdu = <?php echo $negative_urdu; ?>;
        var al_urdu = <?php echo $all_urdu; ?>;
    </script>

    <script>
        var d_pos = <?php echo $dawn_positive; ?>;
        var d_neg = <?php echo $dawn_negative; ?>;
        var d_neu = <?php echo $dawn_neutral; ?>;
        var d_all = <?php echo $dawn_all; ?>;
    </script>

    <script>
        var a_pos = <?php echo $ary_positive; ?>;
        var a_neg = <?php echo $ary_negative; ?>;
        var a_neu = <?php echo $ary_neutral; ?>;
        var a_all = <?php echo $ary_all; ?>;
    </script>

    


    <script>
        const ctx = document.getElementById('ary_eng').getContext('2d');
        const ary_eng = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: a_all,
                    data: [a_pos, a_neu, a_neg],
                    backgroundColor: [                        
                        'rgba(30, 200, 30, 1)',
                        'rgba(30, 30, 255, 1)',
                        'rgba(255, 0, 0, 1)'            
                    ],
                    hoverOffset: 10,                    
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
        const ctx_urdu = document.getElementById('ary_urdu').getContext('2d');
        const ary_urdu = new Chart(ctx_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive', 'Negative'],
                datasets: [{
                    label: al_urdu,
                    data: [p_urdu, n_urdu],
                    backgroundColor: [                        
                        'rgba(30, 200, 30, 1)',
                        'rgba(30, 30, 255, 1)',
                        'rgba(255, 0, 0, 1)'            
                    ],
                    hoverOffset: 10,                    
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
        const ctx_dawn_eng = document.getElementById('dawn_eng').getContext('2d');
        const dawn_eng = new Chart(ctx_dawn_eng, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: d_all,
                    data: [d_pos, d_neu, d_neg],
                    backgroundColor: [                        
                        'rgba(30, 200, 30, 1)',
                        'rgba(30, 30, 255, 1)',
                        'rgba(255, 0, 0, 1)'            
                    ],
                    hoverOffset: 10,                    
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
        const ctx_dawn_urdu = document.getElementById('dawn_urdu').getContext('2d');
        const dawn_urdu = new Chart(ctx_dawn_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: al_urdu,
                    data: [p_urdu, n_urdu],
                    backgroundColor: [
                        
                        'rgba(30, 200, 30, 1)',
                        'rgba(30, 30, 255, 1)',
                        'rgba(255, 0, 0, 1)'
                        
                        
                    ],
                    hoverOffset: 10,
                    
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