@extends('include.main')
@section('content')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card mt-4 ml-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="font-size: 28px; font-family:'Berlin Sans FB Demi'">Attribute</h4>
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
                    <div class="row">
                        <div class="col-12 mt-3" style="background-color: #DFE2F0; height: 500px;">
                            <h3 style="margin: 20px 0px">{{ $product->product_name }} </h3>
                            <div class="col-m-6 col-lg-6 col-sm-6" style="float: left">
                                <p style="font-size: 14px; margin-left: 15px; font-weight: bold; color: #102733"><span>Code :</span>
                                    <button disabled style="margin-left: 10px; background-color: #27526A; color: white; padding: 2px 20px; border-style: none; border-radius: 5px">
                                        {{ $product->code }}</button></p>
                                <p style="font-size: 14px; font-weight: bold; margin-left: 15px; color: #102733"><span>MRP :</span>
                                    <button disabled style="margin-left: 10px; background-color: #D78912; color: white; padding: 2px 20px; border-style: none; border-radius: 5px">
                                        TK: {{ $product->mrp }} mrp</button></p>
                                <h4 style="font-size: 14px; margin-top: 20px; margin-left: 15px; color: #102733">
                                    <span style="font-weight: bold;">Sale Price: </span> {{ $product->sale_price }} tk.</h4>
                                <p style="margin-left: 14px;"><span style="color: #102733; font-weight: bold;">Quantity :</span>  {{ $product->qty }} </p>
                            </div>
                            <div class="col-m-5 col-lg-5 col-sm-5" style="float: left">
                                <h4 style="font-size: 14px;">
                                    <span style="font-weight: bold; color: #102733">Color:</span> color &nbsp; &nbsp;
                                    <span style="font-weight: bold; color: #102733">Size:</span> size
                                </h4>
                                <h4 style="font-size: 14px; margin-top: 20px">
                                    <span style="font-weight: bold; color: #102733">Category Name:</span> {{ $category->name }}
                                </h4>
                                <h4 style="font-size: 14px; margin-top: 20px">
                                    <span style="font-weight: bold; color: #102733">Country Name:</span> {{ $country->country_name }}
                                </h4>
                                <img src="{{ URL::to('/') }}/assets/images/images.jpg }}" />
                            </div>

                            <div class="col-m-12 col-lg-12 col-sm-12" style="float: left">
                                <form class="forms-sample" method="POST" action="{{ route('store-attribute') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Color</label>
                                        @if($colors->isNotEmpty())
                                            <select name="color" class="js-example-basic-single" style="width: 100%;">
                                                <option value="">Please Select</option>
                                                @foreach($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Size</label>
                                        @if($sizes->isNotEmpty())
                                            <select name="size" class="js-example-basic-single" style="width: 100%;">
                                                <option value="">Please Select</option>
                                                @foreach($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn mr-2" style="background-color: #3D8A44; color: white"> Submit </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
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
                        @foreach($attributes as $attribute)
                            <?php
                                $color = App\Models\Color::where('id',$attribute->color_id)->get()->first();
                                $size = App\Models\Size::where('id',$attribute->size_id)->get()->first();
                            ?>
                            <tr>
                                <td> {{ $attribute->id }} </td>
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
    </div>
@endsection
