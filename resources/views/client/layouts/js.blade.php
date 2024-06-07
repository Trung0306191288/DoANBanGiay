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




</script>
    