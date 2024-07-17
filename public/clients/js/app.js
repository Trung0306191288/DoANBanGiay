// isExist()
function isExist(ele) {
    return ele.length;
}

// Menu Scroll
function MenuScroll() {
    if (isExist($(".header"))) {
        $(".header").addClass("has-scroll");
        var pointHeight = $(".header").outerHeight();
        $(".top-space").css({
            marginTop: pointHeight + "px",
        });
        $(window).scroll(function() {
            if ($(window).scrollTop() > 0) {
                $(".header").addClass("scroll-active");
            } else {
                $(".header").removeClass("scroll-active");
            }
            if (this.oldScroll > this.scrollY === true) {
                $(".header").removeClass("scroll-down");
                $(".header").addClass("scroll-up");
                $(".header").css({
                    top: 0,
                });
            } else {
                let maxScroll =
                    this.scrollY < pointHeight ?
                    this.scrollY :
                    pointHeight + 10;
                $(".header").removeClass("scroll-up");
                $(".header").addClass("scroll-down");
                $(".header").css({
                    top: -maxScroll,
                });
            }
            this.oldScroll = this.scrollY;
        });
    }
}

// Slideshow
function SlideShow() {
    var Swipes = new Swiper(".swiper.swiper-slideshow", {
        loop: true,
        speed: 800,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: ".swiper-button-next.swiper-slide-next",
            prevEl: ".swiper-button-prev.swiper-slide-prev",
        },
        scrollbar: {
            hide: true,
        },
        // pagination: {
        //     el: '.swiper-pagination',
        // },
    });
}

// News
function News() {
    var Swipes = new Swiper(".swiper.swiper-news", {
        loop: false,
        speed: 800,
        slidesPerView: 3,
        spaceBetween: 20,
        autoplay: true,
        navigation: {
            nextEl: ".swiper-button-next.swiper-news-next",
            prevEl: ".swiper-button-prev.swiper-news-prev",
        },
        scrollbar: {
            hide: true,
        },
        // pagination: {
        //     el: '.swiper-pagination',
        // },
    });

    var Swipes = new Swiper(".swiper.swiper-tieuchi", {
        loop: false,
        speed: 800,
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: true,
        navigation: {
            nextEl: ".swiper-button-next.swiper-tieuchi-next",
            prevEl: ".swiper-button-prev.swiper-tieuchi-prev",
        },
        scrollbar: {
            hide: true,
        },
        // pagination: {
        //     el: '.swiper-pagination',
        // },
    });
}
// Tieu-chi
// function Tieuchi() {
//     var Swipes = new Swiper(".swiper.swiper-tieuchi", {
//         loop: false,
//         speed: 800,
//         slidesPerView: 4,
//         spaceBetween: 20,
//         autoplay: true,
//         navigation: {
//             nextEl: ".swiper-button-next.swiper-tieuchi-next",
//             prevEl: ".swiper-button-prev.swiper-tieuchi-prev",
//         },
//         scrollbar: {
//             hide: true,
//         },
//         // pagination: {
//         //     el: '.swiper-pagination',
//         // },
//     });
// }

function eyesOnOff() {
    $(".account__input-icon").on("click", function() {
        if ($(this).find("ion-icon").attr("name") === "eye-off-outline") {
            $(this).find("ion-icon").attr("name", "eye-outline");
            $(this)
                .parents(".account__input-item")
                .find("input")
                .attr("type", "text");
        } else {
            $(this).find("ion-icon").attr("name", "eye-off-outline");
            $(this)
                .parents(".account__input-item")
                .find("input")
                .attr("type", "password");
        }
    });
}

