<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content= "@yield('meta_description')">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://goal.ma/build/assets/app-maincss.css">


  <!-- Fonts -->
    @vite([ 'resources/js/app.js','resources/js/custom.js'])
    <style>
        #search-ipt-header::placeholder{
            color:#FFF;
        }   
        .font-Roboto{font-family:'Roboto','sans-serif'}
        .font-Roboto-condensed{font-family:'Roboto Condensed','sans-serif'}
        @media (min-width: 1024px)  {
            .article-thumbnail{
                height:250px;
            }
        }
        @media (min-width: 768px) and (max-width: 1140px) {
            .card-article {
                height: 380px;
            }
        }

        @media (min-width: 1140px) {
            .card-article{
                height:360px;
            } 
        }
        
        @media screen and (max-width:768px) {
            .figure-hero{
                height:450px !important;
            }
            .video-slider{
                padding:1rem !important;
            }
        }
        @media screen and (min-width:768px) {
            .figure-hero{
                height:770px !important;
            }
            .video-slider{
                padding:5rem !important;
            }
        }
    </style>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PZ8HCGH2');</script>
    <!-- End Google Tag Manager -->
</head>
<body class="overflow-x-hidden">

    <main>
        @yield('content')
    </main>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        const navList = document.getElementById('navList');
    
        prevButton.addEventListener('click', function () {
            smoothScroll(navList, -700); // Scroll to the left by 200 pixels
        });
    
        nextButton.addEventListener('click', function () {
            smoothScroll(navList, 700); // Scroll to the right by 200 pixels
        });
    
        function smoothScroll(element, scrollAmount) {
            const scrollStart = element.scrollLeft;
            const scrollEnd = scrollStart + scrollAmount;
            const duration = 300; // Adjust the duration as needed
    
            const startTime = performance.now();
            function scroll(timestamp) {
                const elapsedTime = timestamp - startTime;
                const scrollProgress = Math.min(elapsedTime / duration, 1);
                const scrollPosition = scrollStart + scrollAmount * scrollProgress;
                element.scrollLeft = scrollPosition;
    
                if (scrollProgress < 1) {
                    requestAnimationFrame(scroll);
                }
            }
    
            requestAnimationFrame(scroll);
        }
    </script>


    <script>
        var newsLetterFormSecond = document.getElementById('newsLetterForm-second');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        newsLetterFormSecond.addEventListener('submit', function(e) {
          e.preventDefault();
          var formData = new FormData(newsLetterFormSecond);

          var xhr = new XMLHttpRequest();
          xhr.open(newsLetterFormSecond.method, newsLetterFormSecond.action);
          xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 422) { 
            var errorObj = JSON.parse(xhr.responseText);
            var errors = errorObj.errors || {};
            for (var field in errors) {
                var inputField = document.querySelector('[name="' + field + '"]');
                inputField.classList.add('is-invalid');
                var errorElement = inputField.nextElementSibling;
                errorElement.innerHTML = errors[field][0];
                errorElement.style.display = 'block';
            }

            var message = errorObj.message || "Error";
            if(message.includes('The email has already been taken.')) {
              Toastify({
                    text: 'Email déjà utilisée',
                    duration: 3000, 
                    gravity: 'top', 
                    position: 'center', 
                    backgroundColor: '#ef4444', 
                    stopOnFocus: true, 
                  }).showToast();
            }
            }
        else if (xhr.status === 200) {
            // if (this.responseText == 'exists') {
                  Toastify({
                    text: 'Merci pour votre inscription',
                    duration: 3000, 
                    gravity: 'top', 
                    position: 'center', 
                    backgroundColor: '#06a49c', 
                    stopOnFocus: true, 
                  }).showToast();
                } else {
                  handleSuccess();
                // }
              }
            }
          };
          xhr.send(formData);
        });
    </script>
    <script>
      // window.onload = function() {
      //   if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_RELOAD) {
      //     // Page is reloaded
      //     window.location.href = window.location.pathname ;
      //   }
      // }
      var sondageForm = document.getElementById('sondage');
      var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      sondageForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(sondageForm);

        var xhr = new XMLHttpRequest();
        xhr.open(sondageForm.method, sondageForm.action);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 422) { 
              alert('error')
          }
      else if (xhr.status === 200) {
          // if (this.responseText == 'exists') {
                Toastify({
                  text: 'Merci pour votre participation',
                  duration: 3000, 
                  gravity: 'top', 
                  position: 'center', 
                  backgroundColor: '#06a49c', 
                  stopOnFocus: true, 
                }).showToast();
              } else {
                handleSuccess();
              // }
            }
          }
        };
        xhr.send(formData);
      });







    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var banners = document.querySelectorAll("[data-banner-id]");
        var bannerVisibleMap = {};

        function isBannerVisible(entries) {
          entries.forEach(function(entry) {
            var bannerId = entry.target.dataset.bannerId;
            if (entry.isIntersecting && !bannerVisibleMap[bannerId]) {

              incrementViewCount(bannerId);
              bannerVisibleMap[bannerId] = true;
              observer.unobserve(entry.target); // Stop observing the banner
            }
          });
        }

        function incrementViewCount(bannerId) {

          var xhttp = new XMLHttpRequest();
          xhttp.open("POST", "/banner/" + bannerId + "/view", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}"); // Add this line
          xhttp.send();
        }

        var observer = new IntersectionObserver(isBannerVisible, { threshold: 0.5 });

        banners.forEach(function(banner) {
          observer.observe(banner);
        });
      });
    </script>
    {{-- <script src="{{ asset('resjs/custom.js') }}"></script> --}}
    <script>
      $(document).ready(function() {
        $('#slider').slick({
          // Slick slider configuration options
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          // Add more configuration options as needed
        });
      });


      document.getElementById('search-icon').addEventListener('click',function() {
    // document.getElementById('search-ipt-header').classList.toggle('w-56')
    // this.classList.toggle('fa-xmark')
    // document.getElementById('search-ipt-header').classList.toggle('p-0')
    // this.classList.toggle('fa-magnifying-glass')
    document.getElementById('search-form').classList.add('block');
    document.getElementById('search-form').classList.remove('hidden');
    document.querySelector('.header-overlay').classList.add('block')
    document.querySelector('.header-overlay').classList.remove('hidden')
})
    document.getElementById('search-icon-2').addEventListener('click',function() {
    document.getElementById('search-ipt-header-2').classList.toggle('w-56')
    this.classList.toggle('fa-xmark')
    document.getElementById('search-ipt-header-2').classList.toggle('p-0')
    this.classList.toggle('fa-magnifying-glass')
})


    </script>
