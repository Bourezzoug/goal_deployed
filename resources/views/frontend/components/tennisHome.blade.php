@if($tennisHome)
<main class="mt-10">

    <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 mb-10 gap-3">
        <!-- post cards -->
        <div class="w-full lg:w-[70%]">


        <div class="mb-4 flex items-center justify-between space-x-1">
            <h5 class="font-semibold text-lg capitalize p-2 rounded text-white mb-2 font-Roboto-c" style="background-color:{{ $tennisHero->category->color }}">Tennis</h5>
            <div class="flex-1 border-t-2 border-gray-200"></div>
            <a href="/tennis" class="font-semibold text-gray-800 px-1 mb-2 text-sm md:text-base font-Roboto-c">Voir tous les articles <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="md:grid grid-cols-2  gap-x-10">
            @forelse ($tennisHome as $tennisarticle)
                <div class="md:max-w-sm bg-white  rounded-lg mb-5 sm:mb-0 ">
                    <div class="md:h-[340px] xl:mb-2 card-article">
                        <div class="md:h-56 overflow-hidden rounded-t-lg">
                            <a href="sport/tennis/{{ $tennisarticle->slug }}">
                                <img class=" h-full hover:scale-125 transition-transform w-full object-cover" src="{{ $tennisarticle->image }}" alt="" />
                            </a>
                        </div>
                        <p class="my-2 text-sm font-Roboto"><span class="text-gray-500">{{ \Carbon\Carbon::parse($tennisarticle->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}
 </span></p>
                        <div style="margin:5px 0">
                            <a href="sport/tennis/{{ $tennisarticle->slug }}">
                                <h5 class="mt-3 lg:-mt-1.5 text-gray-800 font-medium  text-xl sm:text-2xl mb-2 md:text-justify font-Roboto-c"  style="font-size: 19px;font-weight:700">{{ $tennisarticle->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
              
                @endforelse
            </div>


        </div>

        <!-- right sidebar -->
        <div class="w-full lg:w-[30%] px-3 pt-5">
            {{-- @if($bannerTennisRight)

            <a href="{{ $bannerTennisRight->lien }}" target="_blank">
                <img src="{{ $bannerTennisRight->image }}" class="w-full h-[600px] object-fill"  alt="">
            </a>
            @endif --}}
            @if($bannerTennisRight)
            <div class="2xl:mx-auto 2xl:container pt-2">
                <form id="bannerClickForm-{{ $bannerTennisRight->id }}" action="{{ route('banner.click', ['id' => $bannerTennisRight->id]) }}" method="POST" target="_blank">
                    @csrf
                    <button type="submit" class=" bg-none border-none ">
                        <img id="banner-{{ $bannerTennisRight->id }}" src="https://admanager.goal.ma{{ $bannerTennisRight->image }}" data-banner-id="{{ $bannerTennisRight->id }}" class="w-[300px] md:h-[300px] object-fill" alt="">
                    </button>
                </form>
            </div>
            @endif
        <!--    <form method="POST" action="/sondage" id="sondage" class="container mt-10 md:w-[300px]">-->
                
        <!--        @csrf-->
        <!--        @include('survey::standard', ['survey' => $sondages])-->
        <!--    </form>-->
        <!--    <div class="xs:max-w-xs mt-10">-->
        <!--        {{-- <h4 class="font-heading text-xl font-Lato mb-2" >NewsLetter</h4> --}}-->
        <!--        <form method="POST" action="/" id='newsLetterForm-second'>-->
        <!--          @csrf-->
        <!--          <div class="flex items-center space-x-2">-->
        <!--            <div class="relative xs:mb-0 xs:mr-4 flex-1">-->
        <!--              <span class="absolute left-0 top-1/2 ml-4 transform -translate-y-1/2">-->
        <!--                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >-->
        <!--                  <path d="M19 4H5C4.20435 4 3.44129 4.31607 2.87868 4.87868C2.31607 5.44129 2 6.20435 2 7V17C2 17.7956 2.31607 18.5587 2.87868 19.1213C3.44129 19.6839 4.20435 20 5 20H19C19.7956 20 20.5587 19.6839 21.1213 19.1213C21.6839 18.5587 22 17.7956 22 17V7C22 6.20435 21.6839 5.44129 21.1213 4.87868C20.5587 4.31607 19.7956 4 19 4ZM18.59 6L12.71 11.88C12.617 11.9737 12.5064 12.0481 12.3846 12.0989C12.2627 12.1497 12.132 12.1758 12 12.1758C11.868 12.1758 11.7373 12.1497 11.6154 12.0989C11.4936 12.0481 11.383 11.9737 11.29 11.88L5.41 6H18.59ZM20 17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H5C4.73478 18 4.48043 17.8946 4.29289 17.7071C4.10536 17.5196 4 17.2652 4 17V7.41L9.88 13.29C10.4425 13.8518 11.205 14.1674 12 14.1674C12.795 14.1674 13.5575 13.8518 14.12 13.29L20 7.41V17Z" fill="#80818C"></path>-->
        <!--                </svg>-->
        <!--              </span>-->
        <!--              <input class="w-full flex-1 p-12 pr-4 py-4 text-sm  rounded-lg  border border-gray-700 outline-none" type="email" name="email" placeholder="S'abonner à la newsletter" >-->
        <!--            <div style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div></div>-->
        <!--            <button class="flex flex-shrink-0 ml-auto xs:ml-0 items-center justify-center w-12 h-12 text-white hover:text-main-color bg-main-color hover:bg-white rounded-full transition duration-200 shadow-xl" type="submit">-->
        <!--              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >-->
        <!--                <path d="M20.3398 9.32L6.33976 2.32C5.78725 2.04501 5.16338 1.94711 4.55319 2.03965C3.94301 2.13219 3.37622 2.41067 2.93009 2.83711C2.48396 3.26356 2.18021 3.81722 2.06025 4.42261C1.94029 5.028 2.00996 5.65565 2.25976 6.22L4.65976 11.59C4.71422 11.7198 4.74226 11.8592 4.74226 12C4.74226 12.1408 4.71422 12.2802 4.65976 12.41L2.25976 17.78C2.05646 18.2367 1.97051 18.737 2.00974 19.2354C2.04896 19.7337 2.2121 20.2144 2.48434 20.6337C2.75658 21.053 3.12928 21.3976 3.56858 21.6362C4.00788 21.8748 4.49984 21.9999 4.99976 22C5.46799 21.9953 5.92925 21.886 6.34976 21.68L20.3498 14.68C20.8464 14.4302 21.2638 14.0473 21.5555 13.5741C21.8471 13.1009 22.0016 12.5559 22.0016 12C22.0016 11.4441 21.8471 10.8991 21.5555 10.4259C21.2638 9.95269 20.8464 9.56981 20.3498 9.32H20.3398ZM19.4498 12.89L5.44976 19.89C5.26592 19.9783 5.05949 20.0082 4.85815 19.9758C4.6568 19.9435 4.47017 19.8503 4.32327 19.7089C4.17638 19.5674 4.07624 19.3844 4.03629 19.1844C3.99634 18.9844 4.01849 18.777 4.09976 18.59L6.48976 13.22C6.5207 13.1483 6.54741 13.0748 6.56976 13H13.4598C13.725 13 13.9793 12.8946 14.1669 12.7071C14.3544 12.5196 14.4598 12.2652 14.4598 12C14.4598 11.7348 14.3544 11.4804 14.1669 11.2929C13.9793 11.1054 13.725 11 13.4598 11H6.56976C6.54741 10.9252 6.5207 10.8517 6.48976 10.78L4.09976 5.41C4.01849 5.22296 3.99634 5.01555 4.03629 4.81557C4.07624 4.61559 4.17638 4.4326 4.32327 4.29115C4.47017 4.14969 4.6568 4.05653 4.85815 4.02415C5.05949 3.99177 5.26592 4.02173 5.44976 4.11L19.4498 11.11C19.6136 11.1939 19.751 11.3214 19.847 11.4784C19.943 11.6355 19.9938 11.816 19.9938 12C19.9938 12.184 19.943 12.3645 19.847 12.5216C19.751 12.6786 19.6136 12.8061 19.4498 12.89V12.89Z" fill="currentColor"></path>-->
        <!--              </svg>-->
        <!--            </button>-->
        <!--          </div>-->
        <!--        </form>-->
        <!--     </div>-->
        <!--</div>-->

        </div>
    </main>
@endif