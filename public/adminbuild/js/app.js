$('.tab_zoom').click(function() {
    if ($(this).hasClass('act')) {
        $('.left_nav_menu').removeClass('act');
        $('.right_nav_menu').removeClass('act');
        $(this).removeClass('act');
    } else {
        $('.left_nav_menu').addClass('act');
        $('.right_nav_menu').addClass('act');
        $(this).addClass('act');
    }
});

$('.list_nav_menu li').click(function() {
    if ($(this).hasClass('act')) {
        $(this).removeClass('bgk_act');
    } else {
        $(this).addClass('bgk_act');
    }
});

$('.list_nav_menu li p').click(function() {
    var vitri = $(this).data('vitri');
    if ($(this).hasClass('act')) {
        $('.ul_child').removeClass('act');
        $(this).removeClass('act');
    } else {
        $('.ul_child').removeClass('act');
        $('.ul_child_' + vitri).addClass('act');
        $(this).addClass('act');
    }
});

$(document).on('click', '.click_act', function() {
    if ($(this).hasClass('act')) {
        $('.ul_noti').removeClass('act');
        $(this).removeClass('act');
    } else {
        $('.ul_noti').addClass('act');
        $(this).addClass('act');
    }
});

$(document).on('click', '.flex_avt img', function() {
    if ($(this).hasClass('act')) {
        $('.ul_avt').removeClass('act');
        $(this).removeClass('act');
    } else {
        $('.ul_avt').addClass('act');
        $(this).addClass('act');
    }
});

$(document).on('change', '#cate_product_up', function() {
    var id_cap_mot = $(this).val();
    $.ajax({
        type: 'GET',
        url: "../loadcapmot",
        data: {
            id_cap_mot: id_cap_mot
        },
    }).done(function(respose) {
        if (respose != null) {
            var res = '';
            res = '<option selected value="">Chọn danh mục cấp hai</option>'
            $.each(respose, function(key, value) {
                res += '<option value="' + value.id + '">' + value.ten + '</option>';
            });
            $('#cate_two_product').html(res);
        }
    });
});

$(document).on('change', '#cate_product_add', function() {
    var id_cap_mot = $(this).val();
    $.ajax({
        type: 'GET',
        url: "../loadcapmot",
        data: {
            id_cap_mot: id_cap_mot
        },
    }).done(function(respose) {
        if (respose != null) {
            var res = '';
            res = '<option selected value="">Chọn danh mục cấp hai</option>'
            $.each(respose, function(key, value) {
                res += '<option value="' + value.id + '">' + value.ten + '</option>';
            });
            $('#cate_two_product').html(res);
        }
    });
});

$(document).on('click', '.delete_main', function() {
    Swal.fire({
        title: 'Bạn chắc chắn xóa mục này?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Xóa',
        denyButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).data('id');
            var type = $(this).data('type');
            var type_man = $(this).data('type_man');
            var type_baiviets = $(this).data('type_baiviets');
            var cate = $(this).data('cate');
            if (type_man != '' && cate == 'man') {
                window.location.href = '../../' + type + '/delete/' + id + '/' + type_man + '/' + cate;
            } else if (type_baiviets != '' && type_baiviets != null) {
                window.location.href = '../' + type + '/delete/' + id + '/' + type_baiviets;
            } else {
                window.location.href = type + '/xoa/' + id;
            }
            Swal.fire('Xóa thành công!', '', 'success')
        } else if (result.isDenied) {
            Swal.fire('Hoàn tác!', '', 'info')
        };
    });
});

$(document).on('change', '#status_product_ajax', function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "ajax_loadstatus",
        data: {
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});

$(document).on('change', '#status_product_ajax_1', function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "ajax_loadstatushot",
        data: {
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});


$(document).on('change', '#status_product_ajax_2', function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "ajax_loadstatusnew",
        data: {
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});


$(document).on('change', '#status_brand_ajax', function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "ajax_loadstatusbrand",
        data: {
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});

