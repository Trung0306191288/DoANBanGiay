<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baiviet;

class ChiTietBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TieuDe = 'Tin tức';
        $newsList = Baiviet::where('loai', 'tin-tuc')
            ->where('tinh_trang', '1')
            ->paginate(20);

        return view('client.tin-tuc.index', compact('TieuDe', 'newsList'));
    }

    public function detail(Request $request)
    {
        $TieuDe = 'Tin tức';
        $newsDetail = Baiviet::where('loai', 'tin-tuc')
            ->where('id', $request->id)
            ->first();

        return view('client.tin-tuc.detail', compact('TieuDe', 'newsDetail'));
    }
}
