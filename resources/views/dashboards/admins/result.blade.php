@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','News and Sentiments')

@section('content')
{{-- {{ $scraped_data }}
{{ $sentiments }} --}}
    <head>
        <style>
            table, th, td {
                border:1px solid black;
            }
            .senti_tab{
                text-align: center;
            }
            .senti_tab:hover{
                background-color: #000000;
                color: white;
                transform: scaleY(1.1);
            }
            table{
                border : 1px solid black;
                border-collapse: collapse;
                width: 100%;
                color: #333;
                font-family: monospace;
                font-size: 20px;
                text-align: left;
            }
            input{
                width: max-content;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                text-align: center;
            }
            th{
                width: 45%;
                height: auto;
                border: 3px bold #333;
                margin: 3px;
                padding: 3px;
            }
            td{
                border: 3px bold #333;
                margin: 10px 5px;
                padding: 5px;
            }
            .for_tab{
                max-height: 50%;
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active ccl" data-toggle="pill" href="#ENGlish">English</a>
                  </li>      
                <li class="nav-item">
                    <a class="nav-link ccl" data-toggle="pill" href="#URDU">Urdu</a>
                  </li>      
            </ul>  
            <!-- Tab panels -->
            
            <div class="container border shadow">
                <div class="tab-content">
                    <div id="ENGLISH" class="tab-pane show fade active">        
                        <table>
                            
                            <tr>
                                <th class="senti_tab">
                                    News
                                </th>
                                <th class="senti_tab">
                                    Sentiments
                                </th>
                            </tr>
                            @foreach ($scraped_data_english as $data)
                                <tr>
                                    <td class="senti_tab">
                                        {{ $data }}
                                    </td>
                                    <td class="senti_tab">
                                        {{ $sentiments_english[$loop->index] }}
                                    </td>
                                </tr>
                            @endforeach     
                        </table>
                    </div>

                    <div class=" tab-pane show fade" id="URDU">
                        <table>
                            
                            <tr>
                                <th class="senti_tab">
                                    News
                                </th>
                                <th class="senti_tab">
                                    Sentiments
                                </th>
                            </tr>
                            @foreach ($scraped_data_urdus as $data)
                                <tr>
                                    <td class="senti_tab">
                                        {{ $data }}
                                    </td>
                                    <td class="senti_tab">
                                        {{ $sentiments_urdus[$loop->index] }}
                                    </td>
                                </tr>
                            @endforeach     
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>           
            
       
    </body>

@endsection