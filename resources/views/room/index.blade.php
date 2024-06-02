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
    <div  class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col mb-4">
            <div class="card">
                <div class="position-relative">
                    <div class="row position-absolute" style="width: 100%;">
                        <div class="col-6 col-md-4 d-flex align-items-center">
                            <div class="p-1 rounded"
                                style="backdrop-filter: blur(5px); background-color: rgba(145, 140, 127, 0.5); color: white;">
                                Superhost
                            </div>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-end align-items-center">
                            <i class="far fa-heart text-danger" style="cursor: pointer;"
                                onclick="handleChangeIconHeart(this)"></i>
                        </div>
                    </div>
                    <img src="https://assets-global.website-files.com/5c6d6c45eaa55f57c6367749/65045f093c166fdddb4a94a5_x-65045f0266217.webp"
                        class="card-img-top" alt="img hotel">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <a href="#" class="card-title text-Dark" style="font-weight: bold; cursor: pointer;">
                            Apartment in Quận 4
                        </a>
                        <span class="text-warning mt-2 mt-md-0">&#9733; 5.0 (3)</span>
                    </div>
                    <p class="card-text">8" walk to Nguyen Hue, Fast Wifi, ... <br> 2 beds</p>
                    <p class="card-text">
                        <span>Jun</span>
                        <span class="start-rent">1</span>
                        <span> - </span>
                        <span class="end-rent">6</span>
                    </p>
                    <p class="card-text">
                        <del><span class="total-price ">$32</span></del>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div>


        <!-- test =)) -->
        <!-- <div class="col mb-4">
            <div class="card">
                <div class="position-relative">
                    <div class="row position-absolute" style="width: 100%;">
                        <div class="col-6 col-md-4 d-flex align-items-center">
                            <div class="p-1 rounded"
                                style="backdrop-filter: blur(5px); background-color: rgba(145, 140, 127, 0.5); color: white;">
                                Superhost
                            </div>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-end align-items-center">
                            <i class="far fa-heart text-danger" style="cursor: pointer;"
                                onclick="handleChangeIconHeart(this)"></i>
                        </div>
                    </div>
                    <img src="https://assets-global.website-files.com/5c6d6c45eaa55f57c6367749/65045f093c166fdddb4a94a5_x-65045f0266217.webp"
                        class="card-img-top" alt="img hotel">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <a href="#" class="card-title text-Dark" style="font-weight: bold; cursor: pointer;">
                            Apartment in Quận 4
                        </a>
                        <span class="text-warning mt-2 mt-md-0">&#9733; 5.0 (3)</span>
                    </div>
                    <p class="card-text">8" walk to Nguyen Hue, Fast Wifi, ... <br> 2 beds</p>
                    <p class="card-text">
                        <span>Jun</span>
                        <span class="start-rent">1</span>
                        <span> - </span>
                        <span class="end-rent">6</span>
                    </p>
                    <p class="card-text">
                        <del><span class="total-price ">$32</span></del>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="position-relative">
                    <div class="row position-absolute" style="width: 100%;">
                        <div class="col-6 col-md-4 d-flex align-items-center">
                            <div class="p-1 rounded"
                                style="backdrop-filter: blur(5px); background-color: rgba(145, 140, 127, 0.5); color: white;">
                                Superhost
                            </div>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-end align-items-center">
                            <i class="far fa-heart text-danger" style="cursor: pointer;"
                                onclick="handleChangeIconHeart(this)"></i>
                        </div>
                    </div>
                    <img src="https://assets-global.website-files.com/5c6d6c45eaa55f57c6367749/65045f093c166fdddb4a94a5_x-65045f0266217.webp"
                        class="card-img-top" alt="img hotel">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <a href="#" class="card-title text-Dark" style="font-weight: bold; cursor: pointer;">
                            Apartment in Quận 4
                        </a>
                        <span class="text-warning mt-2 mt-md-0">&#9733; 5.0 (3)</span>
                    </div>
                    <p class="card-text">8" walk to Nguyen Hue, Fast Wifi, ... <br> 2 beds</p>
                    <p class="card-text">
                        <span>Jun</span>
                        <span class="start-rent">1</span>
                        <span> - </span>
                        <span class="end-rent">6</span>
                    </p>
                    <p class="card-text">
                        <del><span class="total-price ">$32</span></del>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="position-relative">
                    <div class="row position-absolute" style="width: 100%;">
                        <div class="col-6 col-md-4 d-flex align-items-center">
                            <div class="p-1 rounded"
                                style="backdrop-filter: blur(5px); background-color: rgba(145, 140, 127, 0.5); color: white;">
                                Superhost
                            </div>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-end align-items-center">
                            <i class="far fa-heart text-danger" style="cursor: pointer;"
                                onclick="handleChangeIconHeart(this)"></i>
                        </div>
                    </div>
                    <img src="https://assets-global.website-files.com/5c6d6c45eaa55f57c6367749/65045f093c166fdddb4a94a5_x-65045f0266217.webp"
                        class="card-img-top" alt="img hotel">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <a href="#" class="card-title text-Dark" style="font-weight: bold; cursor: pointer;">
                            Apartment in Quận 4
                        </a>
                        <span class="text-warning mt-2 mt-md-0">&#9733; 5.0 (3)</span>
                    </div>
                    <p class="card-text">8" walk to Nguyen Hue, Fast Wifi, ... <br> 2 beds</p>
                    <p class="card-text">
                        <span>Jun</span>
                        <span class="start-rent">1</span>
                        <span> - </span>
                        <span class="end-rent">6</span>
                    </p>
                    <p class="card-text">
                        <del><span class="total-price ">$32</span></del>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="position-relative">
                    <div class="row position-absolute" style="width: 100%;">
                        <div class="col-6 col-md-4 d-flex align-items-center">
                            <div class="p-1 rounded"
                                style="backdrop-filter: blur(5px); background-color: rgba(145, 140, 127, 0.5); color: white;">
                                Superhost
                            </div>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-end align-items-center">
                            <i class="far fa-heart text-danger" style="cursor: pointer;"
                                onclick="handleChangeIconHeart(this)"></i>
                        </div>
                    </div>
                    <img src="https://assets-global.website-files.com/5c6d6c45eaa55f57c6367749/65045f093c166fdddb4a94a5_x-65045f0266217.webp"
                        class="card-img-top" alt="img hotel">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <a href="#" class="card-title text-Dark" style="font-weight: bold; cursor: pointer;">
                            Apartment in Quận 4
                        </a>
                        <span class="text-warning mt-2 mt-md-0">&#9733; 5.0 (3)</span>
                    </div>
                    <p class="card-text">8" walk to Nguyen Hue, Fast Wifi, ... <br> 2 beds</p>
                    <p class="card-text">
                        <span>Jun</span>
                        <span class="start-rent">1</span>
                        <span> - </span>
                        <span class="end-rent">6</span>
                    </p>
                    <p class="card-text">
                        <del><span class="total-price ">$32</span></del>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="position-relative">
                    <div class="row position-absolute" style="width: 100%;">
                        <div class="col-6 col-md-4 d-flex align-items-center">
                            <div class="p-1 rounded"
                                style="backdrop-filter: blur(5px); background-color: rgba(145, 140, 127, 0.5); color: white;">
                                Superhost
                            </div>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-end align-items-center">
                            <i class="far fa-heart text-danger" style="cursor: pointer;"
                                onclick="handleChangeIconHeart(this)"></i>
                        </div>
                    </div>
                    <img src="https://assets-global.website-files.com/5c6d6c45eaa55f57c6367749/65045f093c166fdddb4a94a5_x-65045f0266217.webp"
                        class="card-img-top" alt="img hotel">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <a href="#" class="card-title text-Dark" style="font-weight: bold; cursor: pointer;">
                            Apartment in Quận 4
                        </a>
                        <span class="text-warning mt-2 mt-md-0">&#9733; 5.0 (3)</span>
                    </div>
                    <p class="card-text">8" walk to Nguyen Hue, Fast Wifi, ... <br> 2 beds</p>
                    <p class="card-text">
                        <span>Jun</span>
                        <span class="start-rent">1</span>
                        <span> - </span>
                        <span class="end-rent">6</span>
                    </p>
                    <p class="card-text">
                        <del><span class="total-price ">$32</span></del>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div> -->
    </div>
</div>

@endsection

<script>
function handleChangeIconHeart(icon) {
    icon.classList.toggle('far');
    icon.classList.toggle('fas');
}
</script>
