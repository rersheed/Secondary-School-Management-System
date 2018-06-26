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
            <a class="panel-title pull-right" href="{{ route('results.create') }}">View Uploaded Score Sheets</a>
            <h2 class="panel-title">Upload Score Sheets</h2>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered" action="{{ route('results.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('year_group') ? ' has-error' : '' }}">
                    <label for="year_group" class="col-md-4 control-label">Session:</label>

                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control populate" data-plugin-selectTwo name="year_group" required="">
                                <option>Select session...</option>
                                @foreach ($year_group as $sesion)
                                    <option value="{{ $sesion->id}}">{{ $sesion->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($errors->has('year_group'))
                            <span class="help-block">
                                <strong>{{ $errors->first('year_group') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('term') ? ' has-error' : '' }}">
                    <label for="term" class="col-md-4 control-label">Term:</label>

                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control populate" data-plugin-selectTwo name="term" required="">
                                <option>Select term...</option>
                                @foreach ($term as $terms)
                                    <option value="{{ $terms->id}}">{{ $terms->name."(".$terms->yearGroup->name.")"}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($errors->has('term'))
                            <span class="help-block">
                                <strong>{{ $errors->first('term') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                    <label for="level" class="col-md-4 control-label">Class:</label>

                    <div class="col-md-6">
                        <div class="input-group">
                             <select class="form-control populate" data-plugin-selectTwo name="level" required="">
                                <option>Select level...</option>
                                @foreach ($level as $class)
                                    <option value="{{ $class->id}}">{{ strtoupper($class->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($errors->has('level'))
                            <span class="help-block">
                                <strong>{{ $errors->first('level') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                    <label for="subject" class="col-md-4 control-label">Subject:</label>

                    <div class="col-md-6">
                        <div class="input-group">
                             <select class="form-control populate" data-plugin-selectTwo name="subject" required="">
                                <option>Select subject...</option>
                            @foreach ($subject as $sub)
                                    <option value="{{ $sub->id}}">{{ $sub->name ."(".$sub->code.")"}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('scoresheet') ? ' has-error' : '' }}">
                    <label for="scoresheet" class="col-md-4 control-label">CSV File:</label>

                    <div class="col-md-6">
                        <div class="input-group">
                             <input type="file" name="scoresheet" class="form-control" required="" />
                        </div>

                        @if ($errors->has('scoresheet'))
                            <span class="help-block">
                                <strong>{{ $errors->first('scoresheet') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    
                    <div class="col-md-6 col-md-offset-4">
                        <div class="input-group">
                             <input type="submit" name="submit" class="btn btn-primary">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
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

            });
        </script>
@endsection
