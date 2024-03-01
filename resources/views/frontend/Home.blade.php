@extends('layouts.frontend')
@section('title', 'Goal.ma')
@section('meta_description', 'Suivez l\'actualité Marocaine nationale et internationale tous les matins avec Goal.ma')
@section('content')
<div>
  @if($bannerPopup)
  <div class="bg-black opacity-30 fixed top-0 left-0 w-full h-full z-[1000] "></div>
  <section class="bg-white  fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[9999]  rounded w-[800px] h-[400px]">
      <div class="  mx-auto max-w-screen-xl   relative">
          <div class="mx-auto  sm:text-center ">
              <form id="bannerClickForm-{{ $bannerPopup->id }}" action="{{ route('banner.click', ['id' => $bannerPopup->id]) }}" method="POST" target="_blank">
                  @csrf
                  <button type="submit" class=" bg-none border-none w-full">
                      <img id="banner-{{ $bannerPopup->id }}"  src="https://admanager.goal.ma{{ $bannerPopup->image }}" class="w-[800px] h-[400px]" data-banner-id="{{ $bannerPopup->id }}" alt="">
                  </button>
              </form>
          </div>
          <div class="absolute top-0 right-0 close-popup bg-white p-2 bg-opacity-80">
              <img src="{{ asset('storage/x-mark.png') }}" class="w-4 cursor-pointer" alt="">
          </div>
      </div>
  </section> 
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Wait for the page to load
        setTimeout(function() {
            var popup = document.querySelector(".bg-black");
            var body = document.querySelector("body");

            popup.style.display = "block";
            body.classList.add("overflow-hidden");

            // Add event listener to close the popup
            var closeButton = document.querySelector(".close-popup img");
            closeButton.addEventListener("click", function() {
                popup.style.display = "none";
                body.classList.remove("overflow-hidden");
            });
            document.querySelector('.close-popup').addEventListener('click',function() {
                document.querySelector('body').classList.remove('overflow-hidden') // Remove the 'hidden' overflow style
                document.querySelector('.bg-black').style.display = 'none'; // Hide the overlay
                document.querySelector('.close-popup').style.display = 'none'; // Hide the close button
                document.querySelector('section').style.display = 'none'; // Hide the newsletter section
            })
            }, 1); // 1 second delay
            });
