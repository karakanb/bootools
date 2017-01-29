@extends('layouts.tool_view')

@section('tool_header')
    HTTP Status Checker - check HTTP status codes easily.
@endsection

@section('tool_body')
    <form method="post">
        <div class="row form-group">
            <div class="col-md-12">
                <small>You can check at most 200 URLs at one go.</small>
                <textarea id="url-input" name="source" class="form-control"
                      rows="15">@if(!empty($urls)){{ $urls }}@endif</textarea>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>

    @if(isset($seperateURLs))
        <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>URL</th>
                    <th>HTTP Status</th>
                    <th>Verbal Status</th>
                    <th>Redirect URL</th>
                </tr>
                </thead>
                <tbody>
                @foreach($seperateURLs as $url => $value)
                    <tr>
                        @if($value['statusCode'] == 0)
                            <td>{{ $url }} </td>
                            <td>0</td>
                            <td>Failed to connect to host, please check the URL.</td>
                        @elseif($value['statusCode'] == 404)
                            <td>{{ $url }} </td>
                            <td>{{ $value['statusCode']  }} </td>
                            <td>Page not found.</td>
                        @elseif($value['statusCode'] == 301 OR $value['statusCode'] == 302)
                            <td>{{ $url }} </td>
                            <td>{{ $value['statusCode']  }} </td>
                            <td>Looks like a redirect.</td>
                        @else
                            <td>{{ $url }} </td>
                            <td>{{ $value['statusCode']  }} </td>
                            <td>{{ $value['errorMessage'] }}</td>
                        @endif
                        <td>{{ $value['redirectURL'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table><!-- panel -->
        </div>
    @endif


@endsection

@section('tool_footer')
    HTTP Status Checker is a free tool that checks HTTP status codes of the given URLs.
@endsection

@section('script')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-html5-1.2.4/b-print-1.2.4/r-2.1.0/sc-1.4.2/datatables.min.js"></script>
    <script type="text/javascript">
        $('#datatable-buttons').dataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });

    </script>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-html5-1.2.4/b-print-1.2.4/r-2.1.0/sc-1.4.2/datatables.min.css"/>


@endsection



