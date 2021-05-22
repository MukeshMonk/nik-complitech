@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h1 class="text-center">Detail Page Of {{$user->name}}</h1>
            <table class="table table-responsive table-bordered border-dark">
                <tbody>
                    <tr>
                        <td class="text-center fw-bold">Name :-</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td class="text-center fw-bold">Aadhar :-</td>
                        <td>{{$user->aadhar}}</td>
                    </tr>
                    <tr>
                        <td class="text-center fw-bold">Birth Date :-</td>
                        <td>{{$user->birthday}}</td>
                    </tr>
                    <tr>
                        <td class="text-center fw-bold">Father :-</td>
                        @if($father)
                        <td><a href="{{url('/detail/'.$father['id'])}}">{{$father->name}}</a></td>
                        @else
                            <td>{{$user->father_name}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-center fw-bold">Mother :-</td>
                        @if($mother)
                        <td><a href="{{url('/detail/'.$mother['id'])}}">{{$mother->name}}</a></td>
                        @else
                            <td>{{$user->mother_name}}</td>
                        @endif                    </tr>
                    <tr>
                        <td class="text-center fw-bold">Children :-</td>
                        @if($childs->count()>0)
                            <td>
                            @foreach($childs as $child)
                                <a href="{{url('/detail/'.$child['id'])}}">{{$child->name}} ,</a>
                            @endforeach
                            </td>
                        @else
                            <td>{{$user->children_name ? $user->children_name : 'N/A'}}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection