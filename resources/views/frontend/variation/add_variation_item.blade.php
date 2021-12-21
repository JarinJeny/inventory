@extends('include.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new variation item</h4>
                <p class="card-description">All field required</p>
                <a href="{{ route ('variation-item') }}">
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
                <form class="forms-sample" method="POST" action="{{ route('store-variation-item') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" />
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Variation type</label>
                        @if($variations)
                            <div class="col-sm-12">
                                <select name="variation" class="form-control">
                                    <option value="">Please Select</option>
                                    @foreach($variations as $variation)
                                        <option value="{{ $variation->id }}">{{ $variation->name }}</option>
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

