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
            {{-- background-image:  url("{{ asset('assets/images/shabab_logo.jpg') }}"); --}}
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
            {{-- <img src="{{ asset('/assets/images/shabab_logo.jpg') }}" alt="" width="150px" height="150px"> --}}
            <center>
            <h2>SHABAB NURSERY, PRIMARY AND SECONDARY SCHOOL</h2>
            <h5>No. 6 Galadima Road, Unguwan Dosa, Kaduna</h5>
            <h2>{{ strtoupper($level == null ? 'ALL':$levels[$level]) }} STUDENTS</h2>

        </header>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Registration Number</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Admission Class</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr class="gradeX">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $student->regNumber }}</td>
                        <td>{{ $student->surname }} {{ $student->othernames }}</td>
                        <td>{{ $student->sex == 1 ? 'Male' : 'Female' }}</td>
                        <td>{{ strtoupper($levels[$student->level_id]) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       </section>
        
    </body>
</html>
