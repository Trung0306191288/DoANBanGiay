<?php
namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function DanhSach()
{
    $TieuDe = 'Bảng điều khiển';
    $product = SanPham::all();
    $count_pro = $product->count();
    $order = DonHang::all();
    $count_order = $order->count();
    $total_order = $order->sum('tong_gia');

    $nam_ht = Carbon::now('Asia/Ho_Chi_Minh')->year;
    $thang_ht = Carbon::now('Asia/Ho_Chi_Minh')->month;
    $ngay_ht = Carbon::now('Asia/Ho_Chi_Minh')->day;

    // tổng giá ngày
    $total_order_day = DonHang::whereDate('created_at', Carbon::today())->sum('tong_gia');

    // tổng giá tuần
    $startOfWeek = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek();
    $endOfWeek = Carbon::now('Asia/Ho_Chi_Minh')->endOfWeek();
    $total_order_week = DonHang::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('tong_gia');

    // tổng giá tháng
    $total_order_month = DonHang::whereYear('created_at', $nam_ht)
        ->whereMonth('created_at', $thang_ht)
        ->sum('tong_gia');

    // tổng giá năm
    $total_order_year = DonHang::whereYear('created_at', $nam_ht)->sum('tong_gia');

    // tháng
    $data_month_total = [];
    for ($month = 1; $month <= 12; $month++) {
        $start = Carbon::create($nam_ht, $month, 1)->startOfMonth();
        $end = Carbon::create($nam_ht, $month, 1)->endOfMonth();
        $sum = DonHang::whereBetween('created_at', [$start, $end])->sum('tong_gia');
        $data_month_total[] = $sum;
    }
    $data_month_chart = json_encode($data_month_total);

    // ngày
    $days_in_month = Carbon::now('Asia/Ho_Chi_Minh')->daysInMonth;
    $data_day_total = [];
    for ($day = 1; $day <= $days_in_month; $day++) {
        $date = Carbon::create($nam_ht, $thang_ht, $day)->toDateString();
        $sum_day = DonHang::whereDate('created_at', $date)->sum('tong_gia');
        $data_day_total[] = $sum_day;
    }
    $data_day_chart = json_encode($data_day_total);

    // năm
    $data_year_total = [];
    for ($year = $nam_ht - 4; $year <= $nam_ht; $year++) {
        $sum_year = DonHang::whereYear('created_at', $year)->sum('tong_gia');
        $data_year_total[] = $sum_year;
    }
    $data_year_chart = json_encode($data_year_total);

    // tuần
    $data_week_total = [];
    $startOfYear = Carbon::create($nam_ht, 1, 1)->startOfYear();
    $endOfYear = Carbon::create($nam_ht, 12, 31)->endOfYear();
    $weeks = Carbon::now('Asia/Ho_Chi_Minh')->weeksInYear;

    for ($week = 1; $week <= $weeks; $week++) {
        $startOfWeek = $startOfYear->copy()->addWeeks($week - 1)->startOfWeek();
        $endOfWeek = $startOfYear->copy()->addWeeks($week - 1)->endOfWeek();
        $sum_week = DonHang::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('tong_gia');
        $data_week_total[] = $sum_week;
    }
    $data_week_chart = json_encode($data_week_total);

    return view('admin.dashboard.index', compact('TieuDe', 'count_pro', 'count_order', 'total_order', 'total_order_day', 'total_order_week', 'total_order_month', 'total_order_year', 'data_day_chart', 'data_month_chart', 'data_year_chart', 'data_week_chart'));
}

}
