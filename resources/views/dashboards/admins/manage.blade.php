@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Manage Users')

@section('content')

<head>
    <style>
        table, th, td {
            border:1px solid black;
            margin-top: 20px;
        }
        .senti_tab{
            text-align: center;
        }
        .senti_tab:hover{
            background-color: #000000;
            color: white;
            transform: scaleY(1.1);
        }
        .id{
            width: 0px 20px;
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
            width: auto;
            height: auto;
            border: 3px bold #333;
            margin: 3px;
            padding: 3px;
            text-align: center;
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
        <div class="container border shadow">
            <div class="tab-content">
                <div id="ENGLISH" class="tab-pane show fade active">        
                    <table>
                        
                        <tr>
                            <th class="id">
                                User ID
                            </th>
                            <th class="">
                                Name
                            </th>
                            <th class="">
                                Email
                            </th>
                            <th>
                                Manage User
                            </th>
                        </tr>
                        <span style="display:none">{{ $i=1 }}</span>
                        @foreach ($users as $User)
                            <tr>
                                <td class="senti_tab">
                                    {{ $i++ }}
                                </td>
                                <td class="senti_tab">
                                    {{ $name = $User->name }}
                                </td>
                                <td class="senti_tab">
                                    {{ $email = $User->email }}
                                </td>
                                <td class="senti_tab">
                                    <a href="{{ route('admin.editUser', $User->id) }}" class="btn btn-danger">Edit</a>
                                    <a href="{{ route('admin.deleteUser', $User->id) }}" class="btn btn-danger">Delete</a>
                                    
                                </td>
                            </tr>
                        @endforeach     
                    </table>
                </div>
                
                
            </div>
        </div><br><br>
        <a class="btn btn-success float-right" href="{{ route('admin.AutoMailer') }}"> Hello Mail send krty hain jani</a>
    </div>           
        
   
</body>

@endsection