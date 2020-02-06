@extends('layouts.app')
@inject('coffees','App\Coffee')
@section('title', 'Ciemno palona - Strona główna')  
@push('head')
<!-- Styles -->
<link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
<!-- Scripts -->

@endpush


@section('content')
                <body>
                    <form action="{{route('site.update',$site->id)}}" method="post" enctype="multipart/form-dataupload">
                    @method('patch')
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row pt-5" id="myId" >
                            <!-- {{$coffees=App\Coffee::all()}} -->
                            <?php                                            
                                $exp=explode(', ' ,$site -> title);
                            ?>
                            @foreach ($coffees as $coffee)
                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <?php
                                            $test="";
                                            foreach ($exp as $nazwa)
                                            {
                                                if($nazwa===$coffee->type){
                                                    $test= "checked";
                                                    
                                                }
                                            }
                                            ?>
                                        <input type="checkbox" name="check[]" id="{{$coffee -> id}}"  value="{{$coffee -> id}}" <?php echo $test;?>/>
                                        <label class="d-flex justify-content-center" for="{{$coffee -> id}}">
                                            <img class="d-flex justify-content-center" src="/images/{{$coffee -> id}}.jpg" alt="Lights" style="width:80%">
                                        </label>
                                        <div class="caption">
                                            <p>{{$coffee -> type}} {{$coffee -> price}} zł</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    
                        <div class="d-flex  justify-content-center">
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