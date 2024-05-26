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
                            <span class="number-product-admin">{{ $count_pro }}</span>
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
            <div class="panel-body">
                <canvas id="line-chart"></canvas>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    window.onload = function () 
    {
        var lineChart = document.getElementById('line-chart');
        var myChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
                datasets: [
                    {
                        label: 'Doanh thu theo tháng của shop giày cũ',
                        data: {{ $data_month_chart }},
                        backgroundColor: 'rgba(0, 128, 128, 0.3)',
                        borderColor: 'rgba(0, 128, 128, 0.7)',
                        borderWidth: 2
                    }
                ]
            },
        });
    };
</script>