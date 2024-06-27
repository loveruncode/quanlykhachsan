@extends('layout.master')

@section('content')
    <form method="get" action="{{ route('room.search') }}">
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
            @foreach ($room as $key => $value)
                <div class="col mb-4">
                    <div class="card">
                        <div class="position-relative">
                            <div class="row position-absolute" style="width: 100%;">
                                <div class="col-6 col-md-4 d-flex align-items-center">
                                    <div class="p-1 rounded"
                                        style="backdrop-filter: blur(5px); background-color: rgba(145, 140, 127, 0.5); color: white;">
                                        {{ $value->type }}
                                    </div>
                                </div>
                                <div class="col-6 col-md-8 d-flex justify-content-end align-items-center">
                                    <i class="far fa-heart text-danger" style="cursor: pointer;"
                                        onclick="handleChangeIconHeart(this)"></i>
                                </div>
                            </div>
                            @php
                                $images = explode(',', $value->pic);
                            @endphp

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($images as $index => $image)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img class="d-block w-100 h-100 object-fit-cover border rounded"
                                                src="{{ asset('/storage/' . $image) }}" alt="Slide {{ $index + 1 }}">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <span style="font-weight: bold; cursor: pointer;">{{$value->code}}</span>
                                <span>-</span>
                                <a href="{{route('room.edit', ['id' => $value->id])}}" class="card-title text-Dark text-truncate" style="font-weight: bold; cursor: pointer;">
                                    {{ $value->title }}
                                </a>
                                <span class="text-warning mt-2 mt-md-0">&#9733; {{ $value->rating }}.0 (3)</span>
                            </div>
                            <p class="card-text text-truncate">{{ $value->address }}<br> {!! $value->desc !!}</p>

                            <p class="card-text">
                                <span class="start-rent">{{ \App\Helpers\Helper::formatDate($value->start_rent) }}
                                </span>
                                <span> - </span>
                                <span class="end-rent">{{ \App\Helpers\Helper::formatDate($value->end_rent) }}</span>
                            </p>
                            <p class="card-text">
                                <span class="badge badge-warning">Giá Theo Ngày</span>
                                <span>-</span>
                                <span>${{ \App\Helpers\Helper::formatNumber($value->price_per_date) }} VND</span>
                            </p>
                            <p class="card-text">
                                <del><span
                                        class="total-price ">${{ \App\Helpers\Helper::formatNumber($value->price_selling) }}
                                        VND</span></del>
                                <span class="price-selling text-danger"
                                    style="font-weight: 700;">${{ \App\Helpers\Helper::formatNumber($value->total_price) }}
                                    VND</span>
                            </p>
                            <div class="d-flex flex-row-reverse mt-1">
                                <button class="btn btn-danger delete-button"
                                    data-url="{{ route('room.delete', ['id' => $value->id]) }}">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<script>
    function handleChangeIconHeart(icon) {
        icon.classList.toggle('far');
        icon.classList.toggle('fas');
    }
</script>
