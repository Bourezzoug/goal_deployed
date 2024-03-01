@if($actuHome)
<main class="mt-10">

    <div class="block lg:flex lg:space-x-2 px-2 md:px-14 lg:p-0 mt-10 gap-3">
        <!-- post cards -->
        <div class="w-full lg:w-2/3">


        <div class="mb-4 flex items-center justify-between space-x-1">
            <h5 class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 font-Roboto-c" style="background-color:#1e3a8a">Actus</h5>
            <div class="flex-1 border-t-2 border-gray-200"></div>
            <a href="/actus" class="font-semibold text-gray-800 px-1 mb-2 text-sm md:text-base font-Roboto-c">Voir tous les articles <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        @forelse ($actuHome as $article)
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
<div class="w-full lg:w-1/3 px-3">

                <div>
                    {{-- <h2 class="text-2xl font-semibold leading-tight">Matches Schedule</h2> --}}
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>

                                    <th colspan="4" class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider font-Lato">
                                        Match Of The Week
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
                                                <p class="text-center whitespace-no-wrap text-sm font-Roboto">
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
                                                <p class="text-center whitespace-no-wrap text-sm font-Roboto-condensed">
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
                </div>
         </div>

        </div>
    </main>
@endif