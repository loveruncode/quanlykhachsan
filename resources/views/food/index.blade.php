@extends('layout.master')

@section('content')
<form method="get" action="{{ route('notify.search') }}">
    @csrf
    <div class="input-group mb-3">
        <input name="searchData" id="searchNotify" type="text" class="form-control" placeholder="Search..."
            aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="input-group-text btn btn-primary" id="basic-addon2">Search</button>
        </div>

    </div>
</form>

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="https://cdn.tgdd.vn/2020/07/CookProductThumb/59-620x620-3.jpg" class="card-img-top"
                        alt="">
                </div>
                <div class="card-body m-auto align-content-center">
                    <a class="text-dark name" style="font-weight: bold; cursor: pointer;">Hamburger</a>
                    <p class="text-dark desc">blablablablablablablablabla</p>
                    <p class="EatTime">2:30 PM</p>
                    <p class="price">$4.79</p>
                </div>
            </div>
        </div>

        <!-- test -->
        <!-- <div class="col mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="https://cdn.tgdd.vn/2020/07/CookProductThumb/59-620x620-3.jpg" class="card-img-top"
                        alt="">
                </div>
                <div class="card-body m-auto align-content-center">
                    <a class="text-dark name" style="font-weight: bold; cursor: pointer;">Hamburger</a>
                    <p class="text-dark desc">blablablablablablablablabla</p>
                    <p class="EatTime">2:30 PM</p>
                    <p class="price">$4.79</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="https://cdn.tgdd.vn/2020/07/CookProductThumb/59-620x620-3.jpg" class="card-img-top"
                        alt="">
                </div>
                <div class="card-body m-auto align-content-center">
                    <a class="text-dark name" style="font-weight: bold; cursor: pointer;">Hamburger</a>
                    <p class="text-dark desc">blablablablablablablablabla</p>
                    <p class="EatTime">2:30 PM</p>
                    <p class="price">$4.79</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="https://cdn.tgdd.vn/2020/07/CookProductThumb/59-620x620-3.jpg" class="card-img-top"
                        alt="">
                </div>
                <div class="card-body m-auto align-content-center">
                    <a class="text-dark name" style="font-weight: bold; cursor: pointer;">Hamburger</a>
                    <p class="text-dark desc">blablablablablablablablabla</p>
                    <p class="EatTime">2:30 PM</p>
                    <p class="price">$4.79</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="https://cdn.tgdd.vn/2020/07/CookProductThumb/59-620x620-3.jpg" class="card-img-top"
                        alt="">
                </div>
                <div class="card-body m-auto align-content-center">
                    <a class="text-dark name" style="font-weight: bold; cursor: pointer;">Hamburger</a>
                    <p class="text-dark desc">blablablablablablablablabla</p>
                    <p class="EatTime">2:30 PM</p>
                    <p class="price">$4.79</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="https://cdn.tgdd.vn/2020/07/CookProductThumb/59-620x620-3.jpg" class="card-img-top"
                        alt="">
                </div>
                <div class="card-body m-auto align-content-center">
                    <a class="text-dark name" style="font-weight: bold; cursor: pointer;">Hamburger</a>
                    <p class="text-dark desc">blablablablablablablablabla</p>
                    <p class="EatTime">2:30 PM</p>
                    <p class="price">$4.79</p>
                </div>
            </div>
        </div> -->

    </div>
</div>
@endsection