@extends('layouts.client')
@section('css')
@endsection
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('client/images/bg1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Thanh toán</a></span> <span>tại nhà</span>
                    </p>
                    <h1 class="mb-0 bread">Thủ thục thanh toán</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form action="check-payment-detail" method="post" class="billing-form">
                        {{ csrf_field() }}
                        <h3 class="mb-4 billing-heading">Chỉ tiết thanh toán</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Tên đệm</label>
                                    <input type="text" class="form-control" placeholder="" name="firstName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Họ</label>
                                    <input type="text" class="form-control" placeholder="" name="lastName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Số nhà và tên đường"
                                        name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Tỉnh / Thành phố</label>
                                    <input type="text" class="form-control" placeholder="" name="province">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Địa chỉ Email</label>
                                    <input type="text" class="form-control" placeholder="" name="email">
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->
                    {{-- @if (count((array) session('cart')) > 0)
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2" value="bankAccount"
                                                    re=""> Tài khoản ngân
                                                hàng </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2" value="handMoney">
                                                Thanh
                                                toán khi
                                                nhận hàng </label>
                                        </div>
                                    </div>
                                </div>
                                <p><button class="btn btn-primary py-3 px-4 btn-order" id="btn_1">Đặt hàng</button>
                                </p>
                            </div>
                        </div>
                        @endif --}}
                </div>
                @php
                    $pay = session()->get('payment');
                    $total = $pay['total'];
                    $feeShip = $pay['feeShip'];
                    $discount = $pay['discount'] == '' ? '0' : $pay['discount'];
                    $totalPrice = $pay['totalPrice'];
                @endphp
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Thông tin thanh toán</h3>
                                <p class="d-flex">
                                    <span>Tổng tiền</span>
                                    <span>{{ $total }}đ</span>
                                </p>
                                <p class="d-flex">
                                    <span>Phí Vận chuyển</span>
                                    <span>{{ $feeShip }}đ</span>
                                </p>
                                <p class="d-flex">
                                    <span>Giảm giá</span>
                                    <span>{{ $discount }}</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Thành tiền</span>
                                    <span>{{ $totalPrice }}đ</span>
                                </p>
                            </div>
                        </div>
                        @if (count((array) session('cart')) > 0)
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" class="mr-2"
                                                        value="bankAccount" re> Tài khoản ngân
                                                    hàng </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" class="mr-2"
                                                        value="handMoney"> Thanh toán khi
                                                    nhận hàng </label>
                                            </div>
                                        </div>
                                    </div>
                                    <p><button class="btn btn-primary py-3 px-4 btn-order" id="btn_1">Đặt
                                            hàng</button>
                                    </p>
                                @else
                        @endif
                    </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
        </div>
        </div>
    </section> <!-- .section -->

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Đăng ký bản tin của chúng tôi</h2>
                    <span>Nhận thông tin cập nhật qua e-mail về các cửa hàng mới nhất của chúng tôi và các ưu đãi đặc
                        biệt</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ Email">
                            <input type="submit" value="Đăng kí" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert_checkout')
    @include('sweetalert::alert_checkout', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.btn-order').click(function(e) {
                var paymentMethod = $('input[type=radio]:checked').val();
                $('.billing-form').attr('action', "check-payment-detail/" + paymentMethod);
                console.log($('.billing-form').attr('action'));
                $('.billing-form').submit();
            })
        });
    </script>
@endsection