function productGallery() {
    if (isExist($('.product-detail--left-top-left'))) {
        var swiper = new Swiper(".childGallery", {
            loop: true,
            speed: 800,
            spaceBetween: 10,
            slidesPerView: 3,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".parentGallery", {
            loop: true,
            speed: 800,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    }
}

function AlertBoxHandMade(title = '', bgClr = '#ec2d3f') {
    $('.alert-box').addClass('show');
    $('.alert-box').attr('style', '--bg-clr:' + bgClr + ';');
    $('.alert-title').text(title);
    $('.alert-close').click(function() {
        $(this).parent($('.alert-box')).removeClass('show');
    });
    setTimeout(() => {
        $('.alert-close').parent($('.alert-box')).removeClass('show');
    }, 5000);
}

/**
 * Number.prototype.format(n, x)
 * 
 * @param integer n: length of decimal
 * @param integer x: length of sections
 */
Number.prototype.format = function(currency, n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.') + currency;
};

// function findProductPrice() {
//     if (isExist($('.size__item.active')) && isExist($('.color__item.active'))) {
//         var idSize = $('.size__item.active').data('id'),
//             idColor = $('.color__item.active').data('id'),
//             idPrd = $('.product-detail').data('id'),
//             url = $('.product-detail').data('url');

//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             type: 'GET',
//             url: url,
//             dataType: 'json',
//             data: {
//                 idPrd: idPrd,
//                 idSize: idSize,
//                 idColor: idColor
//             },
//             success: function(result) {
//                 var priceNew = result[0].priceNew.format('đ'),
//                     priceOld = result[0].priceOld.format('đ'),
//                     inventory = result[0].inventory;

//                 $(".product-detail__price-new").html(priceNew);
//                 $(".product-detail__price-old").html(priceOld);
//                 $('.cart__item-quantity input').attr('data-max', inventory);
//             }
//         })
//     }
// }


function getSizeId() {
    if (isExist($('.product-detail__storage'))) {
        $('.size__item').on('click', function() {
            $('.size__item.active').removeClass('active');
            $(this).addClass('active');

            findProductPrice();
        });
    }
}

function getColorId() {
    if (isExist($('.product-detail__color'))) {
        $('.color__item').on('click', function() {
            $('.color__item.active').removeClass('active');
            $(this).addClass('active');

            findProductPrice();
        });
    }
}

function AddCart() {
    if (isExist($('.add-cart'))) {
        $('body').on('click', '.add-cart', function() {
            var _this = $(this),
                cmd;

            if (_this.hasClass('out-of-stock')) {
                AlertBoxHandMade('Sản phẩm đã hết hàng!');
                exist();
            }

            if (isExist($('.size__item.active')) && isExist($('.color__item.active'))) {
                var url = _this.data('url');

                if (_this.hasClass('buy-now')) cmd = 1;
                else cmd = 0;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    method: "get",
                    data: {
                        id: _this.data('id'),
                        idSize: _this.parents('form').find('.size__item.active').data('id'),
                        idColor: _this.parents('form').find('.color__item.active').data('id'),
                        quantity: _this.parents("#primary-main").find(".cart__item-quantity input").val(),
                    },
                    success: function(data) {
                        if (cmd === 0) AlertBoxHandMade('Thêm vào giỏ hàng thành công!', '#29bc1b');
                        else window.location.href = "../gio-hang";
                    }
                });
            } else {
                AlertBoxHandMade('Vui lòng chọn màu sắc và kích thước cho sản phẩm!');
            }
        });
    }
}

function UpdateCart(url, id, quantity) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "patch",
        data: {
            id: id,
            quantity: quantity
        },
        success: function(data) {
            window.location.reload();
        }
    });
}

function DeleteCart(url, id) {
    if (confirm("Bạn muốn xóa sản phẩm này khỏi giỏ hàng?")) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: "DELETE",
            data: {
                id: id
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }
}

function UpdateQuantity() {
    $('body').on('click', '.cart__item-quantity-button:not(.detail)', function() {
        var urlUpdate = $(this).parents('.cart__item-quantity').data('url'),
            urlDelete = $(this).parents('.cart__item').find('.remove-from-cart').data('url'),
            idPrd = $(this).parents('.cart__item').data('id'),
            quantity = parseInt($(this).parents('.cart__item-quantity').find('input').val()),
            quantityMax = parseInt($(this).parents('.cart__item-quantity').find('input').data('max')),
            action;

        if ($(this).hasClass('--plus'))
            if (quantity < quantityMax) {
                quantity += 1;
            } else {
                AlertBoxHandMade('Đã tối đa số lượng sản phẩm!');
                return false;
            }
        else quantity -= 1;

        if (quantity >= 1) action = 'update';
        else action = 'delete';

        if (action === 'update') {
            $(this).parents('.cart__item-quantity').find('input').val(quantity);
            UpdateCart(urlUpdate, idPrd, quantity);
        } else {
            DeleteCart(urlDelete, idPrd);
        }
    });
}

