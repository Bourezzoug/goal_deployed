@extends('layouts.frontend')
@section('title', 'Goal.ma - ' . ($post->title))
@section('meta_description', $post->meta_description )
@section('content')
        @include('frontend.components.headers')
        <div class="2xl:mx-auto 2xl:container lg:px-20   md:px-6 py-9 px-4 sm:w-full">
          @if ($post->category->name == 'Football')
          @if($bannerFootball)
          <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
            <form id="bannerClickForm-{{ $bannerFootball->id }}" action="{{ route('banner.click', ['id' => $bannerFootball->id]) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class=" bg-none border-none w-full">
                    <img id="banner-{{ $bannerFootball->id }}" src="https://admanager.goal.ma{{ $bannerFootball->image }}" class="w-full md:h-[290px] object-fill" data-banner-id="{{ $bannerFootball->id }}" alt="">
                </button>
            </form>
          </div>
          @endif
          @endif




          @if ($post->category->name == 'Tennis')
          @if($bannerTennis)
          <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
            <form id="bannerClickForm-{{ $bannerTennis->id }}" action="{{ route('banner.click', ['id' => $bannerTennis->id]) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class=" bg-none border-none w-full">
                    <img id="banner-{{ $bannerTennis->id }}" src="https://admanager.goal.ma{{ $bannerTennis->image }}" class="w-full md:h-[290px] object-fill" data-banner-id="{{ $bannerTennis->id }}" alt="">
                </button>
            </form>
          </div>
          @endif
          @endif


          @if ($post->category->name == 'Athlétisme')
          @if($bannerAthletisme)
          <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
            <form id="bannerClickForm-{{ $bannerAthletisme->id }}" action="{{ route('banner.click', ['id' => $bannerAthletisme->id]) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class=" bg-none border-none w-full">
                    <img id="banner-{{ $bannerAthletisme->id }}" src="https://admanager.goal.ma{{ $bannerAthletisme->image }}" class="w-full md:h-[290px] object-fill" data-banner-id="{{ $bannerAthletisme->id }}" alt="">
                </button>
            </form>
          </div>
          @endif
          @endif




          @if ($post->category->name == 'Boxe')
          @if($bannerBoxe)
          <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
            <form id="bannerClickForm-{{ $bannerBoxe->id }}" action="{{ route('banner.click', ['id' => $bannerBoxe->id]) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class=" bg-none border-none w-full">
                    <img id="banner-{{ $bannerBoxe->id }}" src="https://admanager.goal.ma{{ $bannerBoxe->image }}" class="w-full md:h-[290px] object-fill" data-banner-id="{{ $bannerBoxe->id }}" alt="">
                </button>
            </form>
          </div>
          @endif
          @endif





          @if ($post->category->name == 'Basket')
          @if($bannerBasket)
          <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
            <form id="bannerClickForm-{{ $bannerBasket->id }}" action="{{ route('banner.click', ['id' => $bannerBasket->id]) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class=" bg-none border-none w-full">
                    <img id="banner-{{ $bannerBasket->id }}" src="https://admanager.goal.ma{{ $bannerBasket->image }}" class="w-full md:h-[290px] object-fill" data-banner-id="{{ $bannerBasket->id }}" alt="">
                </button>
            </form>
          </div>
          @endif
          @endif



          
          @if ($post->category->name == 'Video')
          @if($bannerVideo)
          <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 pt-2">
            <form id="bannerClickForm-{{ $bannerVideo->id }}" action="{{ route('banner.click', ['id' => $bannerVideo->id]) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class=" bg-none border-none w-full">
                    <img id="banner-{{ $bannerVideo->id }}" src="https://admanager.goal.ma{{ $bannerVideo->image }}" class="w-full md:h-[290px] object-fill" alt="">
                </button>
            </form>
          </div>
          @endif
          @endif

          @if ($post->category->name == 'People')
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

          @if ($post->category->name == 'Divers')
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

          @if ($post->category->parent_id == 8)
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
          <div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay hidden " id="header-overlay" style="opacity:0.95"></div>

            <main class="">
        
            <div class="block lg:flex lg:space-x-2 px-2 lg:p-0  mb-10">
                <!-- post cards -->
                <div class="w-full lg:w-[70%]">
                    
                    <main class=" pb-16 lg:pt-8  bg-white ">

                        

  
                        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                            
                            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue ">
                              <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-3  ">
                                  <li class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-main-color  ">
                                      <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    </a>
                                  </li>
                                  <li>
                                    <div class="flex items-center">
                                      <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                      <a href="/" class="ml-1 text-sm font-medium text-gray-700 hover:text-main-color md:ml-2  ">Acceuill</a>
                                    </div>
                                  </li>
                                  <li aria-current="page">
                                    <div class="flex items-center">
                                      <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                      <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 "><a href="/{{ $post->category->name  }}">{{ $post->category->name }}</a></span>
                                    </div>
                                  </li>
                                </ol>
                              </nav>
                                <h1 class="mt-3 md:mt-0 font-Roboto-c font-semibold text-2xl mb-2 text-justify py-4" style="font-size:32px;line-height:1.3">
                                    {{ $post->title }}
                                </h1>
                                @if($post->lien_video)
                                <iframe src="{{ $post->lien_video }}" class="w-full h-96 my-5" frameborder="0"></iframe>
                                @else
                                <img src="{{ $post->image }}" class="w-full" alt="">
                                @endif
                                <div class="flex items-center justify-between">
                                <p class="text-md text-gray-400 py-6">Publié le : <span class="text-gray-800" style="font-size:14px">{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}</span></p>
                                  <div class="flex items-center">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url($post->category->slug . '/' .$post->slug) }}" target="_blank" class="p-2.5 bg-facebook rounded-full text-white ml-1">
                                      <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3.5 h-3.5">
                                        <path d="M379 22v75h-44c-36 0-42 17-42 41v54h84l-12 85h-72v217h-88V277h-72v-85h72v-62c0-72 45-112 109-112 31 0 58 3 65 4z">
                                        </path>
                                      </svg>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ url($post->category->slug . '/' .$post->slug) }}" target="_blank" class="px-2 bg-black rounded-full text-white ml-1 " style="padding: 5px .55rem">
