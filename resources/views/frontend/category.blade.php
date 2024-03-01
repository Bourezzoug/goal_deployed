@extends('layouts.frontend')
@section('title', 'Goal.ma - ' . ($categoryName))
@section('meta_description', 'description')
@section('content')
        @include('frontend.components.headers')
        <div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay hidden " id="header-overlay" style="opacity:0.95"></div>

        <div class="2xl:mx-auto 2xl:container lg:px-20   md:px-6 py-9 px-0  sm:w-auto">

            @if ($categoryName == 'Football')
            @if($bannerFootball)
            <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
              <form id="bannerClickForm-{{ $bannerFootball->id }}" action="{{ route('banner.click', ['id' => $bannerFootball->id]) }}" method="POST" target="_blank">
                  @csrf
                  <button type="submit" class=" bg-none border-none w-full">
                      <img id="banner-{{ $bannerFootball->id }}" src="https://admanager.goal.ma{{ $bannerFootball->image }}" data-banner-id="{{ $bannerFootball->id }}" class="w-full md:h-[290px] object-fill" alt="">
                  </button>
              </form>

            </div>
            @endif
            @endif


            @if ($categoryName == 'Tennis')
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
            @endif


            @if ($categoryName == 'Athlétisme')
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
            @endif





            @if ($categoryName == 'Boxe')
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
            @endif




            @if ($categoryName == 'Basket')
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
            @endif


            @if ($categoryName == 'Video')
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
            
            @endif

            @if ($categoryName == 'People')
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
            
            @endif

            @if ($categoryName == 'Divers')
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
            
            @endif

            @if ($cat->parent_id == 8)
            @if($bannerPeopleDivers)
            <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
              <form id="bannerClickForm-{{ $bannerPeopleDivers->id }}" action="{{ route('banner.click', ['id' => $bannerPeopleDivers->id]) }}" method="POST" target="_blank">
                  @csrf
                  <button type="submit" class=" bg-none border-none w-full">
                      <img id="banner-{{ $bannerPeopleDivers->id }}" src="https://admanager.goal.ma{{ $bannerPeopleDivers->image }}" class="w-full md:h-[290px] object-fill" data-banner-id="{{ $bannerPeopleDivers->id }}" alt="">
                  </button>
              </form>
            </div>
            @endif
            @endif
            <main class="">
        
            <div class="block lg:flex lg:space-x-2 px-4 lg:p-0 mb-10">
                <!-- post cards -->
                <div class="w-full lg:w-[70%]">
                    <main class="lg:pt-8 bg-white ">
                    <div class="flex  " style="margin-bottom:50px;flex-direction:column">
                        @php
                            $categoryColor = App\Models\Category::where('name',$categoryName)->first();
                        @endphp
                        <h3 class="font-Roboto-c lg:text-[25px] text-[22px] font-bold mb-2" style="font-size:30px">{{ $categoryName }}</h3>
                        <div class="flex-1" style="border:1px solid {{ $categoryColor->color }}"></div>
                    </div>
                                                            @if($categoryName == 'Video')
                        <div class="grid grid-cols-12 gap-2">
                            @forelse ($categoryPost as $article)
                            <div class="col-span-12 lg:col-span-6">
                                <div class="slide" style="width:auto !important;">
                                    <figure class="relative lg:h-[450px]">
                                        <div class="font-Roboto-c bg-main-color w-fit rounded p-1 text-black absolute top-5 left-5 z-50">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}</div>
                    
                                        <img src="{{ $article->image }}" class="object-cover h-full" alt="" />
                                    </figure>
                                        <a href="sport/{{ $article->category->slug . '/' .$article->slug }}" class="neonText absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center justify-center z-50">
                                            
                                            <i class="fa-solid fa-play text-lg"></i>
                                        </a>
                                        <div class="text-video" >
                                            <h2 class="font-Roboto-c lg:text-[25px] text-[22px] font-bold">
                                                <a href="sport/{{ $article->category->slug . '/' .$article->slug }}">{{ $article->title }}</a>
                                            </h2>
                                        </div>
                                </div>
                            </div>
                            @empty
                                
                            @endforelse

                        </div>
                    @else
        @forelse ($categoryPost as $footarticle)
        <div class="relative rounded w-full lg:flex mb-4 sm:mb-10 lg:p-0 gap-1">
            <a href="/sport/{{ $footarticle->category->slug . '/' .$footarticle->slug }}" class="md:rounded lg:rounded-none md:h-[20rem] md:w-full lg:h-48 lg:max-w-none max-w-full lg:w-101 overflow-hidden block flex-shrink-0 article-thumbnail"  >
                <img src="{{ $footarticle->image }}" class="md:rounded lg:rounded-none md:h-[20rem] md:w-full lg:h-48 lg:max-w-none w-full lg:w-101 object-cover hover:scale-110 transition-transform" style="height:100%" alt="">
                @if ($categoryName == 'Divers')
                            <a href="{{ $footarticle->category->name }}">
                                <span class="cats sm:mx-10 md:mx-20 lg:mx-0 rounded absolute top-3 left-3 px-2 py-1 text-white" style="background-color:{{ $footarticle->category->color }}">{{ $footarticle->category->name }}</span>
                            </a>
                @endif
            </a>
            

            <div class="bg-white rounded sm:px-4 flex flex-col  leading-normal ">
            <div>
                <div class="mt-3 lg:-mt-1.5 text-gray-800 font-medium  text-xl sm:text-2xl mb-2 md:text-justify font-Roboto-condensed font-bold" style="font-size:22px">
                    <a href="/sport/{{ $footarticle->category->slug . '/' .$footarticle->slug }}">{{ $footarticle->title }}</a>
                </div>
                <div class="flex xl:items-center lg:flex-col xl:flex-row md:flex-row my-3">
                    <p class=" text-sm font-Roboto"><span class="pb-2 text-sm rounded text-gray-500">{{ \Carbon\Carbon::parse($footarticle->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}</span></p>
                </div>
                <p class=" text-gray-500 font-Roboto my-3" style="font-size:16px">
                                {!! Illuminate\Support\Str::limit(strip_tags($footarticle->body), 200, '') !!}
                </p>
            </div>
            </div>
        </div>
        @empty

        @endforelse
        @endif


                    <div class="pb-5 sm:pb-10 w-4/5">
                        {{-- Display the pagination links --}}
                        {{ $categoryPost->links() }} 
                    </div>
                    
                    </main>
                    



                </div>
        
                <!-- right sidebar -->
                <div class="w-full lg:w-[30%] sm:px-3">
            <main class=" pb-16 lg:pt-10 lg:pb-24 bg-white ">

                        
                <div class="flex justify-center lg:justify-between sm:px-4 mx-auto max-w-screen-xl ">
                    <div class="grid grid-cols-1 max-w-2xl">
                    
                        <div class="pt-1 pb-5">
                            <h2 class="post-header relative text-sm font-semibold font-Lato"><span class="bg-main-color text-white rounded-full py-2 px-3">Les plus vues</span></h2>
                        </div>
                        <div class="lg:max-w-md">
                @foreach ($mostViewdArticle as $article)
                <div class="flex sm:px-1 py-4">
                    <a href="sport/{{ $article->category->slug . '/' .$article->slug }}" class="flex-shrink-0  w-28 h-28 mr-4 overflow-hidden rounded">
                        <img alt="" class="w-full h-full object-cover hover:scale-110 transition-transform" src="{{ $article->image }}">
                    </a>
                    <div class="flex flex-col flex-grow">
                        <h2 class="font-Roboto " style="font-size:15px;font-weight:500">
                            <a  href="sport/{{ $article->category->slug . '/' .$article->slug }}" >{{ $article->title }}</a>
                        </h2>
                        
                        <p class="mt-auto text-xs font-Lato text-gray-400">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}
                        </p>
                    </div>
                </div>
                @endforeach
                        </div>
                </div>

                </div>
                <div class="mt-2 sm:px-4 max-w-2xl mx-auto">
                    
                                    <div class="mt-5 flex flex-col space-y-5">
                    {{-- <h4 class="font-Roboto text-[17px] uppercase">Social Media</h4> --}}
                    <a href="#" class="w-full bg-[#506fbf] rounded-full flex justify-between items-center my-2" style="background:#506fbf">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Facebook</span>
                        <div class="bg-[#445fa2] rounded-full " style="background:#445fa2;padding:0.75rem 1rem">
                            <i class="fa-brands fa-facebook text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="w-full bg-black bg-opacity-80 rounded-full flex justify-between items-center my-2" style="background:#272727">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Twitter</span>
                        <div class="bg-black rounded-full" style="padding:0.75rem 1rem">
                            <i class="fa-brands fa-x-twitter text-white"></i>
                        </div>
                    </a>

                    <a href="#" class="w-full bg-red-400 rounded-full flex justify-between items-center my-2">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Youtube</span>
                        <div class="bg-red-600 rounded-full" style="padding:0.75rem 1rem">
                            <i class="fa-brands fa-youtube text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="w-full rounded-full flex justify-between items-center my-2" style="background: radial-gradient(circle at 33% 100%,#fed373 4%,#f15245 30%,#d92e7f 62%,#9b36b7 85%,#515ecf)">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Instagram</span>
                        <div class="bg-[#9b36b7] rounded-full" style="background:#9b36b7;padding:0.75rem 1rem">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </div>
                    </a>
                </div>
                    <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container">
                        @csrf
                        @include('survey::standard', ['survey' => $sondages])
                    </form>
                </div>
                </div>
                
            </main>
            
            
            <!-- main ends here -->
            </div>
            @include('frontend.components.footers')
    @include('frontend.components.scrollUp')

@endsection