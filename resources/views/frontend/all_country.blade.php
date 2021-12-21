@extends('include.main')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="font-size: 28px; display: inline" >All Country</h4>
                <a href="{{ route ('add-country') }}">
                <button type="button" class="btn btn-primary btn-icon-text" style="float: right; display: inline; margin: 0px 50px 20px 0px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square pr-1" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg><p style="display: inline; font-size: 12px;">Add Category</p> </button></a>

                @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert-class') }}" id="msg">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr>
                            <td>{{$country->id}}</td>
                            <td>{{$country->country_name}}</td>
                            <td> {{$country->slug}} <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td>
                                <label class="badge badge-danger" style="background-color: #DFDFE0; border-style: none; color: #1f262e">{{$country->created_at}}</label>
                            </td>
                            <td>
                                <div class="template-demo" style="display: inline">
                                    <a href="{{ route ('edit-country', $country->slug) }}">
                                    <button type="button" class="btn btn-success btn-icon-text r-0" style="background-color: #23C584; color: white">
                                        <i class="mdi mdi-reload btn-icon-prepend"></i> Edit </button></a>
                                </div>
                                <div class="template-demo" style="display: inline">
                                    <a href="{{ route ('country-delete', $country->id) }}" onclick="return confirm('Are you sure?')">
                                    <button type="button" class="btn btn-danger btn-icon-text ml-0" style="background-color: #C80606; color: white">
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

    <script !src="">
        setTimeout(function() {
            $('#msg').fadeOut('fast');
        }, 5000);
    </script>

@endsection

