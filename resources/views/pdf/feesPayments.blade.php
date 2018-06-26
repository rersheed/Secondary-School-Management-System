<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shabab All Students</title>
    </head>
    <style>
        body{
            /*background-image:  url('assets/images/shabab_logo_bg.jpg');*/
            background-repeat: no-repeat;
            background-position: center 0;               
        }
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
        table {
            width: 100%;
        }

        th {
            text-align: auto;
            font-size: 12px;
        }
        td {
            vertical-align: bottom;
            font-size: 10px;
        }
        td {
            padding: 5px;
        }
        table, td, th {
            border: 1px solid black;
        }

        th {
            background-color: white;
            color: black;
        }
        body{
            padding: 10px;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        .h2{
            font-style: bold;
            font-size: 14px;
        }
        .h5{
            font-size: 10px;
        }
        
    </style>
    <body>

       <section class="panel center">
        <header class="panel-heading">
       <center>
            <p class="h2">SHABAB NURSERY, PRIMARY AND SECONDARY SCHOOL</p>
            <p class="h5">No. 6 Galadima Road, Unguwan Dosa, Kaduna</p>
            <p class="h2">{{ strtoupper($level) }} {{ $feetype }} Payments. <br /> {{ $term }}, {{ $sesion }} Session.</p>

        </header>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Number</th>
                        <th>Full Name</th>
                        <th>Amount (₦)</th>
                        <th>Date Paid</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr class="gradeX">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $regNumbers[$payment->student_id] }}</td>
                        <td>{{ $surnames[$payment->student_id] }} {{ $othernames[$payment->student_id] }}</td>
                        <td>{{ number_format($payment->amount) }}</td>
                        <td>{{ $payment->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       </section>
        
    </body>
</html>
