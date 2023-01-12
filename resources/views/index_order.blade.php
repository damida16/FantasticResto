@extends('layouts.app')

@section('content')
<section class="dashboard">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <h2 class="primary-header ">
                    Order History
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @foreach ($order as $orders)
            <table class="table">
                <tbody>
                    <tr class="align-middle justify-content-center">
                        <td width="20%">
                            <img src="assets/images/item.png" height="120" alt="" style="border-radius: 50%;">
                        </td>
                        <td>
                            <p class="mb-2">
                                <a href="{{ route('show_order', $orders) }}">
                                    <h5 class="card-title">Order ID {{ $orders->id }}</h5>
                                </a>
                            </p>
                            <p>
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $orders->user->name }}</h6>
                            </p>
                        </td>
                        <td>
                            <p>
                                {{ $orders->created_at->format('d M, Y') }}
                            </p>
                        </td>
                        <td>
                            @if ($orders->is_paid == true)
                                <p class="card-text">Paid</p>
                            @else
                                <p class="card-text">Unpaid</p>
                                @if ($orders->payment_receipt)
                                    <div class="d-flex flew-row justify-content-around">
                                    <a href="{{ url('storage/' . $orders->payment_receipt) }}" 
                                        class="btn btn-primary">Show payment receipt</a>
                                        @if (Auth::user()->is_admin)
                                            <form action="{{ route('confirm_payment', $orders) }}" method="post">
                                                @csrf
                                                <button class="btn btn-success" type="submit">Confirm</button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if (Auth::check() && Auth::user()->user)
                            <a href="{{route('index_product')}}" class="btn btn-primary">
                                Re-order
                            </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>
    </div>
</section>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Order History</h4>
                    </div>

                    <div class="card-body m-auto">
                        @foreach ($order as $orders)
                            <div class="card mb-2" style="width: 30rem;">
                                <div class="card-body">
                                    <a href="{{ route('show_order', $orders) }}">
                                        <h5 class="card-title">Order ID {{ $orders->id }}</h5>
                                    </a>
                                    <h6 class="card-subtitle mb-2 text-muted">By {{ $orders->user->name }}</h6>

                                    @if ($orders->is_paid == true)
                                        <p class="card-text">Paid</p>
                                    @else
                                        <p class="card-text">Unpaid</p>
                                        @if ($orders->payment_receipt)
                                            <div class="d-flex flew-row justify-content-around">
                                                <a href="{{ url('storage/' . $orders->payment_receipt) }} "
                                                    class="btn btn-primary">Show payment
                                                    receipt</a>
                                                @if (Auth::user()->is_admin)
                                                    <form action="{{ route('confirm_payment', $orders) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-success" type="submit">Confirm</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
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