@extends('frontend.layouts.app')
@section('content')
<div id="packages_page">
    <div class="our_package_container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    @foreach ($courses as $course)
                    <div class="card">
                        <img class="card-img-top" src="{{ getCoursesByModel($course)->image }}" alt="product1">
                        <div class="card-group">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ getCoursesByModel($course)->title }}</h5>
                                    <p class="card-text text-muted">{{ getCoursesByModel($course)->description }}</p>
                                    <h4 class="card-text text-center">
                                    <span class="badge badge-success"><sup>Rs.</sup>{{ getCoursesByModel($course)->offer_price }}</span>
                                </h4>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6 mt-5">
                    <div class="card">
                        <h3> Pay With Esewa</h3>
                        <div class="card-group">
                            <div class="card-body">
                                <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                <input value="{{ $masterOrder->grandTotal }}" name="tAmt" type="hidden">
                                    <input value="{{ $masterOrder->grandTotal }}" name="amt" type="hidden">
                                    <input value="0" name="txAmt" type="hidden">
                                    <input value="0" name="psc" type="hidden">
                                    <input value="0" name="pdc" type="hidden">
                                    <input value="epay_payment" name="scd" type="hidden">
                                    <input value="{{ $masterOrder->invoice_no }}" name="pid" type="hidden">
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