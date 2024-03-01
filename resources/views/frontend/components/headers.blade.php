
<header class="relative shadow-lg mb-2 font-Lato">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <nav class="flex items-center">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/image-6.png') }}" class="w-36" alt="">
                </a>
            </div>

        </nav>
        <div class="header-desktop">
            <div class="hidden justify-center items-center w-full lg:flex lg:w-auto lg:order-1 md:p-5" >
                <ul class="flex flex-col mt-4 font-semibold lg:flex-row lg:space-x-4 lg:mt-0 items-center nav-link">
                    <li class="border-gray-100 w-full lg:w-fit">
                        <a href="/" class="transition-all block text-center font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c hover:text-main-color">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" style="width:1.5rem;height:1.5rem" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        </a>
                    </li>
                    @php
                        $actus = \App\Models\Category::find(66);
                    @endphp
                    <li class="border-gray-100 w-full lg:w-fit">
                        <a href="/{{ $actus->name }}" class="block text-center font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c hover:text-main-color">
                            {{ $actus->name }}
                        </a>
                    </li>
                    @forelse ($categories as $category)
                    @if($category->id == 66 || $category->id == 64 || $category->id == 65 )
                        @continue

                    @else
                        <li class="border-gray-100 w-full lg:w-fit" style="margin-left:1.5rem">
                            <a href="/{{ $category->slug }}" class="nav-item block text-center font-base py-2 pr-4 pl-3 border-b hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c">{{ $category->name }}</a>
                        </li>
                    @endif
                @empty
                @endforelse
                @php
                $com_cat = \App\Models\Category::where('id',64)->first();
                $com_cat_sub = \App\Models\Category::where('parent_id',64)->get();
                $auto_cat = \App\Models\Category::where('id',65)->first();
                $auto_cat_sub = \App\Models\Category::where('parent_id',65)->get();
                @endphp
                                    <li style="margin-left:1.5rem">
                                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2  font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c" >
                                            {{ $com_cat->name }} 
                                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownNavbar" class="z-[1000] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                                                @forelse ($com_cat_sub as $cate)
                                                <li>
                                                    <a href="/{{ $cate->slug }}" class="block px-4 py-2 hover:bg-main-color hover:text-white">{{ $cate->name }}</a>
                                                </li>
                                                @empty
                                                    
                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                    <li style="margin-left:1.5rem">
                                        <button id="dropdownNavbarAutoLink" data-dropdown-toggle="dropdownNavbarAuto" class="flex items-center justify-between w-full py-2  font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c" >
                                            {{ $auto_cat->name }} 
                                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownNavbarAuto" class="z-[1000] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                                                @forelse ($auto_cat_sub as $categorie)
                                                <li>
                                                    <a href="/{{ $categorie->slug }}" class="block px-4 py-2 hover:bg-main-color hover:text-white">{{ $categorie->name }}</a>
                                                </li>
                                                @empty
                                                    
                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                    <li class="block lg:hidden border-gray-100 w-full">
                        <a href="/divers" class=" block text-center font-base py-2 pr-4 pl-3  border-b">Divers</a>
                    </li>
                    <li class="block lg:hidden border-gray-100 w-full">
                        <a href="{{ route('contact.index') }}" class="block text-center font-base py-2 pr-4 pl-3  border-b  ">Contactez-nous</a>
                    </li>
                    <li class="block lg:hidden">
                        <a href="{{ route('inscription.index') }}" class="block text-center font-base py-2 pr-4 pl-3  ">S'abonner</a>            </li>
                    </li>
                    <div class="lg:inline-block text-left hidden">
                        <li >
                            <button id="dropdownNavbarLink-divers" data-dropdown-toggle="dropdownNavbar-divers" class="flex items-center justify-between w-full py-2  font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c" >
                                Divers
                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar-divers" class="z-[1000] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                                    @forelse ($subcategory as $cat)
                                    <li>
                                        <a href="/{{ $cat->name }}" class="block px-4 py-2 hover:bg-main-color hover:text-white">{{ $cat->name }}</a>
                                    </li>
                                    @empty
                                        
                                    @endforelse
                                </ul>
                            </div>
                        </li>
                    

                    </div>
                    
        
        
                </ul>
            </div>
        </div>
        <div class="socials flex items-center space-x-2">

            <div class="flex items-center space-x-2 flex-1">
                    <i class="fa-solid fa-magnifying-glass text-gray-500 cursor-pointer text-lg ml-1 pr-2 hover:text-gray-800 transition-colors" id="search-icon"></i>
                <button  type="button" class="social-burger hidden  items-center  ml-1 text-sm text-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 " id="burger-social">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="burger-header hidden flex-1">
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 hover:text-gray-800 transition-colors rounded-lg lg:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="fixed -right-96 top-0 h-screen w-96 bg-white  shadow-3xl z-[99999] social-media transition-all">
        <div class="logo p-10 flex flex-col items-center h-full justify-center space-y-10 relative">

                <img src="{{ asset('images/image-6.png') }}" class="h-20" alt="">
                <p class="font-Roboto-c py-1 mt-1 text-[1rem]  max-w-md text-justify">
