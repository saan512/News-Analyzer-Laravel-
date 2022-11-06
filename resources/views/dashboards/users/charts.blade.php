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
        var dawn_latest_positive = <?php echo $dawn_latest_positive; ?>;
        var dawn_latest_negative = <?php echo $dawn_latest_negative; ?>;
        var dawn_latest_neutral = <?php echo $dawn_latest_neutral; ?>;
        var dawn_latest_all = <?php echo $dawn_latest_all; ?>;
    </script>

    <script>
        var dawn_business_positive = <?php echo $dawn_business_positive; ?>;
        var dawn_business_negative = <?php echo $dawn_business_negative; ?>;
        var dawn_business_neutral = <?php echo $dawn_business_neutral; ?>;
        var dawn_business_all = <?php echo $dawn_business_all; ?>;
    </script>

    <script>
        var dawn_world_positive = <?php echo $dawn_world_positive; ?>;
        var dawn_world_negative = <?php echo $dawn_world_negative; ?>;
        var dawn_world_neutral = <?php echo $dawn_world_neutral; ?>;
        var dawn_world_all = <?php echo $dawn_world_all; ?>;
    </script>

    <script>
        var ary_world_positive = <?php echo $ary_world_positive; ?>;
        var ary_world_negative = <?php echo $ary_world_negative; ?>;
        var ary_world_neutral = <?php echo $ary_world_neutral; ?>;
        var ary_world_all = <?php echo $ary_world_all; ?>;
    </script>

    <script>
        var ary_business_positive = <?php echo $ary_business_positive; ?>;
        var ary_business_negative = <?php echo $ary_business_negative; ?>;
        var ary_business_neutral = <?php echo $ary_business_neutral; ?>;
        var ary_business_all = <?php echo $ary_business_all; ?>;
    </script>
    
    <script>
        var ary_latest_positive = <?php echo $ary_latest_positive; ?>;
        var ary_latest_negative = <?php echo $ary_latest_negative; ?>;
        var ary_latest_neutral = <?php echo $ary_latest_neutral; ?>;
        var ary_latest_all = <?php echo $ary_latest_all; ?>;
    </script>
    
    <script>
        var tribune_latest_positive = <?php echo $tribune_latest_positive; ?>;
        var tribune_latest_negative = <?php echo $tribune_latest_negative; ?>;
        var tribune_latest_neutral = <?php echo $tribune_latest_neutral; ?>;
        var tribune_latest_all = <?php echo $tribune_latest_all; ?>;
    </script>
    
    <script>
        var tribune_world_positive = <?php echo $tribune_world_positive; ?>;
        var tribune_world_negative = <?php echo $tribune_world_negative; ?>;
        var tribune_world_neutral = <?php echo $tribune_world_neutral; ?>;
        var tribune_world_all = <?php echo $tribune_world_all; ?>;
    </script>
    
    <script>
        var tribune_business_positive = <?php echo $tribune_business_positive; ?>;
        var tribune_business_negative = <?php echo $tribune_business_negative; ?>;
        var tribune_business_neutral = <?php echo $tribune_business_neutral; ?>;
        var tribune_business_all = <?php echo $tribune_business_all; ?>;
    </script>

    <script>
        var aryu_world_positive = <?php echo $aryu_world_positive; ?>;
        var aryu_world_negative = <?php echo $aryu_world_negative; ?>;
        var aryu_world_neutral = <?php echo $aryu_world_neutral; ?>;
        var aryu_world_all = <?php echo $aryu_world_all; ?>;
    </script>
    
    <script>
        var aryu_latest_positive = <?php echo $aryu_latest_positive; ?>;
        var aryu_latest_negative = <?php echo $aryu_latest_negative; ?>;
        var aryu_latest_neutral = <?php echo $aryu_latest_neutral; ?>;
        var aryu_latest_all = <?php echo $aryu_latest_all; ?>;
    </script>
    
    <script>
        var aryu_business_positive = <?php echo $aryu_business_positive; ?>;
        var aryu_business_negative = <?php echo $aryu_business_negative; ?>;
        var aryu_business_neutral = <?php echo $aryu_business_neutral; ?>;
        var aryu_business_all = <?php echo $aryu_business_all; ?>;
    </script>
    
    <script>
        var dawnu_business_positive = <?php echo $dawnu_business_positive; ?>;
        var dawnu_business_negative = <?php echo $dawnu_business_negative; ?>;
        var dawnu_business_neutral = <?php echo $dawnu_business_neutral; ?>;
        var dawnu_business_all = <?php echo $dawnu_business_all; ?>;
    </script>
    
    <script>
        var dawnu_latest_positive = <?php echo $dawnu_latest_positive; ?>;
        var dawnu_latest_negative = <?php echo $dawnu_latest_negative; ?>;
        var dawnu_latest_neutral = <?php echo $dawnu_latest_neutral; ?>;
        var dawnu_latest_all = <?php echo $dawnu_latest_all; ?>;
    </script>
    
    <script>
        var dawnu_world_positive = <?php echo $dawnu_world_positive; ?>;
        var dawnu_world_negative = <?php echo $dawnu_world_negative; ?>;
        var dawnu_world_neutral = <?php echo $dawnu_world_neutral; ?>;
        var dawnu_world_all = <?php echo $dawnu_world_all; ?>;
    </script>
    
    <script>
        var tribuneU_latest_positive = <?php echo $tribuneU_latest_positive; ?>;
        var tribuneU_latest_negative = <?php echo $tribuneU_latest_negative; ?>;
        var tribuneU_latest_neutral = <?php echo $tribuneU_latest_neutral; ?>;
        var tribuneU_latest_all = <?php echo $tribuneU_latest_all; ?>;
    </script>
    
    <script>
        var tribuneUrdu_business_positive = <?php echo $tribuneUrdu_business_positive; ?>;
        var tribuneUrdu_business_negative = <?php echo $tribuneUrdu_business_negative; ?>;
        var tribuneUrdu_business_neutral = <?php echo $tribuneUrdu_business_neutral; ?>;
        var tribuneUrdu_business_all = <?php echo $tribuneUrdu_business_all; ?>;
    </script>
    
    <script>
        var tribuneUrdu_world_positive = <?php echo $tribuneUrdu_world_positive; ?>;
        var tribuneUrdu_world_negative = <?php echo $tribuneUrdu_world_negative; ?>;
        var tribuneUrdu_world_neutral = <?php echo $tribuneUrdu_world_neutral; ?>;
        var tribuneUrdu_world_all = <?php echo $tribuneUrdu_world_all; ?>;
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