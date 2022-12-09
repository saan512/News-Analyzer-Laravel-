<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
        table#t01 {
            width: 100%;    
            background-color: #f1f1c1;
        }
    </style>
</head>
<br>
<b>Dear Subscriber,</b><br><br>

This is an automated email to remind you about daily news statistics. <br><br>

<b>Todays Daily Dawn News Statistics:</b><br><br>

<label style="color:dodgerblue">English News Statistics:</label><br>
<table>
    <tr>
        <th class="id">
            Total News
        </th>
        <th class="">
            Positive News
        </th>
        <th class="">
            Negative News
        </th>
        <th>
            Neutral News
        </th>
    </tr>
    <tr>
        <td class="senti_tab">
            {{ $all_dawn }}
        </td>
        <td class="senti_tab">
            {{ $all_dawn_p }}
        </td>
        <td class="senti_tab">
            {{ $all_dawn_n }}
        </td>
        <td class="senti_tab">
            {{ $all_dawn_neu }}
        </td>
    </tr>
</table>
<br>
<label style="color:dodgerblue">Urdu News Statistics:</label><br>
<table>
    <tr>
        <th class="id">
            Total News
        </th>
        <th class="">
            Positive News
        </th>
        <th class="">
            Negative News
        </th>
        
    </tr>
    <tr>
        <td class="senti_tab">
            {{ $all_dawnu }}
        </td>
        <td class="senti_tab">
            {{ $all_dawnu_p }}
        </td>
        <td class="senti_tab">
            {{ $all_dawnu_n }}
        </td>
        
    </tr>
</table>
<br><br>
<b>Thank You</b> For Subscribing our News Letter<br>
<b>Regards</b><br>
<b>News Analyzer</b><br>
