<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function index($type)
    {
        if($type == 'chinh-sach') {
            $load_name = 'Chính sách';
        } else if($type == 'payments') {
            $load_name = 'Hình thức thanh toán';
        } else if($type == 'tieu-chi') {
            $load_name = 'Tiêu chí';
        } else if($type == 'tin-tuc') {
            $load_name = 'Tin tức';
        } else if($type == 'danh-gia') {
            $load_name = 'Đánh giá';
        } else {
            $load_name = 'Bài viết';
        }

        $TieuDe = 'Quản lý '.$load_name;
        $type_page = $type;
        $baiviets = Baiviet::where('loai',$type)->get()->sortBy('id');
        return view('admin.baiviets.danh-sach_baiviet', compact('baiviets','TieuDe','type_page'));
    }

    public function LoadAddBaiviets($type)
    {
        if($type == 'chinh-sach') {
            $load_name = 'Chính sách';
        } else if($type == 'payments') {
            $load_name = 'Hình thức thanh toán';
        } else if($type == 'tieu-chi') {
            $load_name = 'Tiêu chí';
        } else if($type == 'tin-tuc') {
            $load_name = 'Tin tức';
        } else if($type == 'danh-gia') {
            $load_name = 'Đánh giá';
        } else {
            $load_name = 'Bài viết';
        }

        $TieuDe = 'Thêm '.$load_name;
        $type_page = $type;
        $update = NULL;
        return view('admin.baiviets.them_baiviet', compact('update','TieuDe','type_page'));
    }

    public function handleAddBaiviets(Request $data,$type)
    {
        $add = new Baiviet;
        $data->validate(
            [
                'name_baiviet' => 'required',
                'photo_baiviet' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name_baiviet.required' => 'Tên bài viết không được trống',
                'photo_baiviet.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_baiviet.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            ]
        );
        if($data->photo_baiviet != NULL) {
            $images = $data->photo_baiviet;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/baiviets'), $imageName);
            $add->hinh_anh = $imageName;
        }
        $add->ten = $data->name_baiviet;
        $add->mo_ta = $data->desc_baiviet;
        $add->noi_dung = $data->content_baiviet;
        $add->loai = $type;
        $add->tinh_trang = $data->status_baiviet;
        $add->save();
        return redirect()->route('bai_viets',[$type])->with('noti','Thêm bài viết thành công !!!');
    }

    public function loadUpdateBaiviets($id,$type) {
        if($type == 'chinh-sach') {
            $load_name = 'Chính sách';
        } else if($type == 'payments') {
            $load_name = 'Hình thức thanh toán';
        } else if($type == 'tieu-chi') {
            $load_name = 'Tiêu chí';
        } else if($type == 'tin-tuc') {
            $load_name = 'Tin tức';
        } else if($type == 'danh-gia') {
            $load_name = 'Đánh giá';
        } else {
            $load_name = 'Bài viết';
        }
        $TieuDe = 'Chỉnh sửa '.$load_name;
        $type_page = $type;
        $update = Baiviet::find($id);
        if ($update == null) {
            return view('baiviets');
        } else {
            return view('admin.baiviets.them_baiviet', compact('update','TieuDe','type_page'));
        }
    }

    public function handleUpdateBaiviets(Request $data, $id, $type)
    {
        $add = Baiviet::find($id);
        $data->validate(
            [
                'name_baiviet' => 'required',
                'photo_baiviet' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name_baiviet.required' => 'Tên bài viết không được trống',
                'photo_baiviet.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_baiviet.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            ]
        );
        if($data->photo_baiviet != NULL) {
            if($add['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/baiviets/'.$add['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->photo_baiviet;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/baiviets'), $imageName);
            $add->hinh_anh = $imageName;
        }
        $add->ten = $data->name_baiviet;
        $add->mo_ta = $data->desc_baiviet;
        $add->noi_dung = $data->content_baiviet;
        $add->loai = $type;
        $add->tinh_trang = $data->status_baiviet;
        $add->save();
        return redirect()->route('bai_viets',[$type])->with('noti','Cập nhật bài viết thành công !!!');
    }

    public function deleteBaiviets($id, $type)
    {
        $delete = Baiviet::find($id);
        
        if($delete == null || $delete -> deleted_at != NUll){
            return view('bai_viets');
        }else{
            if($delete['hinh_anh']) {
                $removeFile = public_path('upload/baiviets/'.$delete['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            // $delete-> delete();
            // return redirect()->route('bai_viets',[$type])->with('noti','Xoá  bài viết thành công !!!');
        }
        $delete-> delete();
        return redirect()->route('bai_viets',[$type])->with('noti','Xoá  bài viết thành công !!!');
    }
    public function searchBaiviets(Request $data, $type)
    {
        $TieuDe = 'Tìm kiếm bài viết';
        $type_page = $type;
        $search = Baiviet::where([
            ['ten', 'LIKE', '%'.$data->name_search.'%'],
            ['loai',$type]
        ])->get();
        return view('admin.baiviets.tim-kiem_baiviet', compact('search','TieuDe','type_page'));
    }
}
