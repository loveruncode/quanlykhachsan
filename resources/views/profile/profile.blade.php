@extends('layout.master')



@section('content')
<div class="container-fluid p-3 bg-primary text-white text-center">
    <h2>Tài khoản của tôi</h2>
</div>
<div class="container mt-5">
    <div class="pg-brown">
        @include('profile.edit_profile')
    </div>
</div>    
    
        
@endsection
