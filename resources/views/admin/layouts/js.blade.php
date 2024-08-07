<script src="{{ asset('adminbuild/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminbuild/js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('adminbuild/js/app.js') }}"></script>
<script src="{{ asset('adminbuild/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('adminbuild/js/sweetalert2.all.js') }}"></script>
<script src="{{ asset('adminbuild/js/cdn.ckeditor.com_ckeditor5_37.0.1_classic_ckeditor.js') }}"></script>
<script src="{{ asset('adminbuild/js/chart.umd.js') }}"></script>
<!-- <script src="{{ asset('adminbuild/js/helpers.js') }}"></script> -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.form_textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script src="{{ asset('adminbuild/js/particles.js') }}"></script>
<script src="{{ asset('adminbuild/js/stats.js') }}"></script>
<script>
    particlesJS("particles-js", {
        "particles": {
            "number": {
            "value": 25,
            "density": {
                "enable": true,
                "value_area": 800
            }
            },
            "color": {
            "value": "#ffffff"
            },
            "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            },
            "polygon": {
                "nb_sides": 5
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100,
            }
            },
            "opacity": {
            "value": 0.4,
            "random": false,
            "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
            },
            "size": {
            "value": 3,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 40,
                "size_min": 0.1,
                "sync": false
            }
            },
            "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.22,
            "width": 1
            },
            "move": {
            "enable": true,
            "speed": 2,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
            "onhover": {
                "enable": true,
                "mode": "grab"
            },
            "onclick": {
                "enable": true,
                "mode": "push"
            },
            "resize": true
            },
            "modes": {
            "grab": {
                "distance": 200,
                "line_linked": {
                "opacity": 1
                }
            },
            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
            },
            "repulse": {
                "distance": 200,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
            }
        },
        "retina_detect": true
        });


        /* ---- stats.js config ---- */

        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
</script>

<script>
    var sliderOne = document.getElementById('slider-1');
    var sliderTwo = document.getElementById('slider-2');
    var displayValOne = document.getElementById('range1');
    var displayValTwo = document.getElementById('range2');
    var minGap = 0;
    var sliderTrack = document.querySelector('.slider-track');
    var sliderMaxValue = sliderOne.max;

    function slideOne() {
        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
            sliderOne.value = parseInt(sliderTwo.value) - minGap;
        }
        displayValOne.textContent = sliderOne.value;
        document.getElementById('giadau').value = sliderOne.value;
        fillColor();
    }

    function slideTwo() {
        if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
            sliderTwo.value = parseInt(sliderOne.value) + minGap;
        }
        displayValTwo.textContent = sliderTwo.value;
        document.getElementById('giacuoi').value = sliderTwo.value;
        fillColor();
    }

    function fillColor() {
        var percent1 = (sliderOne.value / sliderMaxValue) * 100;
        var percent2 = (sliderTwo.value / sliderMaxValue) * 100;
        sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
    }

    // Initialize the sliders and fill colors
    slideOne();
    slideTwo();
</script>