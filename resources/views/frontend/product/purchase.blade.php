@extends('include.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new product</h4>
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
                <form class="forms-sample" method="POST" action="{{ route('store-order') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        @if($products)
                            <div class="col-sm-12">
                                <select name="product_name" class="form-control">
                                    <option value="">Please Select</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Code</label>
                        <input type="text" class="form-control" name="code" id="exampleInputName1" placeholder="Code" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Quantity</label>
                        <input type="number" min="0" class="form-control" name="qty" id="exampleInputName1" placeholder="Quantity" />
                    </div>


                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection

