@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{ asset('owner/assets/css/cs-updateorder.css') }}">
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('admin') }}">Dashboard</a></li>
                                <li><a href="#">Quản Lý Đơn Hàng</a></li>
                                <li class="active">Cập nhật Đơn Hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Orders </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>ID</th>
                                                <th>MÃ ĐẶT HÀNG</th>
                                                <th>TÊN NGƯỜI DÙNG</th>
                                                <th>SỐ SẢN PHẨM</th>
                                                <th>SỐ LƯỢNG</th>
                                                <th>TỔNG TIỀN</th>
                                                <th>GIẢM GIÁ</th>
                                                <th>THÀNH TIỀN</th>
                                                <th>NGÀY ĐẶT HÀNG</th>
                                                <th class="status">TRẠNG THÁI</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-order">
                                            <?php $count = 1; ?>
                                            @forelse($orders as $order)
                                                <tr>
                                                    <td class="serial">{{ $count++ }}.</td>
                                                    <td class="order_id">#{{ $order->order_id }}</td>
                                                    <td><span class="order_code">{{ $order->order_code }}</span></td>
                                                    <td><span class="name">{{ $order->username }}</span></td>
                                                    <td><span class="total_product d-flex">
                                                            {{ $order->total_product }}
                                                            <a href="{{ url('view-order' . $order->order_id) }}"
                                                                class="fa fa-eye view-products"
                                                                onclick="showProduct(event)">
                                                            </a>
                                                        </span></td>
                                                    <td><span class="count">{{ $order->total_quantity }}</span></td>
                                                    <td><span class="count-float">{{ $order->total_price }}</span>đ</td>
                                                    <td>
                                                        <span class="count-float">
                                                            {{ $order->total_price - $order->total_amount }}</span>đ
                                                    </td>
                                                    <td><span class="count-float">{{ $order->total_amount }}</span>đ</td>
                                                    <td><span class="order_date">{{ $order->order_date }}</span></td>
                                                    <td class="d-flex active">
                                                        @if ($order->status == 'đang chờ')
                                                            <a href="{{ url('update-status-order' . $order->order_id) }}"
                                                                class="badge badge-pending">
                                                                {{ $order->status }}
                                                            </a>
                                                        @else
                                                            <span class="badge badge-complete">{{ $order->status }}</span>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>
                                                        <p>No Orders</p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal">
        <div class="container-modal js-container-modal">
            <a class="close-modal js-close-container">
                <i class="close-icon ti-close" onclick="hideProducts()"></i>
            </a>
            <div class="content-form">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12 rs-pd">
                            <div class="card">
                                <a class="close-modal js-close-container">
                                    <i class="close-icon ti-close" onclick="hideProducts()"></i>
                                </a>
                                <div class="w-100 card-header text-center font-2xl "><span class="font-weight-bold ">CHI
                                        TIẾT</span><span class="font-weight-light"> ĐƠN HÀNG</span>
                                </div>

                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Người Dùng </th>
                                                    <th>Sản Phẩm</th>
                                                    <th>Số Lượng</th>
                                                    <th>Đơn Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbody-order-detail">

                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert_order')
    @include('sweetalert::alert_order', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="clearfix"></div>
@endsection
@section('js')
<script src="{{ asset('owner/assets/js/updateorder.js') }}"></script>
@endsection
