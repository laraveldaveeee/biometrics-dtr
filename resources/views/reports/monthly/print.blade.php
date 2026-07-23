<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Monthly DTR</title>
    <style>
      @page {
        margin: 20px;
        size: A4 landscape;
      }

      body {
        font-family: DejaVu Sans, sans-serif;
        color: #222;
        font-size: 12px;
      }

      .header {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        border-bottom: 2px solid #000;
        padding-bottom: 15px;
        margin-bottom: 20px;
      }

      .logo {
        float: left;
        width: 90px;
      }

      .logo img {
        width: 80px;
      }

      .title {
        text-align: center;
      }

      .title h4 {
        margin: 0;
        font-size: 15px;
        font-weight: normal;
      }

      .title h2 {
        margin: 5px 0;
        font-size: 24px;
      }

      .title h3 {
        margin: 5px 0;
        font-size: 17px;
      }

      .clear {
        clear: both;
      }

      .employee-box {
        margin-top: 20px;
        border: 1px solid #000;
        padding: 15px;
      }

      .employee-table {
        width: 100%;
      }

      .employee-table td {
        padding: 6px;
        font-size: 13px;
      }

      .label {
        width: 140px;
        font-weight: bold;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      th {
        background: #1b4d91;
        color: white;
        padding: 10px;
        border: 1px solid #000;
        font-size: 12px;
      }

      td {
        padding: 8px;
        border: 1px solid #000;
      }

      .text-center {
        text-align: center;
      }

      .footer {
        margin-top: 40px;
      }

      .signature {
        width: 33%;
        float: left;
        text-align: center;
      }

      .signature hr {
        width: 80%;
        margin-top: 60px;
        border: 1px solid #000;
      }

      .generated {
        margin-top: 120px;
        text-align: right;
        font-size: 11px;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <div class="logo">
        <img src="{{ asset('img/ntc.png') }}">
      </div>
      <div class="title">
        <h4>Republic of the Philippines</h4>
        <h2>NATIONAL TELECOMMUNICATIONS COMMISSION</h2>
        <h3>MONTHLY DAILY TIME RECORD</h3>
      </div>
      <div class="clear"></div>
    </div>
    <div class="employee-box">
      <table class="employee-table">
        <tr>
          <td class="label"> Employee No. </td>
          <td>
            {{ optional($employee)->employee_no }}
          </td>
          <td class="label"> Department </td>
          <td>
            {{ optional(optional($employee)->department)->department_name }}
          </td>
        </tr>
        <tr>
          <td class="label"> Employee </td>
          <td>
            {{ optional($employee)->name }}
          </td>
          <td class="label"> Position </td>
          <td>
            {{ optional(optional($employee)->position)->position_name }}
          </td>
        </tr>
        <tr>
          <td class="label"> Month </td>
          <td>
            {{ request('month') }}
          </td>
          <td class="label"> Printed </td>
          <td>
            {{ now()->timezone('Asia/Manila')->format('F d, Y h:i A') }}
          </td>
        </tr>
      </table>
    </div>
    <br>
    <table>
      <thead>
        <tr>
          <th width="8%">#</th>
          <th width="15%">Date</th>
          <th width="18%">Day</th>
          <th width="18%">Time In</th>
          <th width="18%">Time Out</th>
          <th width="23%">Remarks</th>
        </tr>
      </thead>
      <tbody> @foreach($records as $key=>$record) <tr>
          <td class="text-center">
            {{ $key+1 }}
          </td>
          <td>
            {{ \Carbon\Carbon::parse($record->attendance_date)->format('M d, Y') }}
          </td>
          <td>
            {{ \Carbon\Carbon::parse($record->attendance_date)->format('l') }}
          </td>
          <td> @if($record->time_in) {{ \Carbon\Carbon::parse($record->time_in)->format('h:i A') }} @endif </td>
          <td> @if($record->time_out) {{ \Carbon\Carbon::parse($record->time_out)->format('h:i A') }} @endif </td>
          <td>
            {{ $record->time_out ? 'Completed' : 'Time In Only' }}
          </td>
        </tr> @endforeach <br>
        <br>
        <br>
        <table style="width:100%; border:none;">
          <tr>
            <td style="width:33%; border:none; text-align:center;"> Prepared By </td>
            <td style="width:33%; border:none; text-align:center;"> Checked By </td>
            <td style="width:33%; border:none; text-align:center;"> Approved By </td>
          </tr>
          <tr>
            <td style="border:none; height:70px;"></td>
            <td style="border:none;"></td>
            <td style="border:none;"></td>
          </tr>
          <tr>
            <td style="border:none; text-align:center;"> ___________________________ </td>
            <td style="border:none; text-align:center;"> ___________________________ </td>
            <td style="border:none; text-align:center;"> ___________________________ </td>
          </tr>
          <tr>
            <td style="border:none; text-align:center; font-weight:bold;"> HR Officer </td>
            <td style="border:none; text-align:center; font-weight:bold;"> HR Supervisor </td>
            <td style="border:none; text-align:center; font-weight:bold;"> Regional Director </td>
          </tr>
        </table>
        <br>
        <br>
        <hr>
        <table style="width:100%; border:none; font-size:11px;">
          <tr>
            <td style="border:none;"> Generated by: <strong>NTC DTR System</strong>
            </td>
            <td style="border:none; text-align:center;"> Printed: {{ now()->timezone('Asia/Manila')->format('F d, Y h:i A') }}
            </td>
            <td style="border:none; text-align:right;"> Page 1 of 1 </td>
          </tr>
        </table>