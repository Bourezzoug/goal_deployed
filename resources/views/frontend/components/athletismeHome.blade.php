@if($athHome)
<main class="mt-10">

    <div class="block lg:flex lg:space-x-2 px-2 md:px-14 lg:p-0 mt-10  gap-3">
        <!-- post cards -->
        <div class="w-full lg:w-[70%]">

            <div class="mb-4 flex items-center justify-between space-x-1">
                <h5 class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 font-Roboto-c" style="background-color:{{ $athletismeHero->category->color }}">Athlétisme</h5>
                <div class="flex-1 border-t-2 border-gray-200"></div>
                {{-- <a href="/athletisme" class="font-semibold text-gray-800 px-1 mb-2 text-sm md:text-base font-Roboto-c">Voir tous les articles <i class="fa-solid fa-arrow-right"></i></a> --}}
            </div>
        @forelse ($athHome as $article)
        <div class="rounded w-full lg:flex mb-4 sm:mb-10 lg:p-0 gap-1">
            <a href="/sport/{{ $article->category->slug . '/' .$article->slug }}" class="md:rounded lg:rounded-none md:h-[20rem] md:w-full lg:h-48 lg:max-w-none max-w-full lg:w-101 overflow-hidden block flex-shrink-0 article-thumbnail"  >
                <img src="{{ $article->image }}" class="md:rounded lg:rounded-none md:h-[20rem] md:w-full lg:h-48 lg:max-w-none w-full lg:w-101 object-cover hover:scale-110 transition-transform" style="height:100%" alt="">
            </a>
            

            <div class="bg-white rounded sm:px-4 flex flex-col  leading-normal ">
            <div>
                <div class="mt-3 lg:-mt-1.5 text-gray-800 font-medium  text-xl sm:text-2xl mb-2 md:text-justify font-Roboto-condensed font-bold" style="font-size:22px">
                    <a href="/sport/{{ $article->category->slug . '/' .$article->slug }}">{{ $article->title }}</a>
                </div>
                <div class="flex xl:items-center lg:flex-col xl:flex-row md:flex-row my-3">
                    <p class=" text-sm font-Roboto"><span class="pb-2 text-sm rounded text-gray-500">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}</span></p>
                </div>
                <p class=" text-gray-500 font-Roboto my-3" style="font-size:16px">
                                {!! Illuminate\Support\Str::limit(strip_tags($article->body), 200, '') !!}
                </p>
            </div>
            </div>
        </div>
        @empty

        @endforelse

        </div>

        <!-- right sidebar -->
        <div class="w-full lg:w-[30%] sm:px-3">

            {{-- {{ Banner 600 x 300 }} --}}
                <div class="pt-1 pb-8">
                    <h2 class="post-header relative text-sm font-semibold font-Roboto-c"><span class="bg-main-color text-white rounded-full py-2 px-3">Article récents</span></h2>
                </div>
                <div class="lg:max-w-md">
                         @foreach ($recentArticle as $article)
                            <div class="flex sm:px-1 py-4">
                                <a href="/sport/{{ $article->category->slug . '/' .$article->slug }}"  class="flex-shrink-0  w-28 h-28 mr-4 overflow-hidden rounded">
                                    <img alt="" class="w-full h-full object-cover hover:scale-110 transition-transform" src="{{ $article->image }}">
                                </a>
                                <div class="flex flex-col flex-grow">
                                <h2 class="font-Roboto " style="font-size:15px;font-weight:700">
                                    <a  href="sport/{{ $article->category->slug . '/' .$article->slug }}" >{{ $article->title }}</a>
                                </h2>
                                    <p class="mt-auto text-xs font-Lato text-gray-400">Il y a {{ $article->created_at->diffForHumans(null, true) }}</p>                                   
                                </div>
                            </div>
                        @endforeach 
                </div>
        </div>

        </div>
    </main>
    @endif