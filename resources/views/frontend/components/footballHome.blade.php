@if($lastThreeFootball)
<main class="mt-10">

    <div class="block lg:flex lg:space-x-2 px-2 md:px-14 lg:p-0 mt-10 gap-3">
        <!-- post cards -->
        <div class="w-full lg:w-2/3">


        <div class="mb-4 flex items-center justify-between space-x-1">
            <h5 class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 font-Roboto-c" style="background-color:{{ $footballHero->category->color }}">Football</h5>
            <div class="flex-1 border-t-2 border-gray-200"></div>
            <a href="/football" class="font-semibold text-gray-800 px-1 mb-2 text-sm md:text-base font-Roboto-c">Voir tous les articles <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        @forelse ($lastThreeFootball as $footarticle)
        <div class="rounded w-full lg:flex mb-4 sm:mb-10 lg:p-0 gap-1">
            <a href="/sport/{{ $footarticle->category->slug . '/' .$footarticle->slug }}" class="md:rounded lg:rounded-none md:h-[20rem] md:w-full lg:h-48 lg:max-w-none max-w-full lg:w-101 overflow-hidden block flex-shrink-0 article-thumbnail"  >
                <img src="{{ $footarticle->image }}" class="md:rounded lg:rounded-none md:h-[20rem] md:w-full lg:h-48 lg:max-w-none w-full lg:w-101 object-cover hover:scale-110 transition-transform" style="height:100%" alt="">
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

        </div>

        <!-- right sidebar -->
        <div class="w-full lg:w-1/3 px-3">

        <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <table class="min-w-full text-sm text-gray-800">
                            <thead class="bg-gray-200 text-xs uppercase font-medium">
                                <tr>
                                    <th></th>
                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        Club
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        G
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        N
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        P
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                        Pts
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-50">
                            @forelse ($botolaPro as $club)
                            <tr class="bg-gray-50 hover:bg-gray-100">
                                <td class="pl-4">
                                    {{ $club->ordre }}
                                </td>
                                <td class="flex px-6 py-4 whitespace-nowrap">
                                    <img class="w-5" src="{{ $club->logo }}" alt="">
                                    <span class="ml-2 font-medium uppercase">{{ $club->name }}</span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $club->win }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $club->draw }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $club->lose }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $club->points }}
                                </td>

                            </tr>
                            @empty
                                
                            @endforelse
                            </tbody>
                                


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>
    </main>
@endif