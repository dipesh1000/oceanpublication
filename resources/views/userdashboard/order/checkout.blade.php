@extends('frontend.layouts.app')
@section('content')
<div id="packages_page">
    <div class="our_package_container">
        <div class="container">
            @php
                $totalPrice = 0;
                $invoice_no = date("Ymd").time();
            @endphp
            <div class="row">
                <div class="col-md-8 mt-5">
                    <div class="row">
                        @foreach ($courses as $course)
                        @php
                            $totalPrice += $course->offer_price
                        @endphp
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ $course->image }}" alt="product1">
                                <div class="card-group">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $course->title }}</h5>
                                            {{-- <p class="card-text text-muted">{!! substr(strip_tags($course->description), 0 , 100) !!}</p> --}}
                                            <h4 class="card-text text-center">
                                            <span class="badge badge-success"><sup>Rs.</sup>{{ $course->offer_price }}</span>
                                        </h4>
                                        </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <h3> Pay With Esewa</h3>
                        <div class="card-group">
                            <div class="card-body">
                                <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                    <input value="{{ $totalPrice }}" name="tAmt" type="hidden">
                                    <input value="{{ $totalPrice }}" name="amt" type="hidden">
                                    <input value="0" name="txAmt" type="hidden">
                                    <input value="0" name="psc" type="hidden">
                                    <input value="0" name="pdc" type="hidden">
                                    <input value="epay_payment" name="scd" type="hidden">
                                    <input value="{{ $invoice_no }}" name="pid" type="hidden">
                                    <input value="{{ URL::to('/esewa/success') }}" type="hidden" name="su">
                                    <input value="{{ URL::to('/esewa/failure') }}" type="hidden" name="fu">
                                    <input src="{{ asset('assets/esewa.png') }}" type="image" alt="submit" style="height:29px; Width:auto;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection