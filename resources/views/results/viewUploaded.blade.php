@extends('masters.master')

@section('css')
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">
    <script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>
@endsection

@section('title', 'User Result - Shabab')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Result</h2>
    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Shabab</span></li>
                <li><span>Result</span></li>
            </ol>
    
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    @include('includes.errorSuccess')
    <section class="panel panel-featured panel-featured-dark">
        <header class="panel-heading">
            <a href="{{ route('results.index') }}" class="panel-title pull-right">Upload Score Sheets</a>
            <h2 class="panel-title">View uploaded Score Sheets</h2>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered" action="" method="post" id="loadScoresheet">
                {{ csrf_field() }}
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="col-form-label" for="formGroupExampleInput">Session</label>
                        <select name="yeargroup" id="yeargroup" class="form-control" required>
                            <option  value=""> Select Session...</option>
                            @foreach ($year_group as $sesion)
                                <option value="{{ $sesion->id }}">{{ $sesion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="col-form-label" for="formGroupExampleInput">Term</label>
                        <select name="term" id="term" class="form-control" required>
                            <option  value=""> Select Term...</option>
                            @foreach ($terms as $term)
                                <option value="{{ $term->id }}">{{ $term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="col-form-label" for="formGroupExampleInput">Subject</label>
                        <select name="subject" id="subject" class="form-control" required>
                            <option  value=""> Select Subject...</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="col-form-label" for="formGroupExampleInput"> &nbsp; </label>
                        <input type="submit" name="submit" value="View" class="btn btn-primary form-control" id="loadSS" />
                    </div>
                </div>

            </form>
        </div>
    </section>

    <section class="panel panel-featured panel-featured-dark">
        <header class="panel-heading">
            <h2 class="panel-title">{{ $subjectName[$subject_id] }} Score Sheet(s)</h2> 
            <h2 class="panel-subtitle">{{ $session[$year_group_id] }} Session, {{ $termName[$term_id] }} </h2> 
        </header>
        <div class="panel-body">
          <table class="table table-bordered mb-none table-striped" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Registration Number</th>
                            <th>Student Name</th>
                            <th>1st C.A Test </th>
                            <th>2nd C.A Test </th>
                            <th>Exam</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Registration Number</th>
                            <th>Student Name</th>
                            <th>1st C.A Test </th>
                            <th>2nd C.A Test </th>
                            <th>Exam</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($scoresheet as $ss)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $regNumber[$ss->student_id ]}}</td>
                                <td>{{ $surname[$ss->student_id ] ." ". $othernames[$ss->student_id ]}}</td>
                                <td>{{ $ss->test1 }} </td>
                                <td>{{ $ss->test2 }} </td>
                                <td>{{ $ss->exam }} </td>
                                <td>
                                    <a class="btn-warning btn-xs" data-toggle="modal" data-target="#modalEditScore" id="editScore" data-id="{{ $ss->id }}" href="">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </section>
</section>

@include('results.modals')
@endsection

@section('js')
    <!-- Vendor -->
        <script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
        <script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
        <script src="{{ asset('assets/vendor/pnotify/pnotify.custom.js') }}"></script>
        <script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
        <script src="{{asset('assets/javascripts/theme.js')}}"></script>
        <script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
        <script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
        <script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
        <script src="{{asset('assets/javascripts/tables/examples.datatables.ajax.js')}}"></script>
        <script src="{{asset('assets/javascripts/tables/examples.datatables.editable.js')}}"></script>
        <script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
        <script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
        <script src="{{ asset('assets/javascripts/ui-elements/examples.modals.js') }}"></script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '#loadSS', function(event) {
                    event.preventDefault();
                    var yeargroup = $('#yeargroup').val();
                    var term = $('#term').val();
                    var subject = $('#subject').val();

                    var url = "{{ route('results.index') }}/" + yeargroup + "/" +  term + "/" +  subject;
                    // console.log(url)
                    
                    $('<form action="'+url+'"></form>').appendTo('body').submit();
                });

                $('#modalEditScore').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget) 
                  var id = button.data('id') 
                  $('#scoreId').val(id);
                  // console.log(id);
                  // $('#FormAddEmp').reset();
                });


                $(document).on('click', '#editScore', function(event) {
                    event.preventDefault();
                    var id = $('#scoreId').val();
                    var url = '{{ route('results.edit', @id) }}';
                    url = url.replace('id', id);

                    
                    $.get(url, function(data) {
                        // console.log(data);
                        $('#student_id').val(data[1][data[0].student_id]);
                        $('#exam').val(data[0].exam);
                        $('#test1').val(data[0].test1);
                        $('#test2').val(data[0].test2);
                        
                    });
                });

                $(document).on('click', '#saveChanges', function (event) {
                    event.preventDefault();
                    var id = $('#scoreId').val();
                    var url = '{{ route('results.update', @id) }}';
                    url = url.replace('id', id);

                    var test1 = $('#test1').val();
                    var test2 = $('#test2').val();
                    var exam = $('#exam').val();

                    // console.log(url);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.post(url, {
                        'test1': test1,
                        'test2': test2,
                        'exam': exam,
                        '_method': 'put',
                        '_token': $('input[name=_token]').val()
                    }, function(data) {
                        $('#datatable-tabletools').load(location.href + ' #datatable-tabletools');
                            console.log(data);
                            new PNotify({
                                        title: 'Alert!',
                                        text: 'Score Updated Successfully...',
                                        type: 'success'
                                    });
                    });
                })
            });
        </script>
@endsection
