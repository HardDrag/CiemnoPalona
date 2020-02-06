@extends('layouts.app')

@section('title', 'Zamówienie')  

@section('content')

<div class="pt-3 table-responsive">
    <table class="table table-striped table-bordered" style="color: white">
    <thead>
        <tr>
        <th>Items</th>
        <th>Price</th>
        <th>Order date</th>
        <th>City</th>
        <th>Street</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>@foreach (explode(',' ,$site -> title) as $ex) {{$ex}} <br> @endforeach</td>
        <td>{{$site -> price}} zł</td>
        <td>{{$site -> date}}</td>
        <td>{{auth()->user()->city}}</td>
        <td>{{auth()->user()->street}}</td>
        </tr>
    </tbody>
    </table>
</div>

<div class="d-flex  justify-content-center">
    <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-lg mr-5">Previous</a>

    <form action="{{ url('/site', ['id' => $site->id]) }}" method="post">
        <input class="btn btn-outline-primary btn-lg mr-5" type="submit" value="Delete" />
        <input type="hidden" name="_method" value="delete" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    <a href="{{ route('site.edit',$site->id) }}" class="btn btn-outline-primary btn-lg">Edit</a>
</div>

@endsection