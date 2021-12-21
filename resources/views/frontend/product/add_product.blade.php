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
                <form class="forms-sample" method="POST" action="{{ route('store-product') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="product_name" id="exampleInputName1" placeholder="Name" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="slug" id="exampleInputName1" placeholder="Slug" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Code</label>
                        <input type="text" class="form-control" name="code" id="exampleInputName1" placeholder="Code" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Quantity</label>
                        <input type="number" class="form-control" name="qty" id="exampleInputName1" placeholder="Quantity" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">MRP</label>
                        <input type="number" class="form-control" name="mrp" id="exampleInputName1" placeholder="MRP" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Sales Price</label>
                        <input type="number" class="form-control" name="sale_price" id="exampleInputName1" placeholder="Sales Price" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Category</label>
                        @if($categoies)
                            <div class="col-sm-12">
                                <select name="category" class="form-control" id="exampleInputName1">
                                    <option value="">Please Select</option>
                                    @foreach($categoies as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Country</label>
                        @if($countries)
                            <div class="col-sm-12">
                                <select name="country" class="form-control">
                                    <option value="">Please Select</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Brand</label>
                        @if($brands)
                            <div class="col-sm-12">
                                <select name="brand" class="form-control">
                                    <option value="">Please Select</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection

