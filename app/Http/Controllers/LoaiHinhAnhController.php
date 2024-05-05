<?php

namespace App\Http\Controllers;

use App\Models\LoaiHinhAnh;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class LoaiHinhAnhController extends Controller
{
    public function index($loai,$cate) {
        $pageName = 'Quản lý Loại Hình Ảnh';
        if($cate == 'man') {
            $photo = LoaiHinhAnh::where('loai',$loai)->get();
            $loai_man = $loai;
            return view('admin.hinh-anh.danh-sach', compact('photo','pageName','loai_man'));
        } else if($cate == 'static') {
            $loai_man = $loai;            
            $photo = LoaiHinhAnh::where('loai',$loai)->get()->toArray();
            if($photo != null) {
                $convert_photo = LoaiHinhAnh::where('loai',$loai)->firstOrFail();
            } else {
                $convert_photo = NULL;
            }
            return view('admin.hinh-anh-tinh.them', compact('convert_photo','pageName','loai_man'));  
        } else if($cate == 'video') {
            $loai_man = $loai;            
            $photo = LoaiHinhAnh::where('loai',$loai)->get()->toArray();
            if($photo != null) {
                $convert_photo = LoaiHinhAnh::where('loai',$loai)->firstOrFail();
            } else {
                $convert_photo = NULL;
            }
            return view('admin.video.them', compact('convert_photo','pageName','loai_man'));  
        } else {
            $pageName = 'Bảng điều kiển';
            return  view('admin.index', compact('pageName'));  
        }
    }

    public function themLoaiHinhAnh($loai,$cate) {
        $pageName = 'Thêm Loại Hình Ảnh';
        $loai_man = $loai;
        $update = null;
        if($cate == 'man') {
            return view('admin.hinh-anh.them', compact('pageName','update','loai_man'));
        }
    }

    public function xulyThemLoaiHinhAnh(Request $data, $loai, $cate) {
        $add = new LoaiHinhAnh;
        $data->validate(
            [
                'photo_man' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            ],
            [
                'photo_man.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg , webp',
                'photo_man.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 3MB',
            ]
        );
        if($data->photo_man != NULL) {
            $images = $data->photo_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/loaihinhanh'), $imageName);
            $add->hinh_anh = $imageName;
        }
        if($data->video_man != NULL) {
            $images = $data->video_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/file'), $imageName);
            $add->file = $imageName;
        }
        $add->loai = $loai;
        $add->ten = $data->photo_name;
        $add->link = $data->photo_link;
        if($cate == 'man') {
            $add->save();
            return redirect()->route('LayDsLoaiHinhAnh',[$loai,$cate])->with('noti','Thêm hình ảnh thành công !');
        } else {
            $add->save();
            return redirect()->route('LayDsLoaiHinhAnh',[$loai,$cate])->with('noti','Thêm hình ảnh thành công !');
        }
    }

    public function capnhatLoaiHinhAnh($id, $loai, $cate)
    {
        $pageName = 'Cập nhật loại hình ảnh';
        $update = LoaiHinhAnh::find($id);
        $loai_man = $loai;

        if ($update == null) {
            return view('LayDsLoaiHinhAnh');
        } else {
            return view('admin.hinh-anh.them', compact('pageName','update','loai_man'));
        }
    }

    public function xulyCapNhatLoaiHinhAnh(Request $data, $id, $loai, $cate) {
        $add = LoaiHinhAnh::find($id);
        $data->validate(
            [
                'photo_man' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'photo_man.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_man.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 3MB',
            ]
        );

        if($data->photo_man != NULL) {
            if($add['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/loaihinhanh/'.$add['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->photo_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/loaihinhanh/'), $imageName);
            $add->hinh_anh = $imageName;
        }
        if($data->video_man != NULL) {
            if($add['file'] != NULL) {
                $removeFile = public_path('upload/file/'.$add['file']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->video_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/file/'), $imageName);
            $add->file = $imageName;
        }
        $add->loai = $loai;
        $add->ten = $data->photo_name;
        $add->link = $data->photo_link;
        if($cate == 'man') {
            $add->save();
            return redirect()->route('LayDsLoaiHinhAnh',[$loai,$cate])->with('noti','Cập nhật hình ảnh thành công !');
        } else {
            $add->save();
            return redirect()->route('LayDsLoaiHinhAnh',[$loai,$cate])->with('noti','Cập nhật hình ảnh thành công !');
        }
    }

    public function xoaLoaiHinhAnh($id, $loai, $cate)
    {
        $dlt = LoaiHinhAnh::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('LayDsLoaiHinhAnh');
        } else {
            if($dlt['hinh_anh'] != NULL) {
                $removeFile = public_path('upload/loaihinhanh/'.$dlt['hinh_anh']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('LayDsLoaiHinhAnh',[$loai,$cate])->with('noti', 'Xóa dữ liệu thành công');;
        }
    }
}
