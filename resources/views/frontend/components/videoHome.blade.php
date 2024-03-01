<main class="mt-1 video-slider bg-gray-100">

    <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 gap-3 container mx-auto p-6">
        <!-- post cards -->
        <div class="w-full">

        <div class="mb-4 flex items-center justify-between space-x-1" style="margin:15px">
            <h5 class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 font-Lato" style="background-color:{{ $videoTop->category->color }}">Vidéo</h5> 
             <div class="flex-1 border-t-2 border-gray-200"></div>
            {{-- <a href="/video" class="font-semibold text-gray-800 px-1 mb-2 text-sm md:text-base font-Lato">Voir tous les articles <i class="fa-solid fa-arrow-right"></i></a> --}}
        </div>

        {{-- <section class="">
            <div class="container py-6 mx-auto space-y-6">
                <div class="xl:grid grid-cols-12">
                    <div class="col-span-8 mb-5 sm:mb-0 ">
                        <div class="relative md:w-[700px] md:mx-auto">
                            <a  href="sport/{{ $videoTop->category->slug . '/' .$videoTop->slug }}" class="block gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12  relative z-100">
                                <div class="overlay -z-10"></div>
                                <img src="{{ $videoTop->image }}" alt="" class="object-cover w-full  rounded  lg:col-span-12   ">
                            </a>
                            <a href="sport/{{ $videoTop->category->slug . '/' .$videoTop->slug }}" class="absolute  bg-main-color p-3 rounded-full z-10" style="top:40%;left:50%;transform:translateX(-50%) translateY(-50%)">
                                    <img src="storage/play-white.png" class="h-12 w-12 pl-1" alt="">
                            </a>
                            <p class="my-1 text-sm"><span class="py-2 text-sm rounded text-gray-500 font-Lato">{{ strftime('%A %e %B %Y', strtotime($videoTop->created_at)) }}</span></p>
            
                            <a href="sport/{{ $videoTop->category->slug . '/' .$videoTop->slug }}">
                                <h5 class=" font-medium text-xl tracking-tight text-gray-800 font-Lato">{{ $videoTop->title }}</h5>
                            </a>
                            </div>
                    </div>
                    <div class="col-span-4">
                        @forelse ($lastthreevideo as $videos)
                        <div rel="noopener noreferrer" href="sport/{{ $videos->category->slug . '/' .$videos->slug }}" class="xl:max-w-sm mx-auto group hover:no-underline focus:no-underline md:w-[700px] md:mx-auto lg:mb-5 mb-5 sm:mb-0 ">
                            <div class="relative">
                            <div class="overlay -z-10"></div>

                                    <a href="sport/{{ $videos->category->slug . '/' .$videos->slug }}" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  bg-main-color p-3 rounded-full z-10">
                                        <img src="storage/play-white.png" class="h-7 w-7 pl-1" alt="">
                                </a> 
                                <a  href="sport/{{ $videos->category->slug . '/' .$videos->slug }}" class="block  gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12  relative z-100">
                                    <div class="overlay -z-10"></div>
                                    <img src="{{ $videos->image }}" alt="" class="object-cover w-full rounded xl:h-48 lg:col-span-12   ">
                                </a>
                            </div>
                                <div class="">
                                    <p class="my-1 text-sm font-Lato"><span class="py-2 text-sm rounded text-gray-500">{{ strftime('%A %e %B %Y', strtotime($videoTop->created_at)) }} </span></p>
                                    <a href="sport/{{ $videos->category->slug . '/' .$videos->slug }}">
                                        <h5 class="  text-xl font-medium tracking-tight text-gray-800 font-Lato">
                                            {{ $videos->title }}
        
                                        </h5>
                                    </a>

                                </div>
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>

        
            </div>
        </section> --}}
        <section class="slider ">
            @forelse ($lastthreevideo as $video)
            <div class="slide" >
                <figure class="relative">
                    <div class="font-Roboto-c bg-main-color w-fit rounded p-1 text-black absolute top-5 left-5 z-50">{{ \Carbon\Carbon::parse($video->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}</div>

                    <img src="{{ $video->image }}" class="object-cover" alt="" />
                                </figure>
                    <div class="neonText absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex items-center justify-center z-50">
                        <i class="fa-solid fa-play text-lg"></i>
                        {{-- <p>Hello</p> --}}
                    </div>
                    <div class="text">
                        <h2 class="font-Roboto-c lg:text-[25px] text-[22px] font-bold">
                            <a href="sport/{{ $video->category->slug . '/' .$video->slug }}">{{ $video->title }}</a>
                        </h2>
                        {{-- <p class="summary font-Roboto">{!! Illuminate\Support\Str::limit(strip_tags($video->body), 80, '') !!}</p> --}}
                                </div>
            </div>
            @empty
                
            @endforelse
        </section>
        <div class="flex justify-center items-center mt-5">
            <a href="/video" class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 font-Roboto-c bg-main-color" >Voir Plus</a>
        </div>
        </div>

        </div>
    </main>