$(document).on('change', '#status_cate_ajax', function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "ajax_loadstatuscate",
        data: {
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});

$(document).on('change', '#status_cate1_ajax', function() {
    var id_status = $(this).val();
    var id_cate1 = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "ajax_loadstatuscateone",
        data: {
            id_status: id_status,
            id_cate1: id_cate1
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});

$(document).on('change', '#status_blog_ajax', function() {
    var id_status = $(this).val();
    var id_blog = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "../ajax_loadstatusblog",
        data: {
            id_status: id_status,
            id_blog: id_blog
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});

$(document).on('change', '#status_member', function() {
    var id_status = $(this).val();
    var id_member = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "ajax_loadstatusmember",
        data: {
            id_status: id_status,
            id_member: id_member
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Cập nhật trạng thái thành công !', '', 'success')
        }
    });
});

$(document).on('click', '.btn_dlt_gallery', function() {
    var id_photo = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: "../../ajax_deletegallery",
        data: {
            id_photo: id_photo
        },
    }).done(function(respose) {
        if (respose != null) {
            Swal.fire('Xóa ảnh thành công!', '', 'success')
            setTimeout(function() {
                location.reload();
            }, 300);
        }
    });
});

$(document).on('change', '#select_status_order', function() {
    var id_status_order = $(this).val();

    $.ajax({
        type: 'GET',
        url: "ajax_searchorder",
        data: {
            id_status_order: id_status_order
        },
    }).done(function(respose) {
        if (respose != '') { 
            var res = '';
            $.each(respose, function(key, value) {
                res +=
                '<tr>'+
                    '<td class="text-center">'+
                        '<input class="sty_checkbox form-check-input" type="checkbox">'+
                    '</td>'+
                    '<td style="width: 30px;" class="text-center">'+ (key + 1) +'</td>'+
                    '<td>'+
                        '<a href="orders/detail/'+value.id+'">'+value.code_order+'</a>'+
                    '</td>'+
                    '<td>'+value.name+'</td>'+
                    '<td style="color:#ec2d3f;font-weight:bold;">'+value.total_price+'</td>'+
                    '<td>'+ value.name_payments +'</td>'+
                    '<td class="text-center" style="width: 175px;">'+value.status_order+'</td>'+
                    '<td class="text-center" style="width: 175px;">'+value.status_payment+'</td>'+
                    '<td class="text-center">'+
                        '<div class="flex_options">'+
                            '<a href="orders/detail/'+value.id+'"><span>'+
                                    '<ion-icon name="create-outline"></ion-icon>'+
                                '</span></a>'+
                            '<a class="delete_main" data-id="'+value.id+'" data-type="orders"><span>'+
                                    '<ion-icon name="trash-outline"></ion-icon>'+
                                '</span></a>'+
                        '</div>'+
                    '</td>'+
                '</tr>';
            });
            $('.alert_ajax').removeClass('act');
            $('.load_search').html(res);
            $('#select_status_payments').prop('disabled', true);
            $('#customRange2').prop('disabled', true);
        } else {
            $('.alert_ajax').addClass('act');
            $('.load_search').html('<tr></tr>');
        }
    });
});

$(document).on('click','.btn_change_range',function() {
    var khoang_gia = $('.range_test').val();
    $('.hidden_range').removeClass('active_hidden');
    if(khoang_gia == 1) {
        $('.range_number').removeClass('act');
        $('.range_number_1').addClass('act');
    } else if(khoang_gia == 2) {
        $('.range_number').removeClass('act');
        $('.range_number_2').addClass('act');
    } else if(khoang_gia == 3) {
        $('.range_number').removeClass('act');
        $('.range_number_3').addClass('act');
    } else if(khoang_gia == 4) {
        $('.range_number').removeClass('act');
        $('.range_number_4').addClass('act');
    } else if(khoang_gia == 5) {
        $('.range_number').removeClass('act');
        $('.range_number_5').addClass('act');
    }
});

$(document).on('click','.btn_reload_alert',function() {
    $('.alert_ajax').removeClass('act');
});
