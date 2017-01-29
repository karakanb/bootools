@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @yield('tool_header')
                    </div>
                    <div class="panel-body">

                        @yield('tool_body')
                    </div>

                    <div class="panel-footer text-center">
                        @yield('tool_footer')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
