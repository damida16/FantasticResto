@extends('layouts.app')

@section('content')
<section class="cart">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <h2 class="primary-header ">
                    Cart
                </h2>
            </div>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        @php
            $total_price = 0;
        @endphp
        <div class="row my-5">
            @foreach ($carts as $cart)
            <table class="table" style="background-color: #BBC9DE">
                <tbody>
                    <tr class="align-middle">
                        <td width="18%">
                            <img src="{{ url('storage/' . $cart->product->image) }}" height="120" alt="" style="border-radius: 50%;">
                        </td>
                        <td>
                            <p class="mb-2" style="font-size: 24px;">
                                <strong>Tteokbokki</strong>
                            </p>
                            <p style="color: #FF0000;">
                                <strong>Rp 25.000</strong>
                            </p>
                        </td>
                        <td>
                            <form action="{{ route('update_cart', $cart) }}" method="post">
                                @method('patch')
                                @csrf
                                <div class="input-group mx-auto" style="width: 300px;">
                                    <input type="number" class="form-control" aria-describedby="basic-addon2"
                                        name="amount" value="{{ $cart->amount }}" min="1">
                                    <div class="btn input-group-append">
                                        <button class="btn btn-secondary" type="submit" style="font-size: 14px;">Update amount</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('delete_cart', $cart) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @php
                    $total_price += $cart->product->price * $cart->amount;
                @endphp
                @endforeach
            </table>
            <div class="d-flex flex-column justify-content-end align-items-end">
                <p>Total: Rp{{ $total_price }}</p>
                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary"
                        @if ($carts->isEmpty()) disabled @endif>Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cart') }}</div>

                    <div class="card-body ">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        @php
                            $total_price = 0;
                        @endphp

                        <div class="card-group m-auto">
                            @foreach ($carts as $cart)
                                <div class="card m-3" style="width: 14rem;">
                                    <img class="card-img-top" src="{{ url('storage/' . $cart->product->image) }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                                        <form action="{{ route('update_cart', $cart) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                    name="amount" value={{ $cart->amount }}>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Update
                                                        amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-end">
                            <p>Total: Rp{{ $total_price }}</p>
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                    @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection