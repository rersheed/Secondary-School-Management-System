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

@section('title', 'Current Students - Shabab')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Current Students</h2>
    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Students</span></li>
                <li><span>Current</span></li>
            </ol>
    
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <div class="row">
        <div class="col-md-12">
            <div class="tabs tabs-vertical tabs-left">
                <ul class="nav nav-tabs col-sm-2 col-xs-5">
                    @foreach ($levels as $level)    
                        <li>
                            <a href="#{{ $level->name.'-'.$level->tag }}" data-toggle="tab">{{ strtoupper($level->name.'-'.$level->tag) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($levels as $level)    
                        <div id="{{ $level->name.'-'.$level->tag }}" class="tab-pane active">
                            <section class="panel panel-featured panel-featured-dark">
                                <header class="panel-heading">
                                    <h2 class="panel-title">{{ $level->name.' - '.$level->tag }} Students</h2>

                                    <div class="pull-right">
                                        <a href="" class="btn btn-default" id="scoreSheet">
                                        <i class="fa fa-download text-dark"></i>
                                        <input type="hidden" id="sesion_id" value="{{ $currentSession }}" />
                                        <input type="hidden" id="level_id" value="{{ $level->id }}">
                                            Download Score Sheet
                                        </a>

                                        <a href="" class="btn btn-default" id="list">
                                            <i class="fa fa-download text-dark"></i>
                                        <input type="hidden" id="sesion_id" value="{{ $currentSession }}" />
                                        <input type="hidden" id="level_id" value="{{ $level->id }}">
                                            Downlaod List
                                        </a>
                                    </div>
                                </header>
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped mb-none" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Surname</th>
                                                <th>Othernames</th>
                                                <th>Gender</th>
                                                <th>Phone Number</th>
                                                <th>Admission Class</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Surname</th>
                                                <th>Othernames</th>
                                                <th>Gender</th>
                                                <th>Phone Number</th>
                                                <th>Admission Class</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse ($promotions as $promotion)
                            @continue(empty($students->find($promotion->student_id)))
                                                @if ($promotion->level_id == $level->id)
                                                    <tr class="gradeX">
                                                        <td>
                                                            {{ $loop->index + 1 }}
                                                        </td>
                                                        <td><a href="{{ route('students.show', $promotion->student_id) }}">{{ $students->find($promotion->student_id)->surname }}</a></td>
                                                        <td>{{ $students->find($promotion->student_id)->othernames }}</td>
                                                        <td>{{ $students->find($promotion->student_id)->sex == 1? 'Male': 'Female'}}</td>
                                                        <td>{{ $students->find($promotion->student_id)->phone }}</td>
                                                        <td>{{ strtoupper($names[$students->find($promotion->student_id)->level_id]) }} - {{ strtoupper($tags[$students->find($promotion->student_id)->level_id]) }}</td>
                                                    </tr>
                                                @endif
                                            @empty
                                            <tr>
                                                <td colspan="6">No Students Found!!!</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    
</section>
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
                $(document).on('click', '#scoreSheet', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var level_id = $(this).find('#level_id').val();
                    // $(this).find('#itemId').val();
                    var sesion_id = $(this).find('#sesion_id').val();
                    var url = '{{ url('/classStudents/level_id/sesion_id') }}';
                    url = url.replace('level_id', level_id);
                    url = url.replace('sesion_id', sesion_id);

                    console.log(url)
                     $('<form action="'+url+'"></form>').appendTo('body').submit();
                });

                $(document).on('click', '#list', function(event) {
                    event.preventDefault();
                    /* Act on the event */

                    var level_id = $(this).find('#level_id').val();
                    // $(this).find('#itemId').val();
                    var url = '{{ url('/allStudent/level') }}';
                    url = url.replace('level', level_id);

                    console.log(url)
                     $('<form action="'+url+'"></form>').appendTo('body').submit();
                });
            });
        </script>
@endsection
