@extends('include.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 p-2" style="background-color: #DFE2F0; height: 50px;">
                <a href="{{ route ('edit-product', $product->slug) }}">
                    <button type="button" class="btn badge-success btn-icon-text" style=" display: inline; margin: 0px 10px 0px 0px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square pr-1" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg><p style="display: inline; font-size: 12px;">Edit</p> </button></a>
                <a href="{{ route ('add-stock', $product->id) }}">
                    <button type="button" class="btn badge-info btn-icon-text" style="display: inline; margin: 0px 10px 0px 0px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square pr-1" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg><p style="display: inline; font-size: 12px;">Stock In</p> </button></a>
                <a href="{{ route ('product-attribute', $product->slug) }}">
                    <button type="button" class="btn badge-info btn-icon-text" style="display: inline; margin: 0px 10px 0px 0px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square pr-1" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg><p style="display: inline; font-size: 12px;">Attribute</p> </button></a>

                <a href="{{ route ('product') }}">
                    <button type="button" class="btn btn-primary btn-icon-text" style="float: right; display: inline; margin: 0px 20px 20px 0px">
                        <p style="display: inline; font-size: 12px;">Back</p> </button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3" style="background-color: #DFE2F0; height: 500px;">
                <h3 style="margin: 20px 0px">{{ $product->product_name }}</h3>
                <div class="col-m-6 col-lg-6 col-sm-6" style="float: left">
                    <p style="font-size: 14px; margin-left: 15px; font-weight: bold; color: #102733"><span>Code :</span>
                        <button disabled style="margin-left: 10px; background-color: #27526A; color: white; padding: 2px 20px; border-style: none; border-radius: 5px">
                            {{ $product->code }}</button></p>
                    <p style="font-size: 14px; font-weight: bold; margin-left: 15px; color: #102733"><span>MRP :</span>
                        <button disabled style="margin-left: 10px; background-color: #D78912; color: white; padding: 2px 20px; border-style: none; border-radius: 5px">
                            TK: {{ $product->mrp }}</button></p>
                    <h4 style="font-size: 14px; margin-top: 20px; margin-left: 15px; color: #102733">
                        <span style="font-weight: bold;">Sale Price: </span> {{ $product->sale_price }}tk.</h4>
                    <p style="margin-left: 14px;"><span style="color: #102733; font-weight: bold;">Quantity :</span>  {{ $product->qty }}</p>
                </div>
                <div class="col-m-5 col-lg-5 col-sm-5" style="float: left">
                    <h4 style="font-size: 14px;">
                        <span style="font-weight: bold; color: #102733">Color:</span>  &nbsp; &nbsp;
                        <span style="font-weight: bold; color: #102733">Size:</span>
                    </h4>
                    <h4 style="font-size: 14px; margin-top: 20px">
                        <span style="font-weight: bold; color: #102733">Category Name:</span> {{ $category->name }}
                    </h4>
                    <h4 style="font-size: 14px; margin-top: 20px">
                        <span style="font-weight: bold; color: #102733">Country Name:</span> {{ $country->country_name }}
                    </h4>
                    <img src="{{ URL::to('/') }}/assets/images/images.jpg }}" />
                </div>

            </div>
        </div>
    </div>

@endsection