<i class="fa-brands fa-x-twitter "></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url($post->category->slug . '/' .$post->slug) }}" target="_blank" class="p-2.5 bg-[#0072b1] rounded-full text-white ml-1">
                                      <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3.5 h-3.5">
                                        <path d="M136 183v283H42V183h94zm6-88c1 27-20 49-53 49-32 0-52-22-52-49 0-28 21-49 53-49s52 21 52 49zm333 208v163h-94V314c0-38-13-64-47-64-26 0-42 18-49 35-2 6-3 14-3 23v158h-94V183h94v41c12-20 34-48 85-48 62 0 108 41 108 127z">
                                        </path>
                                      </svg>
                                    </a>
                                    <a href="mailto:?subject=Check%20out%20this%20awesome%20post&body=Hi%2C%0D%0A%0D%0AJust%20wanted%20to%20share%20this%20awesome%20post%20with%20you%3A%0D%0A%0D%0A<{{ url($post->category->slug . '/' .$post->slug) }}>" target="_blank" class="p-2.5 bg-gray-300 rounded-full text-white ml-1">
                                      <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3.5 h-3.5">
                                        <path d="M464 64a48 48 0 0 1 29 86L275 314c-11 8-27 8-38 0L19 150a48 48 0 0 1 29-86h416zM218 339c22 17 54 17 76 0l218-163v208c0 35-29 64-64 64H64c-35 0-64-29-64-64V176l218 163z">
                                        </path>
                                      </svg>
                                    </a>
                                    <a href="https://wa.me/?text={{ url($post->category->slug . '/' .$post->slug) }}" target="_blank" class="p-2.5 bg-[#128c7e] rounded-full text-white ml-1">
                                      <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3.5 h-3.5">
                                        <path d="M413 97A222 222 0 0 0 64 365L31 480l118-31a224 224 0 0 0 330-195c0-59-25-115-67-157zM256 439c-33 0-66-9-94-26l-7-4-70 18 19-68-4-7a185 185 0 0 1 287-229c34 36 56 82 55 131 1 102-84 185-186 185zm101-138c-5-3-33-17-38-18-5-2-9-3-12 2l-18 22c-3 4-6 4-12 2-32-17-54-30-75-66-6-10 5-10 16-31 2-4 1-7-1-10l-17-41c-4-10-9-9-12-9h-11c-4 0-9 1-15 7-5 5-19 19-19 46s20 54 23 57c2 4 39 60 94 84 36 15 49 17 67 14 11-2 33-14 37-27s5-24 4-26c-2-2-5-4-11-6z">
                                        </path>
                                      </svg>
                                    </a>
                                  </div>
                                </div>
                                <div class="text-justify leading-8 font-Roboto">{!! $post->body !!}</div>

                                <p class="py-6">Source : <span class="font-bold uppercase rounded font-Roboto"><a href="{{ $post->source_link }}" style="background-color:#f6f6f6;font-size:14px;padding:4px 10px 3px;margin-right:10px" target="_blank">{{ $post->source }}</a></span></p>
                                <div class=" flex" style="flex-wrap:wrap">
                                    <p>Mots Clés: </p>
                                    <div class="flex flex-wrap">
                                    @forelse(explode(",",$post->seo_title) as $index => $mots_cles)
                                        <span class="font-bold uppercase rounded font-Roboto"><a href="{{ $mots_cles }}" style="background-color: {{ $index % 2 == 0 ? '#f6f6f6' : '#fff7f3' }};font-size:14px;padding:4px 10px 3px;margin-right:10px" target="_blank">#{{ $mots_cles }}</a></span>
                                    @empty
                                    
                                    @endforelse
                                    </div>
                                </div>
                                <!--<p>-->
                                <!--    <span class="font-bold uppercase rounded  text-[10px] font-Roboto" style="padding:4px 10px 3px;background-color:#f6f6f6;font-size:10px"># Style</span>-->
                                <!--    <span class="font-bold uppercase rounded  text-[10px] font-Roboto" style="padding:4px 10px 3px;background-color:#fff7f3;font-size:10px"># Féminovation</span>-->
                                <!--    <span class="font-bold uppercase rounded  text-[10px] font-Roboto" style="padding:4px 10px 3px;background-color:#f6f6f6;font-size:10px"># Élegance</span>-->
                                <!--</p>-->

                                
                                  
                            </article>
                            
                        </div>
                        
                    </main>
                    



                </div>
        
                <!-- right sidebar -->
                <div class="lg:pt-20 w-full lg:w-[30%]">

                  <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    @if ( $post->category->name == 'Tennis')
                    @if($bannerTennisRight)
                      <form id="bannerClickForm-{{ $bannerTennisRight->id }}" action="{{ route('banner.click', ['id' => $bannerTennisRight->id]) }}" method="POST" target="_blank">
                        @csrf
                        <button type="submit" class=" bg-none border-none w-full">
                            <img id="banner-{{ $bannerTennisRight->id }}" src="https://admanager.goal.ma{{ $bannerTennisRight->image }}" class="w-[300px] md:h-[300px] object-fill" data-banner-id="{{ $bannerTennisRight->id }}" alt="">
                        </button>
                      </form>
                      <div class="mt-5">
                        <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container md:w-[300px] md:h-[300px]">
                            @csrf
                            @include('survey::standard', ['survey' => $sondages])
                        </form>
                      </div>
                    @else
                                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
  
                                    <th colspan="4" class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider font-Lato">
                                        Match d'aujourd'hui
                                    </th>
  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matches as $match)
                                @php
                                    $match_time = $match->heure_match;
                                    $current_time = date('H:i');
                                    $result = $match->resultat_match;
                            
                                    if($current_time > $match_time) {
                                        $match_time = 'Started';
                                    }
                                    if($result !== null) {
                                        $match_time = $result;
                                    }
                                @endphp
                            
                                <tr>
                                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex flex-col justify-center items-center">
                                            <div class="flex-shrink-0 w-10 h-10 table-cell">
                                                <img class="w-full h-full " src="{{ $match->logo_equipe_1 }}" alt="" />
                                            </div>
                                            <div class="mt-3">
                                                <p class=" text-center whitespace-no-wrap text-sm font-Roboto-c">
                                                    {{ $match->equipe1_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2" class="pl-4">
                                                                                @if($match_time == $result)
                                            <p class="text-sm mb-1 text-center">Terminé</p>
                                        @else
                                            <p class="text-sm mb-1 text-center">{{ \Carbon\Carbon::parse($match->date_match)->format('d M') }}</p>
                                        @endif
                                        <div class="bg-black text-white p-2 rounded text-center text-sm font-Lato">
                                            {{ $match_time }}
                                        </div>
                                    </td>
                                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex flex-col items-center  ">
                                            <div class="flex-shrink-0 w-10 h-10 table-cell">
                                                <img class="w-full h-full " src="{{ $match->logo_equipe_2 }}" alt="" />
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-center whitespace-no-wrap text-sm font-Roboto-c">
                                                    {{ $match->equipe2_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                            
                            
  
                                
                            </tbody>
                        </table>
                        
  
                    </div>
                    <div class="mt-5">
                        <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container md:w-full md:h-[300px]">
                            @csrf
                            @include('survey::standard', ['survey' => $sondages])
                        </form>
                    </div>
                    @endif

                    @elseif( $post->category->name == 'Boxe')
                    @if($bannerBoxeRight)
                      <form id="bannerClickForm-{{ $bannerBoxeRight->id }}" action="{{ route('banner.click', ['id' => $bannerBoxeRight->id]) }}" method="POST" target="_blank">
                        @csrf
                        <button type="submit" class=" bg-none border-none w-full">
                            <img id="banner-{{ $bannerBoxeRight->id }}" src="https://admanager.goal.ma{{ $bannerBoxeRight->image }}" class="w-[300px] md:h-[600px] object-fill" data-banner-id="{{ $bannerBoxeRight->id }}" alt="">
                        </button>
                      </form>
                      <div class="mt-5">
                        <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container md:w-[300px] md:h-[300px]">
                            @csrf
                            @include('survey::standard', ['survey' => $sondages])
                        </form>
                      </div>
                    @else
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
  
                                    <th colspan="4" class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider font-Lato">
                                        Match d'aujourd'hui
                                    </th>
  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matches as $match)
                                @php
                                    $match_time = $match->heure_match;
                                    $current_time = date('H:i');
                                    $result = $match->resultat_match;
                            
                                    if($current_time > $match_time) {
                                        $match_time = 'Started';
                                    }
                                    if($result !== null) {
                                        $match_time = $result;
                                    }
                                @endphp
                            
                                <tr>
                                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex flex-col justify-center items-center">
                                            <div class="flex-shrink-0 w-10 h-10 table-cell">
                                                <img class="w-full h-full " src="{{ $match->logo_equipe_1 }}" alt="" />
                                            </div>
                                            <div class="mt-3">
                                                <p class=" text-center whitespace-no-wrap text-sm font-Roboto-c">
                                                    {{ $match->equipe1_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2" class="pl-4">
                                                                                @if($match_time == $result)
                                            <p class="text-sm mb-1 text-center">Terminé</p>
                                        @else
                                            <p class="text-sm mb-1 text-center">{{ \Carbon\Carbon::parse($match->date_match)->format('d M') }}</p>
                                        @endif
                                        <div class="bg-black text-white p-2 rounded text-center text-sm font-Roboto-c">
                                            {{ $match_time }}
                                        </div>
                                    </td>
                                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex flex-col items-center  ">
                                            <div class="flex-shrink-0 w-10 h-10 table-cell">
                                                <img class="w-full h-full " src="{{ $match->logo_equipe_2 }}" alt="" />
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-gray-900 text-center whitespace-no-wrap text-sm font-Lato">
                                                    {{ $match->equipe2_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                            
                            
  
                                
                            </tbody>
                        </table>
                        
  
                    </div>
                    <div class="mt-5">
                        <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container md:w-full md:h-[300px]">
                            @csrf
                            @include('survey::standard', ['survey' => $sondages])
                        </form>
                    </div>
                    @endif
                    @else
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
  
                                    <th colspan="4" class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider font-Lato">
                                        Match d'aujourd'hui
                                    </th>
  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matches as $match)
                                @php
                                    $match_time = $match->heure_match;
                                    $current_time = date('H:i');
                                    $result = $match->resultat_match;
                            
                                    if($current_time > $match_time) {
                                        $match_time = 'Started';
                                    }
                                    if($result !== null) {
                                        $match_time = $result;
                                    }
                                @endphp
                            
                                <tr>
                                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex flex-col justify-center items-center">
                                            <div class="flex-shrink-0 w-10 h-10 table-cell">
                                                <img class="w-full h-full " src="{{ $match->logo_equipe_1 }}" alt="" />
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-gray-900 text-center whitespace-no-wrap text-sm font-Roboto-c">
                                                    {{ $match->equipe1_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2" class="pl-4">
                                                                                @if($match_time == $result)
                                            <p class="text-sm mb-1 text-center">Terminé</p>
                                        @else
                                            <p class="text-sm mb-1 text-center">{{ \Carbon\Carbon::parse($match->date_match)->format('d M') }}</p>
                                        @endif
                                        <div class="bg-black text-white p-2 rounded text-center text-sm font-Lato">
                                            {{ $match_time }}
                                        </div>
                                    </td>
                                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex flex-col items-center  ">
                                            <div class="flex-shrink-0 w-10 h-10 table-cell">
                                                <img class="w-full h-full " src="{{ $match->logo_equipe_2 }}" alt="" />
                                            </div>
                                            <div class="mt-3">
                                                <p class="text-gray-900 text-center whitespace-no-wrap text-sm font-Roboto-c">
                                                    {{ $match->equipe2_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                            
                            
  
                                
                            </tbody>
                        </table>
                        
  
                    </div>
                    <div class="mt-5">
                      <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container md:w-full md:h-[300px]">
                          @csrf
                          @include('survey::standard', ['survey' => $sondages])
                      </form>
                    </div>
                    @endif
                    {{-- <div class="mt-5">
                      <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container md:w-[300px] md:h-[300px]">
                          @csrf
                          @include('survey::standard', ['survey' => $sondages])
                      </form>
                  </div> --}}
                  </div>
                </div>
        
                </div>
                
            </main>
            
            <!-- main ends here -->
            
            <div class="pt-1 pb-8 container mx-auto sm:px-14 ">
              <h2 class="post-header relative text-sm font-semibold font-Lato"><span class="bg-main-color text-white rounded-full py-2 px-3">Article relatif</span></h2>
            </div>
              <div class="post-related flex  container mx-auto xl:px-14 flex-wrap xl:flex-nowrap">
                @forelse ($relatedArticle as $article)
                <article class="lg:max-w-[300px] md:mr-5">
                  <div class="md:h-[328px]  sm:w-96 md:w-full">
                    <div style="height:250px;" class="overflow-hidden rounded-lg ">
                      <a href="/sport/{{ $article->category->name . '/' . $article->slug }}">
                        <img src="{{ $article->image }}" class="mb-5 rounded-lg  object-cover hover:scale-110 w-full md:w-[500px] lg:w-full h-full" style="" alt="">
                    </a>
                    </div>
                  <p class="my-1 text-sm font-Lato"><span class="text-sm rounded text-gray-500">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}
</span></p>
                    
                  <div class="md:mt-3 lg:-mt-1.5 mb-2 text-justify font-Roboto-c md:pt-2" style="margin-top:5px">
                      <a href="/sport/{{ $article->category->slug . '/' .$article->slug }}">{{ $article->title }}</a>
                  </div>
                  </div>
                {{-- <div class="flex xl:items-center lg:flex-col xl:flex-row md:flex-row">
                  <p class="pb-3 text-sm font-Lato"><span class="pb-2 text-sm rounded text-gray-500">{{ strftime('%A %e %B %Y', strtotime($article->created_at)) }}</span></p>
                </div> --}}
    
              </article>
                @empty
                  
                @endforelse
              </div>
            </div>
            
            @include('frontend.components.footers')
    @include('frontend.components.scrollUp')

@endsection
