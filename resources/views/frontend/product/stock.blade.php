@extends('include.main')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Product</h4>
{{--                <a href="{{ route ('add-stock') }}">--}}
                    <button type="button" class="btn btn-primary btn-icon-text" style="float: right; display: inline; margin: 0px 50px 20px 0px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square pr-1" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg><p style="display: inline; font-size: 12px;"> Stock In </p> </button></a>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th> Product Name </th>
                            <th> Product Code </th>
                            <th> Quantity </th>
                            <th> Stock In </th>
                            <th> Quantity </th>
                            <th> Stock Date </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($stock_logs as $stock_log)
                                <tr>
                                    <td> {{ $stock_log->product_name }} </td>
                                    <td> {{ $stock_log->product_code }} </td>
                                    <td class="text-danger"> {{ $stock_log->total_qty }} <i class="mdi mdi-arrow-down"></i>
                                    </td>
                                    <td>
                                        <label class="badge badge-danger"> Quantity </label>
                                    </td>
                                    <td>
                                        <div class="template-demo" style="display: inline">
                                            <a href="{{ route ('add-stock', $stock_log->product_id) }}">
                                                <button type="button" class="btn btn-primary btn-icon-text r-0" style="color: white">
                                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Stock In </button></a>
                                        </div>
                                        <div class="template-demo" style="display: inline">
                                            <a href="">
                                                <button type="button" class="btn btn-success btn-icon-text r-0" style="background-color: #23C584; color: white">
                                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Details </button></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
