@extends('layouts.app')

@section('content')
<section class="banner">
    <div class="container">
        <div id="bannerCarousel" class="col-lg-12 carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/banner-1.png')}}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/banner-2.png')}}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/banner-3.png')}}" class="d-block w-100" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
        </div>
    </div>
</section>

<section class="pricing">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap copywriting">
                <p class="story">
                    RECOMMENDATION
                </p>
                <h2 class="primary-header">
                    Good Foods of The Day
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-12">
                            <div class="product-card">
                                <img class="card-img-top" src="{{ url('storage/' . $product->image) }}" alt="Card image cap">
                                <h1 class="title">{{ $product->name }}</h1>
                                <p class="desc">
                                    {{ $product->description }}
                                </p>
                                <p class="price">Rp{{ $product->price }}</p>
                                <form action="{{ route('show_product', $product) }}" method="get">
                                    <button type="submit" class="btn btn-master btn-primary w-100 mt-3">Show detail</button>
                                </form>
                                @if (Auth::check() && Auth::user()->is_admin)
                                    <a href="{{ route('edit_product', $product) }}">
                                        <button type="button" class="btn btn-warning w-100 mt-3">Edit Product</button>
                                    </a>
                                    <form action="{{ route('delete_product', $product) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger w-100 mt-3 ">Delete product</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-column justify-content-end align-items-end">
                        <a href="{{ route('create_product') }}">
                            <button type="button" class="btn btn-primary w-100 mt-3">Create Product</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>

                    <div class="card-group m-auto">
                        @foreach ($products as $product)
                            <div class="card m-3" style="width: 18rem;">
                                <img class="card-img-top" src="{{ url('storage/' . $product->image) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ $product->name }}</p>
                                    <form action="{{ route('show_product', $product) }}" method="get">
                                        <button type="submit" class="btn btn-primary">Show detail</button>
                                    </form>
                                    @if (Auth::check() && Auth::user()->is_admin)
                                        <form action="{{ route('delete_product', $product) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger mt-2">Delete product</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection