<?php
use App\Http\Controllers\Clients\TrangChuController;
$donhangao = TrangChuController::donhangao();
$thongtinnguoidung = TrangChuController::thongtinnguoidung();
$settings = TrangChuController::setting();
?>

<script src="{{ asset('clients/js/jquery-3.6.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="{{ asset('clients/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('clients/slick/slick.js') }}"></script>
<script src="{{ asset('clients/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('clients/video-slider/ninja-slider.js') }}"></script>
<script src="{{ asset('clients/video-slider/ninjaVideoPlugin.js') }}"></script>
<script src="{{ asset('clients/js/owl.carousel.js') }}"></script>
<script src="{{ asset('clients/js/lazyload.min.js') }}"></script>
<script src="{{ asset('clients/js/app.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<script>
    $('.product-hot-owl').owlCarousel({
        lazyLoad: true,
        autoplay: true,
        dots: false,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        smartSpeed: 1000,
        nav: false,
        center: false,
        responsive : {
            0 : {
                items: 1,
                margin: 15,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
            },
            556 : {
                items: 2,
                margin: 15,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
            },
            769 : {
                items: 3,
                margin: 30,
                loop: true,
                mouseDrag: true,
                touchDrag: false,
            },
            1025 : {
                items: 4,
                margin: 20,
                loop: false,
                mouseDrag: true,
                touchDrag: true,
            }    
        }
    });
    
    $('.product-owl').owlCarousel({
        lazyLoad: true,
        autoplay: true,
        dots: false,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        smartSpeed: 1000,
        nav: false,
        center: false,
        responsive : {
            0 : {
                items: 1,
                margin: 15,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
            },
            556 : {
                items: 2,
                margin: 15,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
            },
            769 : {
                items: 3,
                margin: 30,
                loop: true,
                mouseDrag: true,
                touchDrag: false,
            },
            1025 : {
                items: 4,
                margin: 20,
                loop: false,
                mouseDrag: true,
                touchDrag: true,
            }    
        }
    });

    $('.owl-banner').owlCarousel({
        lazyLoad: true,
        autoplay: true,
        dots: false,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        smartSpeed: 1000,
        nav: false,
        center: false,
        responsive : {
            0 : {
                items: 1,
                margin: 15,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
            },
            556 : {
                items: 1,
                margin: 15,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
            },
            769 : {
                items: 1,
                margin: 30,
                loop: true,
                mouseDrag: true,
                touchDrag: false,
            },
            1025 : {
                items: 1,
                margin: 20,
                loop: false,
                mouseDrag: true,
                touchDrag: true,
            }    
        }
    });
</script>
<script type="text/javascript">    
    function GoogleLanguageTranslatorInit() {
    new google.translate.TranslateElement({pageLanguage: 'vi', autoDisplay: false }, 'google_language_translator');}
</script>
<script type='text/javascript' src={{ asset('clients/js/flags.js') }}></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit" async defer></script>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</script><script src="{{ asset('clients/js/arcontactus.js') }}"></script>
<link href="{{ asset('clients/css/arcontactus.css') }}" type="text/css" rel="stylesheet" />
<script>
    //<![CDATA[
    var arCuMessages = [];
    var arCuLoop = false;
    var arCuCloseLastMessage = false;
    var arCuPromptClosed = false;
    var _arCuTimeOut = null;
    var arCuDelayFirst = 2000;
    var arCuTypingTime = 2000;
    var arCuMessageTime = 4000;
    var arCuClosedCookie = 0;
    var arcItems = [];
    window.addEventListener('load', function() {
        // arCuClosedCookie = arCuGetCookie('arcu-closed');
        jQuery('#arcontactus').on('arcontactus.init', function() {
            if (arCuClosedCookie) {
                return false;
            }
            arCuShowMessages();

        });
        jQuery('#arcontactus').on('arcontactus.openMenu', function() {
            clearTimeout(_arCuTimeOut);
            arCuPromptClosed = true;
            jQuery('#contact').contactUs('hidePrompt');
            arCuCreateCookie('arcu-closed', 1, 30);
        });
        jQuery('#arcontactus').on('arcontactus.hidePrompt', function() {
            clearTimeout(_arCuTimeOut);
            arCuPromptClosed = true;
            arCuCreateCookie('arcu-closed', 1, 30);
        });
        var arcItem = {};
        arcItem.id = 'msg-item-1';
        arcItem.class = 'msg-item-facebook-messenger';
        arcItem.title = 'Messenger';
        arcItem.icon = '<svg xmlns="//www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 32C15.9 32-77.5 278 84.6 400.6V480l75.7-42c142.2 39.8 285.4-59.9 285.4-198.7C445.8 124.8 346.5 32 224 32zm23.4 278.1L190 250.5 79.6 311.6l121.1-128.5 57.4 59.6 110.4-61.1-121.1 128.5z"></path></svg>';
        arcItem.href = '{{ $settings[0]->fanpage }}';
        arcItem.color = '#02a2ff';
        arcItems.push(arcItem);
        var arcItem = {};
        arcItem.id = 'msg-item-9';
        arcItem.class = 'msg-item-telegram-plane';
        arcItem.title = 'Zalo Chat';
        arcItem.icon = "<svg id='Layer_1' xmlns='//www.w3.org/2000/svg' viewBox='0 0 460.1 436.6'><path fill='currentColor' class='st0' d='M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z'></path></svg>";
        arcItem.href = 'https://zalo.me/{{ $settings[0]->zalo }}';
        arcItem.color = '#0180c7';
        arcItems.push(arcItem);
        var arcItem = {};
        arcItem.id = 'msg-item-7';
        arcItem.class = 'msg-item-envelope';
        arcItem.title = 'Gửi Email';
        arcItem.icon = '<svg  xmlns="//www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z"></path></svg>';
        arcItem.href = 'mailto:{{ $settings[0]->email }}'
        arcItem.color = '#d7473b';
        arcItems.push(arcItem);
        var arcItem = {};
        arcItem.id = 'msg-item-8';
        arcItem.class = 'msg-item-phone';
        arcItem.title = 'Call 0777046925';
        arcItem.icon = '<svg xmlns="//www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>';
        arcItem.href = 'tel:{{ $settings[0]->hotline }}';
        arcItem.color = '#4EB625';
        arcItems.push(arcItem);

        jQuery('#arcontactus').contactUs({
            items: arcItems
        });
    });
</script>

{{-- Message --}}
<script>
   $(document).ready(function() { 
    $('#messages-facebook').one('DOMSubtreeModified', function () {
        $('.js-facebook-messenger-box').on('click', function () {
            $('.js-facebook-messenger-box, .js-facebook-messenger-container').toggleClass('open');
            if ($('.js-facebook-messenger-tooltip').length) {
                $('.js-facebook-messenger-tooltip').toggle();
            }
        });

        if ($('.js-facebook-messenger-box').hasClass('cfm')) {
            setTimeout(function () {
                $('.js-facebook-messenger-box').addClass('rubberBand animated');
            }, 3500);
        }

        if ($('.js-facebook-messenger-tooltip').length) {
            if ($('.js-facebook-messenger-tooltip').hasClass('fixed')) {
                $('.js-facebook-messenger-tooltip').show();
            } else {
                $('.js-facebook-messenger-box').hover(function () {
                    $('.js-facebook-messenger-tooltip').show();
                });
            }

            $('.js-facebook-messenger-close-tooltip').on('click', function () {
                $('.js-facebook-messenger-tooltip').addClass('closed');
            });
        }

        $('.search_open').click(function () {
            $('.search_box_hide').toggleClass('opening');
        });
    });
});
</script>

{{-- Bộ Lọc sản phẩm --}}
<script>
$(document).ready(function() {
    function filterProduct() {
        var url_filter = '';
        $('.noidung').each(function() {
            var parent = $(this);
            var data = parent.find('input:checked');
            var type = parent.data('type');
            var id = data.map(function() { return this.value; }).get().join(',');

            if (id) {
                if (url_filter) {
                    url_filter += '&';
                }
                url_filter += type + '=' + id;
            }
        });

        var range = $('#giadau').val() + "-" + $('#giacuoi').val();
        url_filter += '&khoanggia=' + range;

        location.href = "bo-loc?" + url_filter;
    }

    function initializeSlider() {
        let sliderOne = document.getElementById("slider-1");
        let sliderTwo = document.getElementById("slider-2");
        let displayValOne = document.getElementById("range1");
        let displayValTwo = document.getElementById("range2");
        let giadau = document.getElementById("giadau");
        let giacuoi = document.getElementById("giacuoi");
        let minGap = 0;
        let sliderTrack = document.querySelector(".slider-track");
        let sliderMaxValue = sliderOne.max;

        function slideOne() {
            if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
                sliderOne.value = parseInt(sliderTwo.value) - minGap;
            }
            displayValOne.textContent = parseInt(sliderOne.value).toLocaleString();
            giadau.value = sliderOne.value;
            fillColor();
        }

        function slideTwo() {
            if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
                sliderTwo.value = parseInt(sliderOne.value) + minGap;
            }
            displayValTwo.textContent = parseInt(sliderTwo.value).toLocaleString();
            giacuoi.value = sliderTwo.value;
            fillColor();
        }

        function fillColor() {
            let percent1 = (sliderOne.value / sliderMaxValue) * 100;
            let percent2 = (sliderTwo.value / sliderMaxValue) * 100;
            sliderTrack.style.background =
                `linear-gradient(to right, #000 ${percent1}% , #a0d25f ${percent1}% , #a0d25f ${percent2}%, #000 ${percent2}%)`;
        }

        sliderOne.addEventListener('input', slideOne);
        sliderTwo.addEventListener('input', slideTwo);

        window.onload = function() {
            slideOne();
            slideTwo();
        };
    }

    if ($(".noidung").length) {
        $(".noidung input").click(filterProduct);
        $("[type=range]").change(filterProduct);
    }

    initializeSlider();
});
</script>

<?php /*
<script>
    $(document).ready(function () {
        @if(isset($thongtinnguoidung) && $thongtinnguoidung->isNotEmpty())
            var orders = [];
            var orders_detail = [];
            
            @foreach ($donhangao as $donhang)
                orders.push("{{ $donhang->id }}"); 
                let activities{{ $donhang->id }} = [
                    [
                        {{ $donhang->id }},
                        `<img class="img_main" onerror="this.src='{{ asset('adminbuild/images/noimage.png') }}'" src="{{ asset('upload/sanpham/' . $donhang->hinh_anh) }}" width="100" height="100" alt="{{ $donhang->ten_san_pham }}">`,
                        '{{ $donhang->ten_san_pham }}'
                    ]
                ];
                orders_detail.push(activities{{ $donhang->id }});
            @endforeach

            var sale_customers = [];
            @foreach ($thongtinnguoidung as $val)
                sale_customers.push("{{ $val->ho_ten }}");
            @endforeach

            var sale_time_ago = [];
            @foreach ($donhangao as $donhang)
                sale_time_ago.push("{{ $donhang->updated_at }}");
            @endforeach

            var count_show = 20;
            var count_increase = 1;
            var time_delay_between = 5000;
            var time_delay_popup = 5000;
            
            var interval = setInterval(function() {
                var keyunique = Math.floor(Math.random() * orders.length);
                var item = orders_detail[keyunique];
                var customer = sale_customers[Math.floor(Math.random() * sale_customers.length)];
                var time = sale_time_ago[Math.floor(Math.random() * sale_time_ago.length)];
                
                var sale_template = `
                    <section class="custom-social-proof">
                        <div class="custom-notification">
                            <div class="custom-notification-container">
                                <div class="custom-notification-image-wrapper">
                                    ${item[0][1]}
                                </div>
                                <div class="custom-notification-content-wrapper">
                                    <p class="custom-notification-content">
                                        <b class="name_cart_opcity">${customer}</b><br>Đã mua <a href="#"><b class="text-split">${item[0][2]}</b></a>
                                        <small>Lúc ${time}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="custom-close"></div>
                        </div>
                    </section>
                `;
                
                $('body').append(sale_template);

                setTimeout(function() {
                    $(".custom-social-proof").remove();
                }, time_delay_popup);

                count_increase++;
                if (count_increase > count_show) {
                    clearInterval(interval);
                }
            }, time_delay_between + time_delay_popup);

            $("body").on('click', '.custom-close', function() {
                $(this).closest(".custom-social-proof").remove();
            });
        @endif
    });
</script>
*/?>


{{-- Tim goi y --}}
<script>
    function load_sugges(_this)
    {
        var key = _this.val();
        $.ajax({
            url: '{{ route('timkiem.goiy') }}',
            type: "POST",
            dataType: 'html',
            data: {
                key_search_index: key,
                _token: '{{ csrf_token() }}'
            },
            success: function(result){
                if(result)
                {
                    $('.sugges-search').html(result);
                    $('.sugges-search').show();
                } else {
                    $('.sugges-search').hide();
                    $('.sugges-search').html('');
                }
            }
        });
    }

    $(".search__input").keyup(function(){
        load_sugges($(this));
    })

    $(".search__input").focus(function(){
        load_sugges($(this));
    });

    $(document).mouseup(function(e)     
    {
        var container = $(".header__block--middle");
        var container_hid = $(".sugges-search");
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container_hid.hide();
        }
    });
</script>