</script>
  @else
        @include('frontend.components.newsletter-popup')
  @endif

        @include('frontend.components.headers')
        <div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay hidden " id="header-overlay"></div>


        @if($bannerHabillageAcceuil)
        <div class="2xl:mx-auto 2xl:container lg:px-24 md:px-6 px-4 pt-2" >
            <form id="bannerClickForm-{{ $bannerHabillageAcceuil->id }}" action="{{ route('banner.click', ['id' => $bannerHabillageAcceuil->id]) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class=" bg-none border-none w-full">
                    <img id="banner-{{ $bannerHabillageAcceuil->id }}" style="height:137px;" src="https://admanager.goal.ma{{ $bannerHabillageAcceuil->image }}" class="w-full md:h-[290px] object-fill" data-banner-id="{{ $bannerHabillageAcceuil->id }}" alt="">
                </button>
            </form>
        </div>
        @endif
  


      @if($bannerFootball && !$bannerHabillageAcceuil)
      <div class="2xl:mx-auto 2xl:container lg:px-24 md:px-6 px-4 pt-2">
          <form id="bannerClickForm-{{ $bannerFootball->id }}" action="{{ route('banner.click', ['id' => $bannerFootball->id]) }}" method="POST" target="_blank">
              @csrf
              <button type="submit" class=" bg-none border-none w-full">
                  <img id="banner-{{ $bannerFootball->id }}" src="https://admanager.goal.ma{{ $bannerFootball->image }}" data-banner-id="{{ $bannerFootball->id }}" class="w-full md:h-[290px] object-fill" alt="">
              </button>
          </form>
      </div>
      @endif





        @include('frontend.components.heroSection')
        
        @if($bannerFootball && $bannerHabillageAcceuil)
        <div class="2xl:mx-auto 2xl:container lg:px-24 md:px-6 px-4 pt-2">
          <form id="bannerClickForm-{{ $bannerFootball->id }}" action="{{ route('banner.click', ['id' => $bannerFootball->id]) }}" method="POST" target="_blank">
              @csrf
              <button type="submit" class=" bg-none border-none w-full">
                  <img id="banner-{{ $bannerFootball->id }}" src="https://admanager.goal.ma{{ $bannerFootball->image }}" data-banner-id="{{ $bannerFootball->id }}" class="w-full md:h-[290px] object-fill" alt="">
              </button>
          </form>

        </div>
        @endif
  <div class="2xl:mx-auto 2xl:container lg:px-20   md:px-6  px-4  sm:w-auto">
    {{-- Football banner x content --}}
    {{-- @if($bannerFootball) --}}
    {{-- <div class="2xl:mx-auto 2xl:container lg:px-20   md:px-6  px-4   pt-9">
      <a href="{{ $bannerFootball->lien }}" target="_blank">
        <img src="https://admanager.goal.ma/{{ $bannerFootball->image }}" class="w-full object-fill" style="height:290px" alt="">
      </a>
    </div>
    @endif --}}
    @include('frontend.components.actuHome')
    @include('frontend.components.footballHome')


    {{-- Tennis banner x content --}}
    @if($bannerTennis)
    <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
      <form id="bannerClickForm-{{ $bannerTennis->id }}" action="{{ route('banner.click', ['id' => $bannerTennis->id]) }}" method="POST" target="_blank">
          @csrf
          <button type="submit" class=" bg-none border-none w-full">
            <img id="banner-{{ $bannerTennis->id }}" src="https://admanager.goal.ma{{ $bannerTennis->image }}" data-banner-id="{{ $bannerTennis->id }}" class="w-full md:h-[290px] object-fill" alt="">
          </button>
      </form>
    </div>
    @endif
    @include('frontend.components.tennisHome')


    {{-- Athlétisme banner x content --}}
    @if($bannerAthletisme)
    <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
      <form id="bannerClickForm-{{ $bannerAthletisme->id }}" action="{{ route('banner.click', ['id' => $bannerAthletisme->id]) }}" method="POST" target="_blank">
          @csrf
          <button type="submit" class=" bg-none border-none w-full">
              <img id="banner-{{ $bannerAthletisme->id }}" src="https://admanager.goal.ma{{ $bannerAthletisme->image }}" data-banner-id="{{ $bannerAthletisme->id }}" class="w-full md:h-[290px] object-fill" alt="">
          </button>
      </form>
    </div>
    @endif
    @include('frontend.components.athletismeHome')


    {{-- Boxe banner x content --}}
    @if($bannerBoxe)
    <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
      <form id="bannerClickForm-{{ $bannerBoxe->id }}" action="{{ route('banner.click', ['id' => $bannerBoxe->id]) }}" method="POST" target="_blank">
          @csrf
          <button type="submit" class=" bg-none border-none w-full">
              <img id="banner-{{ $bannerBoxe->id }}" src="https://admanager.goal.ma{{ $bannerBoxe->image }}" data-banner-id="{{ $bannerBoxe->id }}" class="w-full md:h-[290px] object-fill" alt="">
          </button>
      </form>
    </div>
    @endif
    @include('frontend.components.boxeHome')



    {{-- Basket banner x content --}}
    @if($bannerBasket)
    <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
      <form id="bannerClickForm-{{ $bannerBasket->id }}" action="{{ route('banner.click', ['id' => $bannerBasket->id]) }}" method="POST" target="_blank">
          @csrf
          <button type="submit" class=" bg-none border-none w-full">
              <img id="banner-{{ $bannerBasket->id }}" src="https://admanager.goal.ma{{ $bannerBasket->image }}" data-banner-id="{{ $bannerBasket->id }}" class="w-full md:h-[290px] object-fill" alt="">
          </button>
      </form>

    </div>
    @endif
    @include('frontend.components.basketHome')


  

    {{-- Video banner x content --}}
    @if($bannerVideo)
    <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
      <form id="bannerClickForm-{{ $bannerVideo->id }}" action="{{ route('banner.click', ['id' => $bannerVideo->id]) }}" method="POST" target="_blank">
          @csrf
          <button type="submit" class=" bg-none border-none w-full">
              <img id="banner-{{ $bannerVideo->id }}" src="https://admanager.goal.ma{{ $bannerVideo->image }}" data-banner-id="{{ $bannerVideo->id }}" class="w-full md:h-[290px] object-fill" alt="">
          </button>
      </form>
    </div>
    @endif
    </div>
    @include('frontend.components.videoHome')
    <div class="2xl:mx-auto 2xl:container lg:px-20   md:px-6  px-4  sm:w-auto">



    {{-- People&Divers banner x content --}}
    @if($bannerPeopleDivers)
    <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
      <form id="bannerClickForm-{{ $bannerPeopleDivers->id }}" action="{{ route('banner.click', ['id' => $bannerPeopleDivers->id]) }}" method="POST" target="_blank">
          @csrf
          <button type="submit" class=" bg-none border-none w-full">
              <img id="banner-{{ $bannerPeopleDivers->id }}" src="https://admanager.goal.ma{{ $bannerPeopleDivers->image }}" data-banner-id="{{ $bannerPeopleDivers->id }}" class="w-full md:h-[290px] object-fill" alt="">
          </button>
      </form>
    </div>
    @endif
    @include('frontend.components.peopleDivers')
    
    <!-- main ends here -->
    </div>
    {{-- @include('frontend.components.newsletter') --}}
    @include('frontend.components.scrollUp')
    @include('frontend.components.footers')

@endsection