Goal.ma, votre rendez-vous incontournable pour l'actualité sportive. Retrouvez les dernières nouvelles sur l’actualité et les événements sportifs nationaux et internationaux pour rester connecté avec le monde du sport.
</p>
                                <div class="flex space-x-3">
                    
                                <a href="{{ route('contact.index') }}" class="block text-center font-Roboto-c font-bold py-2 pr-2  lg:p-0 relative header-contact">
                                    <i class="fa-solid fa-address-book text-lg "></i>
                                    <span class="header-txt">
                                        Contact
                                    </span>
                                </a>
                                <a href="{{ route('inscription.index') }}" class="block text-center font-Roboto-c font-bold py-2 pr-2  lg:p-0 relative header-inscription">
                                    <i class="fa-regular fa-envelope text-lg ml-1 "></i>
                                    <span class="header-txt">Inscrivez-vous</span>
                                </a>
                    
                </div>
                <div class="flex items-center my-2 gap-2">
                  <a href="https://facebook.com/goalmarocofficiel" target="_blank" class=" bg-main-color px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                    <i class="fa-brands fa-facebook-f text-white"></i>
                  </a>
                  <a href="https://www.linkedin.com/company/goal-ma/" target="_blank" class=" bg-main-color px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                    <i class="fa-brands fa-linkedin-in text-white"></i>
                  </a>
                  <a href="https://www.tiktok.com/@goal.ma" target="_blank" class=" bg-main-color px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                    <i class="fa-brands fa-tiktok text-white"></i>
                  </a>

                </div>


            <button class="absolute -top-7 left-5" id="close-social">
                <i class="fa-solid fa-xmark  text-2xl"></i>
            </button>
        </div>
        
    </div>
    <form action="{{ route('search') }}" method="POST" class="m-0 fixed left-1/2 z-[9999999] top-1/2 -translate-y-1/2 -translate-x-1/2 hidden" id="search-form">
        @csrf
        <div class="relative">
        <input type="search" name="query" id="search-ipt-header" placeholder="Tapez votre recherche ici" class="border-4 h-16 w-[300px] sm:w-[600px] p-4 transition-all text-lg border-main-color rounded focus:border-main-color active:border-main-color text-white" style="box-shadow: none;background:transparent">
        <button type="submit" class="bg-main-color h-full p-4" style="position:absolute;top:0;right:0;display:flex;align-items:center;border-radius:0;">
                <i class="fa-solid fa-magnifying-glass" style="color:#fff;font-size:17px" id="search-icon"></i>
        </button>
        </div>
        <!--<input type="submit" style="display: none;">-->
    </form>   
    <div class="header-mobile">
        <div class="hidden justify-center items-center w-full lg:flex lg:w-auto lg:order-1 md:p-5" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-semibold lg:flex-row lg:space-x-4 lg:mt-0 items-center nav-link">
                <li class="border-gray-100 w-full lg:w-fit">
                    <a href="/" class="block text-center font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c">Acceuil</a>
                </li>
                <li class="border-gray-100 w-full lg:w-fit">
                    <a href="{{ $actus->name }}" class="block text-center font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c">
                        {{ $actus->name }}
                    </a>
                </li>
                @forelse ($categories as $category)
                @if($category->id == 66 || $category->id == 64 || $category->id == 65 )
                        @continue

                @else
                <li class="border-gray-100 w-full lg:w-fit">
                    <a href="/{{ $category->slug }}" class="block text-center font-Roboto-c font-base py-2 pr-4 pl-3  border-b  hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">{{ $category->name }}</a>
                </li>
                @endif
                @empty
                    
                @endforelse
                <li style="margin-left:1.5rem" class="w-full flex">
                    <button id="dropdownNavbarCombatMobileLink" data-dropdown-toggle="dropdownNavbarCombatMobile" class="flex items-center justify-center w-full py-2  font-base pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c" >
                        {{ $com_cat->name }} 
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbarCombatMobile" class="z-[1000] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                            @forelse ($com_cat_sub as $cate)
                            <li>
                                <a href="/{{ $cate->slug }}" class="block px-4 py-2 hover:bg-main-color hover:text-white">{{ $cate->name }}</a>
                            </li>
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>
                </li>
                <li style="margin-left:1.5rem" class="w-full">
                    <button id="dropdownNavbarAutoMobileLink" data-dropdown-toggle="dropdownNavbarAutoMobile" class="flex items-center justify-center w-full  font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c" >
                        {{ $auto_cat->name }} 
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbarAutoMobile" class="z-[1000] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                            @forelse ($auto_cat_sub as $categorie)
                            <li>
                                <a href="/{{ $categorie->slug }}" class="block px-4 py-2 hover:bg-main-color hover:text-white">{{ $categorie->name }}</a>
                            </li>
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>
                </li>
                {{-- <div class="lg:inline-block text-left hidden"> --}}
                    <li class="block lg:hidden border-gray-100 w-full">
                        <button id="dropdownNavbarLink-divers-m" data-dropdown-toggle="dropdownNavbar-divers-m" class="flex items-center justify-center w-full py-2  font-base py-2 pr-4 pl-3  border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 font-Roboto-c" >
                            Divers
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar-divers-m" class="z-[1000] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                                @forelse ($subcategory as $cat)
                                <li>
                                    <a href="/{{ $cat->name }}" class="block px-4 py-2 hover:bg-main-color hover:text-white">{{ $cat->name }}</a>
                                </li>
                                @empty
                                    
                                @endforelse
                            </ul>
                        </div>
                    </li>
                
                {{-- </div> --}}
                <li class="block lg:hidden border-gray-100 w-full">
                    <a href="{{ route('contact.index') }}" class="block text-center font-base py-2 pr-4 pl-3  border-b  font-Roboto-c">Contactez-nous</a>
                </li>
                <li class="block lg:hidden">
                    <a href="{{ route('inscription.index') }}" class="block text-center font-base py-2 pr-4 pl-3  font-Roboto-c">S'abonner</a>            </li>
                </li>
                <div class="lg:inline-block text-left hidden">
                <div>
                    <button type="button" class="inline-flex w-full  justify-center gap-x-1.5 py-2 font-base " id="menu-button" aria-expanded="true" aria-haspopup="true">
                    Divers
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>
                
                <div class="absolute shadow-3xl overflow-auto left-48 top-full  p-6  origin-top-right rounded-md bg-white  ring-1 ring-black ring-opacity-5 focus:outline-none dropdown hidden z-50 " role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <nav class="navBar " style="width:100%">
                    <div class="container-s flex items-center">
                        <button id="prevButton" class="mr-10 -mt-3">
                            <img src="{{ asset('storage/chevron-left.png') }}" class="w-16 p-1 bg-main-color rounded-full" alt="">
                        </button>
                        <ul class="nav hide-scrollbar" id="navList">
                            @foreach($subcategory as $key => $category)
                            <li class="mt-2">
                                <a href="/{{ $category->name }}" class="active  block text-sm font-semibold">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <button id="nextButton" class=" ml-10 -mt-3">
                            <img src="{{ asset('storage/chevron-right.png') }}" class="w-16 p-1 bg-main-color rounded-full" alt="">
                        </button>
                    </div>
                    
                    </nav>
                </div>
                </div>
                
    
    
            </ul>
        </div>
    </div>
</header>


