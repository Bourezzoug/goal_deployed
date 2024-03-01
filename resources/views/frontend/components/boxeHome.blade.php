@if($boxHome)
<main class="mt-10">

    <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 gap-3">
        <!-- post cards -->
        <div class="w-full lg:w-2/3">


        <div class="mb-4 flex items-center justify-between space-x-1">
            <h5 class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 font-Roboto-c" style="background-color:{{ $boxeHero->category->color }}">Combat</h5>
            <div class="flex-1 border-t-2 border-gray-200"></div>
            <a href="/combat" class="font-semibold text-gray-800 px-1 mb-2 text-sm md:text-base font-Roboto-c">Voir tous les articles <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="md:grid grid-cols-2  gap-x-10">
            @forelse ($combatHome as $boxeHer)
                <div class="md:max-w-sm bg-white  rounded-lg mb-5 sm:mb-0 relative">
                                <h3 class="font-Roboto absolute top-5 left-5 rounded text-white font-bold" style="padding:4px 10px 3px;font-size:11px;background:{{ $boxeHer->category->color }};z-index:1000;"><a href="{{ $boxeHer->category->slug }}">{{ $boxeHer->category->name }}</a></h3>
                    <div class="md:h-[340px] xl:mb-2">
                        <div class="rounded-t-lg md:h-56 overflow-hidden">
                            <a href="sport/boxe/{{ $boxeHer->slug }}">
                                <img class="h-full hover:scale-125 transition-transform w-full object-cover" src="{{ $boxeHer->image }}" alt="" />
                            </a>
                        </div>
                        <p class="my-1 text-sm font-Roboto"><span class="text-gray-500">{{ \Carbon\Carbon::parse($boxeHer->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}
 </span></p>
                        <div style="margin:5px 0">
                            <a href="sport/boxe/{{ $boxeHer->slug }}">
                                <h5 class="mt-3 lg:-mt-1.5 text-gray-800 font-medium  text-xl sm:text-2xl mb-2 md:text-justify font-Roboto-c"  style="font-size: 19px;font-weight:700">{{ $boxeHer->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
              
                @endforelse
            </div>


        </div>

        @if($bannerBoxeRight)
        
            <div class="w-full lg:w-1/3 px-3 pt-5">
                <form id="bannerClickForm-{{ $bannerBoxeRight->id }}" action="{{ route('banner.click', ['id' => $bannerBoxeRight->id]) }}" method="POST" target="_blank">
                    @csrf
                    <button type="submit" class=" bg-none border-none w-full">
                        <img id="banner-{{ $bannerBoxeRight->id }}" src="https://admanager.goal.ma{{ $bannerBoxeRight->image }}" data-banner-id="{{ $bannerBoxeRight->id }}" class="w-[300px] md:h-[600px] object-fill" alt="">
                    </button>
                </form>
            </div>
        @endif
        </div>
    </main>
    @endif