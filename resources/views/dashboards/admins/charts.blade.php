@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Dashboard')

@section('content')




<head>
    {{-- <link rel="stylesheet" href="chart.css" type="text/css"> --}}
    <style>
        
        body {
            background-image: url('{{url('img/login.jpg')}}');
            }
        
        /* for charts */
        .graphBox{
            align-items: baseline;
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: 0.5fr 0.5fr;
            /* grid-template-rows: 0.5fr 0.5fr; */
            grid-gap: 20px;
        }

        .graphBox .box{
            background: #fff;
            padding: 20px;
            width: max-content;
            border-radius: 20px;
            box-shadow: 0 7px 25px rgba(0,0,0,0.1);
            position: relative;
            min-height: 400px;
            min-width: 400px;
        }

        .alin{
            display: flex;
            justify-content: space-between;
            margin: 20px 50px;
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
            }
            .alin{
                display: block;
            }

        }
    </style>
</head>
<body>
    

<div class="container">
    <ul class="nav nav-pills nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active ccl" data-toggle="pill" href="#ARY">ARY</a>
          </li>      
        <li class="nav-item">
            <a class="nav-link ccl" data-toggle="pill" href="#DAWN">DAWN</a>
          </li>      
        <li class="nav-item">
            <a class="nav-link ccl" data-toggle="pill" href="#TRIBUNE">Tribune</a>
          </li>
    </ul>  
    <!-- Tab panels -->
    
    <div class="graphBox container border shadow">
        <div class="tab-content">
            <div id="ARY" class="tab-pane show fade active">
                <div class="container alin">
                    {{-- <h2>Ary News</h2> --}}
                    <div class="box">
                        <canvas id="a_l_e"></canvas>
                        <h2>Latest English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="a_l_u"></canvas>
                        <h2>Latest Udru</h2>
                    </div>
                    
                </div>

                <div class="container alin">
                    <div class="box">
                        <canvas id="a_w_e"></canvas>
                        <h2>World English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="a_w_u"></canvas>
                        <h2>World Udru</h2>
                    </div>
                    
                </div>

                <div class="container alin">
                    <div class="box">
                        <canvas id="a_b_e"></canvas>
                        <h2>Business English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="a_b_u"></canvas>
                        <h2>Business Udru</h2>
                    </div>
                </div>
            </div>

            

            <div class=" tab-pane show fade" id="DAWN">
                <div class="container alin">
                    {{-- <h2>Dawn</h2> --}}
                    <div class="box">
                        <canvas id="d_l_e"></canvas>
                        <h2>Latest English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="d_l_u"></canvas>
                        <h2>Latest Urdu</h2>
                    </div>
                </div>

                <div class="container alin">
                    <div class="box">
                        <canvas id="d_w_e"></canvas>
                        <h2>World English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="d_w_u"></canvas>
                        <h2>World Urdu</h2>
                    </div>
                </div>

                <div class="container alin">
                    <div class="box">
                        <canvas id="d_b_e"></canvas>
                        <h2>Business English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="d_b_u"></canvas>
                        <h2>Business Urdu</h2>
                    </div>
                </div>
            </div>


            <div class=" tab-pane fade" id="TRIBUNE">
                <div class="container alin">
                    {{-- <h2>TRIBUNE</h2> --}}
                    <div class="box">
                        <canvas id="t_l_e"></canvas>
                        <h2>Latest English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="t_l_u"></canvas>
                        <h2>Latest Urdu</h2>
                    </div>
                </div>

                <div class="container alin">
                    <div class="box">
                        <canvas id="t_w_e"></canvas>
                        <h2>World English</h2>
                    </div>
                   
                    <div class="box">
                        <canvas id="t_w_u"></canvas>
                        <h2>World Urdu</h2>
                    </div>
                </div>

                <div class="container alin">
                    <div class="box">
                        <canvas id="t_b_e"></canvas>
                        <h2>Business English</h2>
                    </div>
                    
                    <div class="box">
                        <canvas id="t_b_u"></canvas>
                        <h2>Business Urdu</h2>
                    </div>
                </div>
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
        const dawn_chart_latest = document.getElementById('d_l_e').getContext('2d');
        const dawn_chart_latest_var = new Chart(dawn_chart_latest, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: dawn_latest_all,
                    data: [dawn_latest_positive, dawn_latest_neutral, dawn_latest_negative],
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
        var dawn_business_positive = <?php echo $dawn_business_positive; ?>;
        var dawn_business_negative = <?php echo $dawn_business_negative; ?>;
        var dawn_business_neutral = <?php echo $dawn_business_neutral; ?>;
        var dawn_business_all = <?php echo $dawn_business_all; ?>;
    </script>

    <script>
        const dawn_business_english = document.getElementById('d_b_e').getContext('2d');
        const dawn_business_english_var = new Chart(dawn_business_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: dawn_business_all,
                    data: [dawn_business_positive, dawn_business_neutral, dawn_business_negative],
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
        var dawn_world_positive = <?php echo $dawn_world_positive; ?>;
        var dawn_world_negative = <?php echo $dawn_world_negative; ?>;
        var dawn_world_neutral = <?php echo $dawn_world_neutral; ?>;
        var dawn_world_all = <?php echo $dawn_world_all; ?>;
    </script>

    <script>
        const dawn_world_english = document.getElementById('d_w_e').getContext('2d');
        const dawn_world_english_var = new Chart(dawn_world_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: dawn_world_all,
                    data: [dawn_world_positive, dawn_world_neutral, dawn_world_negative],
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
        var ary_world_positive = <?php echo $ary_world_positive; ?>;
        var ary_world_negative = <?php echo $ary_world_negative; ?>;
        var ary_world_neutral = <?php echo $ary_world_neutral; ?>;
        var ary_world_all = <?php echo $ary_world_all; ?>;
    </script>

    <script>
        const ary_world_english = document.getElementById('a_w_e').getContext('2d');
        const ary_world_english_var = new Chart(ary_world_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: ary_world_all,
                    data: [ary_world_positive, ary_world_neutral, ary_world_negative],
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
        var ary_business_positive = <?php echo $ary_business_positive; ?>;
        var ary_business_negative = <?php echo $ary_business_negative; ?>;
        var ary_business_neutral = <?php echo $ary_business_neutral; ?>;
        var ary_business_all = <?php echo $ary_business_all; ?>;
    </script>

    <script>
        const ary_business_english = document.getElementById('a_b_e').getContext('2d');
        const ary_business_english_var = new Chart(ary_business_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: ary_business_all,
                    data: [ary_business_positive, ary_business_neutral, ary_business_negative],
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
        var ary_latest_positive = <?php echo $ary_latest_positive; ?>;
        var ary_latest_negative = <?php echo $ary_latest_negative; ?>;
        var ary_latest_neutral = <?php echo $ary_latest_neutral; ?>;
        var ary_latest_all = <?php echo $ary_latest_all; ?>;
    </script>

    <script>
        const ary_latest_english = document.getElementById('a_l_e').getContext('2d');
        const ary_latest_english_var = new Chart(ary_latest_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: ary_latest_all,
                    data: [ary_latest_positive, ary_latest_neutral, ary_latest_negative],
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
        var tribune_latest_positive = <?php echo $tribune_latest_positive; ?>;
        var tribune_latest_negative = <?php echo $tribune_latest_negative; ?>;
        var tribune_latest_neutral = <?php echo $tribune_latest_neutral; ?>;
        var tribune_latest_all = <?php echo $tribune_latest_all; ?>;
    </script>

    <script>
        const tribune_latest_english = document.getElementById('t_l_e').getContext('2d');
        const tribune_latest_english_var = new Chart(tribune_latest_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: tribune_latest_all,
                    data: [tribune_latest_positive, tribune_latest_neutral, tribune_latest_negative],
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
        var tribune_world_positive = <?php echo $tribune_world_positive; ?>;
        var tribune_world_negative = <?php echo $tribune_world_negative; ?>;
        var tribune_world_neutral = <?php echo $tribune_world_neutral; ?>;
        var tribune_world_all = <?php echo $tribune_world_all; ?>;
    </script>

    <script>
        const tribune_world_english = document.getElementById('t_w_e').getContext('2d');
        const tribune_world_english_var = new Chart(tribune_world_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: tribune_world_all,
                    data: [tribune_world_positive, tribune_world_neutral, tribune_world_negative],
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
        var tribune_business_positive = <?php echo $tribune_business_positive; ?>;
        var tribune_business_negative = <?php echo $tribune_business_negative; ?>;
        var tribune_business_neutral = <?php echo $tribune_business_neutral; ?>;
        var tribune_business_all = <?php echo $tribune_business_all; ?>;
    </script>

    <script>
        const tribune_business_english = document.getElementById('t_b_e').getContext('2d');
        const tribune_business_english_var = new Chart(tribune_business_english, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: tribune_business_all,
                    data: [tribune_business_positive, tribune_business_neutral, tribune_business_negative],
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
        var aryu_world_positive = <?php echo $aryu_world_positive; ?>;
        var aryu_world_negative = <?php echo $aryu_world_negative; ?>;
        var aryu_world_neutral = <?php echo $aryu_world_neutral; ?>;
        var aryu_world_all = <?php echo $aryu_world_all; ?>;
    </script>

    <script>
        const ary_world_urdu = document.getElementById('a_w_u').getContext('2d');
        const ary_world_urdu_var = new Chart(ary_world_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: aryu_world_all,
                    data: [aryu_world_positive, aryu_world_neutral, aryu_world_negative],
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
        var aryu_latest_positive = <?php echo $aryu_latest_positive; ?>;
        var aryu_latest_negative = <?php echo $aryu_latest_negative; ?>;
        var aryu_latest_neutral = <?php echo $aryu_latest_neutral; ?>;
        var aryu_latest_all = <?php echo $aryu_latest_all; ?>;
    </script>

    <script>
        const ary_latest_urdu = document.getElementById('a_l_u').getContext('2d');
        const ary_latest_urdu_var = new Chart(ary_latest_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: aryu_latest_all,
                    data: [aryu_latest_positive, aryu_latest_neutral, aryu_latest_negative],
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
        var aryu_business_positive = <?php echo $aryu_business_positive; ?>;
        var aryu_business_negative = <?php echo $aryu_business_negative; ?>;
        var aryu_business_neutral = <?php echo $aryu_business_neutral; ?>;
        var aryu_business_all = <?php echo $aryu_business_all; ?>;
    </script>

    <script>
        const ary_business_urdu = document.getElementById('a_b_u').getContext('2d');
        const ary_business_urdu_var = new Chart(ary_business_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: aryu_business_all,
                    data: [aryu_business_positive, aryu_business_neutral, aryu_business_negative],
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
        var dawnu_business_positive = <?php echo $dawnu_business_positive; ?>;
        var dawnu_business_negative = <?php echo $dawnu_business_negative; ?>;
        var dawnu_business_neutral = <?php echo $dawnu_business_neutral; ?>;
        var dawnu_business_all = <?php echo $dawnu_business_all; ?>;
    </script>

    <script>
        const dawn_business_urdu = document.getElementById('d_b_u').getContext('2d');
        const dawn_business_urdu_var = new Chart(dawn_business_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: dawnu_business_all,
                    data: [dawnu_business_positive, dawnu_business_neutral, dawnu_business_negative],
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
        var dawnu_latest_positive = <?php echo $dawnu_latest_positive; ?>;
        var dawnu_latest_negative = <?php echo $dawnu_latest_negative; ?>;
        var dawnu_latest_neutral = <?php echo $dawnu_latest_neutral; ?>;
        var dawnu_latest_all = <?php echo $dawnu_latest_all; ?>;
    </script>

    <script>
        const dawn_latest_urdu = document.getElementById('d_l_u').getContext('2d');
        const dawn_latest_urdu_var = new Chart(dawn_latest_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: dawnu_latest_all,
                    data: [dawnu_latest_positive, dawnu_latest_neutral, dawnu_latest_negative],
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
        var dawnu_world_positive = <?php echo $dawnu_world_positive; ?>;
        var dawnu_world_negative = <?php echo $dawnu_world_negative; ?>;
        var dawnu_world_neutral = <?php echo $dawnu_world_neutral; ?>;
        var dawnu_world_all = <?php echo $dawnu_world_all; ?>;
    </script>

    <script>
        const dawn_world_urdu = document.getElementById('d_w_u').getContext('2d');
        const dawn_world_urdu_var = new Chart(dawn_world_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: dawnu_world_all,
                    data: [dawnu_world_positive, dawnu_world_neutral, dawnu_world_negative],
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
        var tribuneU_latest_positive = <?php echo $tribuneU_latest_positive; ?>;
        var tribuneU_latest_negative = <?php echo $tribuneU_latest_negative; ?>;
        var tribuneU_latest_neutral = <?php echo $tribuneU_latest_neutral; ?>;
        var tribuneU_latest_all = <?php echo $tribuneU_latest_all; ?>;
    </script>

    <script>
        const tribune_latest_urdu = document.getElementById('t_l_u').getContext('2d');
        const tribune_latest_urdu_var = new Chart(tribune_latest_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: tribuneU_latest_all,
                    data: [tribuneU_latest_positive, tribuneU_latest_neutral, tribuneU_latest_negative],
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
        var tribuneUrdu_business_positive = <?php echo $tribuneUrdu_business_positive; ?>;
        var tribuneUrdu_business_negative = <?php echo $tribuneUrdu_business_negative; ?>;
        var tribuneUrdu_business_neutral = <?php echo $tribuneUrdu_business_neutral; ?>;
        var tribuneUrdu_business_all = <?php echo $tribuneUrdu_business_all; ?>;
    </script>

    <script>
        const tribune_business_urdu = document.getElementById('t_b_u').getContext('2d');
        const tribune_business_urdu_var = new Chart(tribune_business_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: tribuneUrdu_business_all,
                    data: [tribuneUrdu_business_positive, tribuneUrdu_business_neutral, tribuneUrdu_business_negative],
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
        var tribuneUrdu_world_positive = <?php echo $tribuneUrdu_world_positive; ?>;
        var tribuneUrdu_world_negative = <?php echo $tribuneUrdu_world_negative; ?>;
        var tribuneUrdu_world_neutral = <?php echo $tribuneUrdu_world_neutral; ?>;
        var tribuneUrdu_world_all = <?php echo $tribuneUrdu_world_all; ?>;
    </script>

    <script>
        const tribune_world_urdu = document.getElementById('t_w_u').getContext('2d');
        const tribune_world_urdu_var = new Chart(tribune_world_urdu, {
            type: 'pie',
            data: {
                labels: ['Positive','Nuetral', 'Negative'],
                datasets: [{
                    label: tribuneUrdu_world_all,
                    data: [tribuneUrdu_world_positive, tribuneUrdu_world_neutral, tribuneUrdu_world_negative],
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