<script>

      $(function(){	
      initSlider();
    });


    function initSlider() {
          
      var slider = $(".slider");
            var sliderHero = $(".slideHero");
          
      slider.on("init", function(slick) {
          checkSlides(this, 0);
      });
      
      slider.on("beforeChange", function(event, slick, currentSlide, nextSlide) {
          $(this).addClass("changing");
      });
      
      slider.on("afterChange", function(event, slick, currentSlide) {
          $(this).removeClass("changing");
          checkSlides(this, currentSlide);
      });
      
            sliderHero.on("init", function(slick) {
          checkSlides(this, 0);
      });
      
      sliderHero.on("beforeChange", function(event, slick, currentSlide, nextSlide) {
          $(this).addClass("changing");
      });
      
      sliderHero.on("afterChange", function(event, slick, currentSlide) {
          $(this).removeClass("changing");
          checkSlides(this, currentSlide);
      });
      
        sliderHero.slick({
          prevArrow: '<button type="button" class="slick-prev" style="position:absolute !important;left:0 !important;margin-left:35px;"><i class="fa-solid fa-arrow-left" ></i></button>',
          nextArrow: '<button type="button" class="slick-next" style="position:absolute !important;right:0 !important; margin-right:35px;"><i class="fa-solid fa-arrow-right" ></i></button>',
          // dots: true,
          autoplay: true,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear'
        });
      
      
      slider.slick({
          prevArrow: '<button type="button" class="slick-prev" style="position:absolute !important;left:0 !important;margin-left:35px"><i class="fa-solid fa-arrow-left" ></i></button>',
          nextArrow: '<button type="button" class="slick-next" style="position:absolute !important;right:0 !important;margin-right:35px"><i class="fa-solid fa-arrow-right" ></i></button>',
          // centerMode: true,
          // variableWidth: true,
          // // dots: true,
          // // autoplay: true,
          // slidesToShow: 3,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: true,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
      });
      
      
      
          }



    function checkSlides(slider, currentSlide) {
      var slides = $(".slide", $(slider));
      slides.removeClass("prev");
      slides.filter(function(index) {
          return $(this).attr("data-slick-index") < currentSlide;
      }).addClass("prev");;
    }

</script>



    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZ8HCGH2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>
</html>