function ChangeQuantity() {
    $('body').on('click', '.cart__item-quantity-button.detail', function() {
        var quantity = parseInt($(this).parents('.cart__item-quantity').find('input').val()),
            quantityMin = parseInt($(this).parents('.cart__item-quantity').find('input').data('min')),
            quantityMax = parseInt($(this).parents('.cart__item-quantity').find('input').data('max'));

        if ($(this).hasClass('--plus')) {
            if (quantity < quantityMax) {
                quantity += 1;
            } else {
                AlertBoxHandMade('Đã tối đa số lượng sản phẩm!');
            }
        } else {
            if (quantity > quantityMin) quantity -= 1;
        }

        if (quantity >= 1) action = 'update';

        $(this).parents('.cart__item-quantity').find('input').val(quantity);
    });
}

function DeleteCartDetail() {
    $('body').on('click', '.remove-from-cart', function() {
        var url = $(this).data('url'),
            idPrd = $(this).parents('.cart__item').data('id');

        DeleteCart(url, idPrd);
    })
}

function Ajax_cate_search() {
    $(document).on('change', '#cate_search_index', function() {
        var id_cap_mot = $(this).val();
        var page = $(this).data('page');

        $.ajax({
            type: 'GET',
            url: "../../../ajax_search_cate",
            data: {
                id_cap_mot: id_cap_mot,
                page: page
            },
            success: function(data) {
                if (data != '') {
                    $('.product__list').html(data);
                } else {
                    alert('Không có sản phẩm cần tìm');
                }

            },
        });
    });

    $(document).on('change', '#cate_two_search_index', function() {
        var id_cap_mot = $(this).val();
        var page = $(this).data('page');

        $.ajax({
            type: 'GET',
            url: "../../../ajax_search_cate_two",
            data: {
                id_cap_mot: id_cap_mot,
                page: page
            },
            success: function(data) {
                if (data != '') {
                    $('.product__list').html(data);
                } else {
                    alert('Không có sản phẩm cần tìm');
                }

            },
        });
    });

    $(document).on('change', '#brand_search_index', function() {
        var id_thuong_hieu = $(this).val();
        var page = $(this).data('page');

        $.ajax({
            type: 'GET',
            url: "../../../ajax_search_brand",
            data: {
                id_thuong_hieu: id_thuong_hieu,
                page: page
            },
            success: function(data) {
                if (data != '') {
                    $('.product__list').html(data);
                } else {
                    alert('Không có sản phẩm cần tìm');
                }

            },
        });
    });

    $(document).on('change', '#price_search_index', function() {
        var id_price = $(this).val();

        $.ajax({
            type: 'GET',
            url: "../../../ajax_search_price",
            data: {
                id_price: id_price,
            },
            success: function(data) {
                if (data != '') {
                    $('.product__list').html(data);
                } else {
                    alert('Không có sản phẩm cần tìm');
                }

            },
        });
    });
}

function CheckRegisterPassword() {
    if (isExist($('.account'))) {
        $('#register-button').click(function(event) {
            var currentPass = $('#password').val(),
                confirmPass = $('#comfirm-password').val(),
                phone = $('#phone').val(),
                _return = true;

            $('.account-validate').empty();

            if (isValidPhone(phone) === false && phone != '' && phone.length <= 11) {
                $('#phone')
                    .parents('.account__input-item')
                    .find('.account-validate').text('Số điện thoại không đúng định dạng!');
                _return = false;
            }
            if (currentPass !== confirmPass) {
                $('#comfirm-password')
                    .parents('.account__input-item')
                    .find('.account-validate')
                    .text('Mật khẩu xác nhận không chính xác!');
                _return = false;
            }
            return _return;
        })
    }
}

const isValidPhone = phone => /(([03+[2-9]|05+[6|8|9]|07+[0|6|7|8|9]|08+[1-9]|09+[1-4|6-9]]){3})+[0-9]{7}\b/g.test(phone)

$(function() {
    MenuScroll();
    SlideShow();
    News();
    // Tieuchi();
    eyesOnOff();
    productGallery();
    getSizeId();
    getColorId();
    AddCart();
    UpdateQuantity();
    DeleteCartDetail();
    ChangeQuantity();
    CheckRegisterPassword();
    Ajax_cate_search();
});