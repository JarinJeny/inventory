@extends('include.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new category</h4>
                <p class="card-description">All field required</p>
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
                <form class="forms-sample" method="POST" action="{{ route('update-country', $countryDetail->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="country_name" id="exampleInputName1" value="{{$countryDetail->country_name}}"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="slug" id="exampleInputName1" value="" />
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    <button class="btn btn-light"><a href="{{ route ('country') }}">Cancel</a></button>
                </form>
            </div>
        </div>
    </div>
@endsection

