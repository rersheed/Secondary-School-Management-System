<!DOCTYPE>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
            <title>
                Score Sheet
            </title>
        </meta>
    </head>
    <style>
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
        <center>
            <h2>
                SHABAB NURSERY, PRIMARY AND SECONDARY SCHOOL
            </h2>
            <h5>
                No. 6 Galadima Road, Unguwan Dosa, Kaduna
            </h5>
            <h2>
                {{ strtoupper($levels[$level_id]) }} Score Sheet, {{ $sesions[$sesion_id] }} Session
            </h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            S/N
                        </th>
                        <th>
                            Registration Number
                        </th>
                        <th>
                            Student Name
                        </th>
                        <th>
                            1st C.A
                        </th>
                        <th>
                            2nd C.A
                        </th>
                        <th>
                            Exam
                        </th>
                        <th>
                            Total
                        </th>
                        <th>
                            Remark
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr class="gradeX">
                        <td>
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $student->regNumber }}
                        </td>
                        <td>
                            {{ $student->surname }} {{ $student->othernames }}
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </center>
    </body>
</html>
