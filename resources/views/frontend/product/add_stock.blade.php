@extends('include.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new stock</h4>
                <p class="card-description">All field required</p>
                <a href="{{ route ('product') }}">
                    <button type="button" class="btn btn-primary btn-icon-text" style="float: right; display: inline; margin: 0px 50px 20px 0px">
                        <p style="display: inline; font-size: 12px;">Back</p> </button></a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('store-stock', $product->id) }}">
                    @csrf

                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" style="font-size: 14px; font-weight: 600; color: #102733">Product Name: </label>
                                            <div class="col-sm-9 mt-3" style="font-size: 14px">
                                                {{ $product->product_name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" style="font-size: 14px; font-weight: 600; color: #102733">Code</label>
                                            <div class="col-sm-9 mt-3" style="font-size: 14px">
                                                {{ $product->code }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" style="font-size: 14px; font-weight: 600; color: #102733"> Quantity </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="qty" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection



