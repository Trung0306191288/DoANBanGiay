@extends('admin.index')
@section('body')
    <div class="box_dashboard">
        <div class="top_dashboard">
            <div class="flex_dashboard">
                <div class="item_dashboard">
                    <p>Tổng số lượng sản phẩm</p>
                    <span>{{ $count_pro }}</span>
                </div>
                <div class="item_dashboard">
                    <p>Tổng số lượng đơn hàng</p>
                    <span>{{ $count_order }}</span>
                </div>
                <div class="item_dashboard">
                    <p>Tổng doanh thu cửa hàng</p>
                    {{-- <span>@convert($total_order)</span> --}}
                    <span>0</span>
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
                        label: 'Doanh thu theo tháng của cửa hàng',
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