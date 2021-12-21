@extends('include.main')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Product</h4>
                <a href="{{ route ('add-product') }}">
                    <button type="button" class="btn btn-primary btn-icon-text" style="float: right; display: inline; margin: 0px 50px 20px 0px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square pr-1" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg><p style="display: inline; font-size: 12px;">Add Product</p> </button></a>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td> {{ $product->id }} </td>
                                    <td><a href="{{ route ('product-details', $product->slug) }}">
                                            {{ $product->product_name }} </a></td>
                                    <td class="text-danger"><label class="badge badge-danger"> {{ $product->code }} </label>
                                    </td>
                                    <td> {{ $product->mrp }} tk. </td>
                                    <td>
                                        @if($product->qty > 0)
                                            <label class="badge bg-info" style="color: white"> Stock In </label>
                                        @else
                                            <label class="badge bg-warning" style="color: white"> Stock Out </label>
                                        @endif
                                    </td>
                                    <td> {{ $product->qty }} </td>
                                    <td>
                                        <div class="template-demo" style="display: inline">
                                            <a href="{{ route ('product-details', $product->slug) }}">
                                                <button type="button" class="btn btn-success btn-icon-text r-0" style="padding: 1px 15px 1px 5px; background-color: #23C584; color: white">
                                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Details </button></a>
                                        </div>
                                        <div class="template-demo" style="display: inline">
                                            <a href="{{ route ('edit-product', $product->slug) }}">
                                                <button type="button" class="btn bg-primary btn-icon-text r-0" style="padding: 1px 15px 1px 5px; background-color: #23C584; color: white">
                                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Edit </button></a>
                                        </div>
                                        <div class="template-demo" style="display: inline">
                                            <a href="{{ route ('product-delete', $product->id) }}" onclick="return confirm('Are you sure?')">
                                                <button type="button" class="btn btn-danger btn-icon-text ml-0" style="padding: 1px 15px 1px 5px; background-color: #C80606; color: white">
                                                    <i class="mdi mdi-reload btn-icon-prepend"></i> Delete </button></a>
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
