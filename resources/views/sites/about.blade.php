@extends('layouts.app')

@section('title', 'About')   
@section('content')
<!-- Styles -->
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<!-- Scripts -->
<body class="text-center">
    <div class="incontainer">
        <img src="/images/1about.jpg" alt="hold" class="image i1" style="width:100%">
        <div class="text middle m1">We just want to sip some good coffee with good people. If you want to check our goods before taking 12kg bag of beans,
                come to our cafe and try it with us. Really, only we work in cafe.</div>
        
    </div>

    <div class="incontainer">
        <img src="/images/2about.jpg" alt="hold" class="image i2" style="width:100%">
        <div class="text middle m2">Creating something more than just a drink was our dream and we are more than pleased to share it with you, the same goes with the beans.</div>
    </div>

    <div class="incontainer">
        <img src="/images/3about.jpg" alt="hold" class="image i3" style="width:100%">
        <div class="text middle m3">The only thing we can promise is that we will give our best to deliver the finest beans this planet ever seen.</div>
    </div>

    <div class="incontainer">
        <img src="/images/4about.jpg" alt="hold" class="image i4" style="width:100%">
        <div class="text middle m4">Best one.</div>
    </div>
</body>

@endsection