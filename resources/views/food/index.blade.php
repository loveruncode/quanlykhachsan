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
            @foreach ($food as $key => $value)
                <div class="col mb-4">
                    <div class="card">
                        @php
                            $images = explode(',', $value->image);
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
                    <div class="card-body m-auto align-content-start">
                        <a href="{{route('food.edit', ['id' => $value->id])}}" class="text-dark name" style="font-weight: bold; cursor: pointer;">{{ $value->name }}</a>
                        <p class="text-dark desc">{!! $value->desc !!}</p>
                        <p class="EatTime">{{ $value->eat_time }}</p>
                        <p class="price">${{ \App\Helpers\Helper::formatNumber($value->price) }} VND</p>
                    </div>
                </div>
        </div>
    </div>
    @endforeach
    </div>
@endsection
