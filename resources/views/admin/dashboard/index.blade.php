<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Carbon\Carbon;
?>

@extends('admin.index')
@section('body')
    <div class="box_dashboard">
        <div class="top_dashboard">
            <div class="tools-dashboard row mb-2 text-sm">
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="{{ route('LayDsSanPham') }}" title="Tổng sản phẩm">
                        <span class="my-info-box-icon info-box-icon bg-success"><ion-icon name="storefront-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Tổng sản phẩm</span>
                            <span class="number-product-admin">{{ $count_pro }}</span>
                            <span class="info-box-number">Xem ngay</span>
                        </div>
                    </a>
                </div>
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="{{ route('LayDsDonHang') }}" title="Tổng đơn hàng">
                        <span class="my-info-box-icon info-box-icon bg-danger"><ion-icon name="bag-handle-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Tổng đơn hàng</span>
                            <span class="number-product-admin">{{ $count_order }}</span>
                            <span class="info-box-number">Xem ngay</span>
                        </div>
                    </a>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="" title="Tổng doanh thu">
                        <span class="my-info-box-icon info-box-icon bg-info"><ion-icon name="cash-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Tổng doanh thu</span>
                            <span class="number-product-admin">@convert($total_order)</span>
                        </div>
                    </a>
                </div>
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="" title="Doanh thu ngày hôm nay">
                        <span class="my-info-box-icon info-box-icon bg-info"><ion-icon name="cash-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Doanh thu ngày hôm nay</span>
                            <span class="number-product-admin">@convert($total_order_day)</span>
                        </div>
                    </a>
                </div>
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="" title="Doanh thu tuần này">
                        <span class="my-info-box-icon info-box-icon bg-info"><ion-icon name="cash-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Doanh thu tuần này</span>
                            <span class="number-product-admin">@convert($total_order_week)</span>
                        </div>
                    </a>
                </div>
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="" title="Doanh thu tháng này">
                        <span class="my-info-box-icon info-box-icon bg-info"><ion-icon name="cash-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Doanh thu tháng này</span>
                            <span class="number-product-admin">@convert($total_order_month)</span>
                        </div>
                    </a>
                </div>
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="" title="Doanh thu năm nay">
                        <span class="my-info-box-icon info-box-icon bg-info"><ion-icon name="cash-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Doanh thu năm nay</span>
                            <span class="number-product-admin">@convert($total_order_year)</span>
                        </div>
                    </a>
                </div>
                <div class="cols-dashboard col-12 col-sm-6 col-md-3">
                    <a class="my-info-box info-box" href="{{ route('xu_ly_doi_mat_khau_admin') }}" title="Đổi mật khẩu">
                        <span class="my-info-box-icon info-box-icon bg-primary"><ion-icon name="key-outline"></ion-icon></span>
                        <div class="info-box-content text-dark">
                            <span class="info-box-text text-capitalize">Đổi mật khẩu</span>
                            <span class="info-box-number">Đổi mật khẩu</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bottom_dashboard">
            <div class="tabs-pro-detail">
                <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="admin-theo-ngay" data-bs-toggle="tab" href="#theongay" role="tab">Thống kê theo ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="admin-theo-tuan" data-bs-toggle="tab" href="#theotuan" role="tab">Thống kê theo tuần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="admin-theo-thang" data-bs-toggle="tab" href="#theothang" role="tab">Thống kê theo tháng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="admin-theo-nam" data-bs-toggle="tab" href="#theonam" role="tab">Thống kê theo năm</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="theongay" role="tabpanel">
                        <div class="panel-body">
                            <canvas id="day-chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="theotuan" role="tabpanel">
                        <div class="panel-body">
                            <canvas id="week-chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="theothang" role="tabpanel">
                        <div class="panel-body">
                            <canvas id="month-chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="theonam" role="tabpanel">
                        <div class="panel-body">
                            <canvas id="year-chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection

<script type="text/javascript">
    window.onload = function () {
        const dayData = @json($data_day_chart);
        const weekData = @json($data_week_chart);
        const monthData = @json($data_month_chart);
        const yearData = @json($data_year_chart);
        const currentYear = {{ now()->year }};
        const daysInMonth = {{ \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->daysInMonth }};
        const weeksInYear = {{ \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->weeksInYear }};

        console.log('Day Data:', dayData);
        console.log('Week Data:', weekData);
        console.log('Month Data:', monthData);
        console.log('Year Data:', yearData);

        // Line chart for total prices by day
        var dayChart = document.getElementById('day-chart');
        new Chart(dayChart, {
            type: 'line',
            data: {
                labels: Array.from({ length: daysInMonth }, (_, i) => i + 1),
                datasets: [{
                    label: 'Doanh thu theo ngày',
                    data: JSON.parse(dayData),
                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                    borderColor: 'rgba(0, 128, 128, 0.7)',
                    borderWidth: 2
                }]
            }
        });

        // Line chart for total prices by week
        var weekChart = document.getElementById('week-chart');
        new Chart(weekChart, {
            type: 'line',
            data: {
                labels: Array.from({ length: weeksInYear }, (_, i) => 'Tuần ' + (i + 1)),
                datasets: [{
                    label: 'Doanh thu theo tuần',
                    data: JSON.parse(weekData),
                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                    borderColor: 'rgba(0, 128, 128, 0.7)',
                    borderWidth: 2
                }]
            }
        });

        // Line chart for total prices by month
        var monthChart = document.getElementById('month-chart');
        new Chart(monthChart, {
            type: 'line',
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
                datasets: [{
                    label: 'Doanh thu theo tháng',
                    data: JSON.parse(monthData),
                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                    borderColor: 'rgba(0, 128, 128, 0.7)',
                    borderWidth: 2
                }]
            }
        });

        // Line chart for total prices by year
        var yearChart = document.getElementById('year-chart');
        new Chart(yearChart, {
            type: 'line',
            data: {
                labels: Array.from({ length: 5 }, (_, i) => currentYear - 4 + i),
                datasets: [{
                    label: 'Doanh thu theo năm',
                    data: JSON.parse(yearData),
                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                    borderColor: 'rgba(0, 128, 128, 0.7)',
                    borderWidth: 2
                }]
            }
        });
    };
</script>
