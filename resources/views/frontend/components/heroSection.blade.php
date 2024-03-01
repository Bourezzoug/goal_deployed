    <div class=" 2xl:mx-auto 2xl:container lg:px-20  md:px-6 py-1 px-4 sm:w-auto lg:flex">  
      @if($bannerHabillageLeft)
      {{-- @foreach($bannerHabillageLeft as $bannerHabillageLeft) --}}
      <div class=" -my-9 py-[1.64rem] px-4">
        <form id="bannerClickForm-{{ $bannerHabillageLeft->id }}" action="{{ route('banner.click', ['id' => $bannerHabillageLeft->id]) }}" method="POST" target="_blank">
          @csrf
          <button type="submit" class=" bg-none border-none w-full">
              <img id="banner-{{ $bannerHabillageLeft->id }}" src="https://admanager.goal.ma{{ $bannerHabillageLeft->image }}" class="w-[385px] h-[800px] hidden lg:block" data-banner-id="{{ $bannerHabillageLeft->id }}" alt="">
          </button>
        </form>
      </div>
      {{-- @endforeach --}}
      @endif
    <div class="max-w-screen-xl p-5 mx-auto  ">
        <div class="grid grid-cols-1 gap-1 md:grid-cols-2 lg:grid-cols-12  lg:grid-rows-2">

        <div class="slideHero relative lg:row-span-2 md:col-span-12 lg:col-span-6">
          @forelse ($heroArticle as $article)
          <div class="slide relative">
              <figure class="figure-hero">
                  <img src="{{ $article->image }}" class="object-cover" style="height:100% !important" alt="" />
                  <a href="/{{ $article->category->slug }}" class="font-Roboto-c w-fit rounded p-1 text-white absolute top-5 left-3 z-50" style="background:{{ $article->category->color }}">{{ $article->category->name }}</a>
                  <div class="absolute right-5 top-3 flex flex-col justify-start text-center text-white z-[999]">
                    <span class="text-3xl font-semibold leadi tracki">{{ $article->created_at->format('d') }}</span>
                    <span class="leadi uppercase">{{ $article->created_at->format('M') }}</span>
                  </div>
              </figure>
              @if($article->category->name == 'Video')
                  <a href="sport/{{ $article->category->slug . '/' .$article->slug }}" class="neonText absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center justify-center z-50">
                    <i class="fa-solid fa-play text-lg"></i>
                  </a>
              @endif
                  <div class="text" style="padding-bottom:25px !important">
                      <h2 class="font-Roboto-c font-bold lg:text-[26px] text-[22px]  " >
                          <a  href="sport/{{ $article->category->slug . '/' .$article->slug }}">{{ $article->title }}</a>
                      </h2>
                      <p class="font-Roboto pt-1 text-[14px] text-[#ccc]">{!! Illuminate\Support\Str::limit(strip_tags($article->body), 200, '') !!}</p>
                  </div>
          </div>
          @empty
              
          @endforelse
        </div>
        
        <div class="md:col-span-6 lg:row-span-2 grid grid-cols-12 gap-1">
          <div class="col-span-12 md:col-span-6 relative flex items-end justify-start w-full text-left bg-center bg-cover  h-96 group " style="background-image: url('{{ $footballHero->image }}');">
            <div class="absolute inset-0 bg-black opacity-60 z-10"></div>
            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b "></div>
            <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
              <h3 class="z-[999]"><a href="{{ $footballHero->category->name }}" class="px-3 py-2  text-sm  tracki capitalize  text-white  rounded font-Roboto-c" style="background: {{ $footballHero->category->color }}">{{ $footballHero->category->name }}</a></h3>
              <div class="flex flex-col justify-start text-center text-white z-[999]">
                <span class="text-3xl font-semibold leadi tracki">{{ $footballHero->created_at->format('d') }}</span>
                <span class="leadi uppercase">{{ $footballHero->created_at->format('M') }}</span>
              </div>
            </div>
            <h2 class="z-10 p-5 ">
              <a href="/sport/{{ $footballHero->category->name . '/' .$footballHero->slug }}" class="  hover:underline text-white font-Roboto-c font-bold" style='font-size:18px'>{{ $footballHero->title }}</a>
            </h2>
          </div>
          <div class="col-span-12 md:col-span-6 relative flex items-end justify-start w-full text-left bg-center bg-cover  h-96 group " style="background-image: url('{{ $tennisHero->image }}');">
            <div class="absolute inset-0 bg-black opacity-60 z-10"></div>
            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b "></div>
            <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
              <h3 class="z-[999]"><a href="{{ $tennisHero->category->name }}"class="px-3 py-2 text-sm  tracki capitalize font-Roboto-c  text-white rounded" style="background-color:{{ $tennisHero->category->color }}">{{ $tennisHero->category->name }}</a></h3>
              <div class="flex flex-col justify-start text-center z-[999] text-white">
                <span class="text-3xl font-semibold leadi tracki">{{ $tennisHero->created_at->format('d') }}</span>
                <span class="leadi uppercase">{{ $tennisHero->created_at->format('M') }}</span>
              </div>
            </div>
            <h2 class="z-10 p-5">
              <a href="/sport/{{ $tennisHero->category->name . '/' .$tennisHero->slug }}" class=" hover:underline font-Roboto-c font-bold text-white" style='font-size:18px'>{{ $tennisHero->title }}</a>
            </h2>
          </div>
          <div class="col-span-12 md:col-span-6 relative flex items-end justify-start w-full text-left bg-center bg-cover  h-96 group " style="background-image: url('{{ $basketHero->image }}');">
            <div class="absolute inset-0 bg-black opacity-60 z-10"></div>
            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b "></div>
            <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
              <h3 class="z-[999]"><a href="/sport/{{ $basketHero->category->name }}" class="px-3 py-2 text-sm  tracki capitalize  text-white rounded font-Roboto-c" style="background: {{ $basketHero->category->color }}">{{ $basketHero->category->name }}</a></h3>
              <div class="flex flex-col justify-start text-center text-white z-[999]">
                <span class="text-3xl font-semibold leadi tracki">{{ $basketHero->created_at->format('d') }}</span>
                <span class="leadi uppercase">{{ $basketHero->created_at->format('M') }}</span>
              </div>
            </div>
            <h2 class="z-10 p-5">
              <a href="/sport/{{ $basketHero->category->name . '/' .$basketHero->slug }}" class="  hover:underline text-white font-Roboto-c font-bold" style='font-size:18px'>{{ $basketHero->title }}</a>
            </h2>
          </div>

          <div class="col-span-12 md:col-span-6 relative flex items-end justify-start w-full text-left bg-center bg-cover  h-96 group " style="background-image: url('{{ $peopleHero->image }}');">
            <div class="absolute inset-0 bg-black opacity-60 z-10"></div>
            <div class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b "></div>
            <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
              <h3 class="z-[999]"><a href="{{ $peopleHero->category->name }}" class="px-3 py-2 text-sm  tracki capitalize  text-white rounded font-Roboto-c" style="background:{{ $peopleHero->category->color }}">{{ $peopleHero->category->name }}</a></h3>
              <div class="flex flex-col justify-start text-center text-white z-[999]">
                <span class="text-3xl font-semibold leadi tracki">{{ $peopleHero->created_at->format('d') }}</span>
                <span class="leadi uppercase">{{ $peopleHero->created_at->format('M') }}</span>
              </div>
            </div>
            <h2 class="z-10 p-5">
              <a href="/sport/{{ $peopleHero->category->name . '/' .$peopleHero->slug }}" class=" hover:underline text-white font-Roboto-c font-bold" style='font-size:18px'>{{ $peopleHero->title }}</a>
            </h2>
          </div>
        </div>
        </div>
    </div>
    @if($bannerHabillageRight)
    {{-- @foreach($bannerHabillageRight as $bannerHabillageRight) --}}

    <div class="ml-2 -my-9 py-[1.64rem] px-4">
      <form id="bannerClickForm-{{ $bannerHabillageRight->id }}" action="{{ route('banner.click', ['id' => $bannerHabillageRight->id]) }}" method="POST" target="_blank">
        @csrf
        <button type="submit" class=" bg-none border-none w-full">
            <img id="banner-{{ $bannerHabillageRight->id }}" src="https://admanager.goal.ma{{ $bannerHabillageRight->image }}" class="w-[385px] h-[800px] hidden lg:block" data-banner-id="{{ $bannerHabillageRight->id }}" alt="">
        </button>
      </form>
    </div>
    {{-- @endforeach --}}
    @endif
  </div>