<header class="shadow-3xl relative font-playfair">
    <div class="fixed -left-96 top-0 h-screen w-96 bg-white  shadow-2xl z-[999] social-media transition-all">
        <div class="logo p-10 flex flex-col items-center h-full justify-center space-y-10 relative">

                <img src="{{ asset('images/image-6.png') }}" class="h-20" alt="">
                <p class="font-cormorant py-1 mt-1 text-[1rem]  max-w-md text-center">
                    Découvrez Goal.ma, votre source ultime d'informations sportives nationales et internationales. Restez informé des dernières actualités et événements passionnants dans le monde du sport.
                </p>
                <div class="flex items-center my-2 gap-2">
                  <a href="#" class=" bg-main-color px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                    <i class="fa-brands fa-facebook-f text-white"></i>
                  </a>
                  <a href="https://www.instagram.com/gardenia.secret/" target="_blank" class="px-3 py-2 border cursor-pointer  bg-main-color border-none rounded-full transition-all">
                    <i class="fa-brands fa-instagram text-white"></i>
                  </a>
                  <a href="#" class="px-2.5 py-2 border cursor-pointer  bg-main-color border-none rounded-full transition-all">
                    <i class="fa-brands fa-youtube text-white"></i>
                  </a>
                  <a href="#" class="px-3 py-2 border cursor-pointer  bg-main-color border-none rounded-full transition-all">
                    <i class="fa-brands fa-twitter text-white"></i>
                  </a>
                </div>

            <button class="absolute -top-7 right-5" id="close-social">
                <i class="fa-solid fa-xmark  text-2xl"></i>
            </button>
        </div>
    </div>
    <nav class="bg-white  px-4 lg:px-6 py-2.5  border-b-2  border-main-color">
        <div class="flex  justify-between items-center mx-auto max-w-screen-xl">
            <div class="hidden md:flex items-center space-x-2 flex-1">
                <button  type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " id="burger-social">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <form action="{{ route('search') }}" method="POST" class="m-0 hidden md:block">
                    @csrf
                    <input type="search" name="query" id="search-ipt-header" placeholder="Tapez votre recherche ici" class="h-full border-t-0 border-l-0 border-r-0 border border-b border-main-color focus:border-main-color active:border-main-color w-0 p-0 transition-all" style="box-shadow: none">
                    <i class="fa-solid fa-magnifying-glass text-gray-500 cursor-pointer text-lg" id="search-icon"></i>
                    <input type="submit" style="display: none;">
                </form>                            
            </div>
            <div class="block md:hidden flex-1">
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="flex justify-between items-center flex-1">
                <a href="/">
                    <img src="{{ asset('storage/image-6.png') }}" class="w-48" alt="logo goal.ma" />
                </a>
            </div>
            <div class="flex-1 md:flex-none"></div>
            <div class="flex items-center lg:order-2">
                <a href="{{ route('contact.index') }}" class="p-2 rounded text-main-color border-2 border-main-color bg-white hover:bg-main-color hover:text-white transition-all hidden md:block mr-2">Contactez-nous</a>
                <a href="{{ route('inscription.index') }}" class="p-2 rounded text-white border-2 border-main-color bg-main-color hover:scale-110 transition-transform hidden md:block">S'abonner</a>
            </div>
            <form action="{{ route('search') }}" method="POST" class="m-0 block md:hidden">
                @csrf
                <input type="search" name="query" id="search-ipt-header-2" placeholder="Tapez votre recherche ici" class="h-full border-t-0 border-l-0 border-r-0 border border-b border-main-color focus:border-main-color active:border-main-color w-0 p-0 transition-all" style="box-shadow: none">
                <i class="fa-solid fa-magnifying-glass text-gray-500 cursor-pointer text-lg" id="search-icon-2"></i>
                <input type="submit" style="display: none;">
            </form>     

        </div>

    </nav>        
    <div class="hidden justify-center items-center w-full lg:flex lg:w-auto lg:order-1 md:p-5" id="mobile-menu-2">
        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-7 lg:mt-0 items-center nav-link">
            <li class="border-gray-100 w-full lg:w-fit">
                <a href="/" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Acceuil</a>
            </li>
            @forelse ($categories as $category)
            <li class="border-gray-100 w-full lg:w-fit">
                <a href="/{{ $category->slug }}" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b  hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">{{ $category->name }}</a>
            </li>
            @empty
                
            @endforelse
            <li class="block lg:hidden border-gray-100 w-full">
                <a href="/divers" class=" block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b  ">Divers</a>
            </li>
            <li class="block lg:hidden border-gray-100 w-full">
                <a href="{{ route('contact.index') }}" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b  ">Contactez-nous</a>
            </li>
            <li class="block lg:hidden">
                <a href="{{ route('inscription.index') }}" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 ">S'abonner</a>            </li>
            </li>
            <div class="lg:inline-block text-left hidden">
            <div>
                <button type="button" class="inline-flex w-full  justify-center gap-x-1.5 py-2 font-bold text-gray-700" id="menu-button" aria-expanded="true" aria-haspopup="true">
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
                            <a href="/{{ $category->name }}" class="active text-gray-700 block text-sm font-semibold">{{ $category->name }}</a>
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
</header>
{{-- <header class="shadow-3xl relative">
    <nav class="bg-white  px-4 lg:px-6 py-2.5  border-b-2  border-main-color">
        <div class="flex  justify-between items-center mx-auto max-w-screen-xl">
            <div>
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="flex justify-between items-center">
                <a href="/">
                    <img src={{ asset('storage/image-6.png') }} class="m-auto w-48" alt="logo goal.ma" />
                </a>
            </div>
            <div class="flex items-center lg:order-2">

            </div>

        </div>

    </nav>        
    <div class="hidden justify-center items-center w-full lg:flex lg:w-auto lg:order-1 md:p-5" id="mobile-menu-2">
        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 items-center nav-link">
            <li class="border-gray-100 w-full lg:w-fit">
                <a href="/" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Acceuil</a>
            </li>
            @forelse ($categories as $category)
            <li class="border-gray-100 w-full lg:w-fit">
                <a href="/{{ $category->slug }}" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b  hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">{{ $category->name }}</a>
            </li>
            @empty
                
            @endforelse
            <li class="block lg:hidden border-gray-100 w-full">
                <a href="/divers" class=" block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b  ">Divers</a>
            </li>
            <li class="block lg:hidden border-gray-100 w-full">
                <a href="{{ route('contact.index') }}" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 border-b  ">Contactez-nous</a>
            </li>
            <li class="block lg:hidden">
                <a href="{{ route('inscription.index') }}" class="block text-center font-bold py-2 pr-4 pl-3 text-gray-700 ">S'abonner</a>            </li>
            </li>
            <div class="lg:inline-block text-left hidden">
            <div>
                <button type="button" class="inline-flex w-full  justify-center gap-x-1.5 py-2 font-bold text-gray-700" id="menu-button" aria-expanded="true" aria-haspopup="true">
                Divers
                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
                </button>
            </div>
            
            <div class="absolute shadow-3xl overflow-auto left-48 top-full  p-9  origin-top-right rounded-md bg-white  ring-1 ring-black ring-opacity-5 focus:outline-none dropdown hidden z-50 " role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <nav class="navBar " style="width:100%">
                <div class="container-s flex items-center">
                    <button id="prevButton" class="w-44 mr-10 -mt-3">
                        <img src="{{ asset('storage/chevron-left.png') }}" class="w-full p-1 bg-main-color rounded-full" alt="">
                    </button>
                    <ul class="nav hide-scrollbar" id="navList">
                        @foreach($subcategory as $key => $category)
                        <li class="px-10 py-10">
                            <a href="/{{ $category->name }}" class="active text-gray-700 block text-sm font-semibold">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <button id="nextButton" class="w-44 ml-10 -mt-3">
                        <img src="{{ asset('storage/chevron-right.png') }}" class="w-full p-1 bg-main-color rounded-full" alt="">
                    </button>
                </div>
                
                </nav>
            </div>
            </div>
            

            <a href="{{ route('contact.index') }}" class="p-2 rounded text-main-color border-2 border-main-color bg-white hover:bg-main-color hover:text-white transition-all hidden lg:block">Contactez-nous</a>
            <a href="{{ route('inscription.index') }}" class="p-2 rounded text-white border-2 border-main-color bg-main-color hover:scale-110 transition-transform hidden lg:block">S'abonner</a>
        </ul>
    </div>
</header> --}}