@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h1 class="text-center">People Listing</h1>
            <table class="table table-responsive table-bordered border-dark">
                <thead>
                    <tr><th>#</th><th>Name</th><th>Aadhaar</th><th>Birth Date</th><th>Action</th></tr>
                </thead>
                <tbody>
                    @if(count($userData)>0)
                        @foreach($userData as $key=>$ud)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$ud['name']}}</td>
                                <td>{{$ud['aadhar']}}</td>
                                <td>{{$ud['birthday']}}</td>
                                <td><a href="{{url('/detail/'.$ud['id'])}}" class="btn btn-primary">Show Detail</a></td>
                            </tr>
                        @endforeach
                    @else
                    <tr><td>No data founded</td></tr>
                    @endif
                </tbody>
            </table>
            <div style="float:right">{!! $userData->links() !!}</div>
        </div>
    </div>
</div>
@endsection