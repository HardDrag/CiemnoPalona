@extends('layouts.app')
@section('title', 'Ciemno palona - Strona główna')  
@push('head')
<!-- Styles -->
<link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
<!-- Scripts -->

@endpush


@section('content')
                <body>
                    <form action="{{route('sites.save')}}" method="post" enctype="multipart/form-dataupload">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group row pt-3" id="myId" >
                            @foreach ($coffees as $coffee)
                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <input type="checkbox" name="check[]" id="{{$coffee -> id}}"  value="{{$coffee -> id}}"/>
                                        <label class="d-flex justify-content-center" for="{{$coffee -> id}}">
                                            <img class="d-flex justify-content-center" src="/images/{{$coffee -> id}}.jpg" alt="Lights" style="width:80%">
                                        </label>
                                        <div class="ml-4 mr-4 caption" id="capt">
                                            <p>{{$coffee -> type}} {{$coffee -> price}} zł</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-outline-primary btn-lg">Order</button>
                        </div>
                    </form>
                </body>
@endsection

@section('iffer')
    @if (session()->has('popup')) 
        <p class="m-2 d-flex justify-content-center" style="font-size: 1.5rem">Make a choice!</p>
@endif
@endsection