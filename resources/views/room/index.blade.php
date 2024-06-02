@extends('layout.master')

@section('content')

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
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
                        <h5 class="card-title">Apartment in Quận 4</h5>
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
                        <span class="total-price text-decoration-line-through">$32</span>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- test =)) -->
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
                        <h5 class="card-title">Apartment in Quận 4</h5>
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
                        <span class="total-price text-decoration-line-through">$32</span>
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
                        <h5 class="card-title">Apartment in Quận 4</h5>
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
                        <span class="total-price text-decoration-line-through">$32</span>
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
                        <h5 class="card-title">Apartment in Quận 4</h5>
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
                        <span class="total-price text-decoration-line-through">$32</span>
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
                        <h5 class="card-title">Apartment in Quận 4</h5>
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
                        <span class="total-price text-decoration-line-through">$32</span>
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
                        <h5 class="card-title">Apartment in Quận 4</h5>
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
                        <span class="total-price text-decoration-line-through">$32</span>
                        <span class="price-selling text-danger" style="font-weight: 700;">$26</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
function handleChangeIconHeart(icon) {
    icon.classList.toggle('far');
    icon.classList.toggle('fas');
}
</script>