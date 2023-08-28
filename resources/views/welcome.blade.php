@extends('layouts.app')

@section('content')
<div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">efrid<b>AI</b></h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly generate and customizable prompt.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4 me-sm-3">Get Started</a>
        <a href="{{ route('register') }}" class="btn btn-success btn-lg px-4 me-sm-3">New Member</a>
      </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src="{{ asset('images/wellcome_image.jpeg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
      </div>
    </div>
</div>

@endsection
