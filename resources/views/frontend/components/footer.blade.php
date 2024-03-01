<footer class="bg-gray-50 mt-5 p-6 ">
    <div class="flex justify-between items-center">
        <div class="h-0.5 w-full bg-gray-200"></div>
            <a href="/"><img src='{{ asset('storage/image-6.png') }}'class="relative" style="width:30rem;" alt="logo goal.ma" /></a>
        <div class="h-0.5 w-full bg-gray-200"></div>
    </div>
    @include('frontend.components.newsletter')
    {{-- <div class="flex flex-row md:flex-col mt-4 font-medium items-center nav-link justify-center">
        <ul class="flex flex-col md:flex-row lg:space-x-8 lg:mt-0 items-center nav-link py-4" style="justify-content: center;">
            @forelse ($categories->take(4) as $category)
                <li style="width: 120px;">
                    <a href="/{{ $category->name }}" class="block text-xl py-4 font-semibold  pr-4 pl-3 text-gray-700 hover:text-main-color transition-colors hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">{{ $category->name }}</a>
                </li>
            @empty
            @endforelse
        </ul>
    
        <ul class="flex flex-col md:flex-row lg:space-x-8 lg:mt-0 items-center nav-link md:mt-4" style="justify-content: center;">
            @forelse ($categories->skip(4) as $category)
                <li style="width: 120px;">
                    <a href="/{{ $category->name }}" class="block text-xl py-4 font-semibold  pr-4 pl-3 text-gray-700 hover:text-main-color transition-colors hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">{{ $category->name }}</a>
                </li>
            @empty
            @endforelse
            <li style="width: 120px;">
                <a href="/divers" class="block text-xl py-4 font-semibold  pr-4 pl-3 text-gray-700 hover:text-main-color transition-colors hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Divers</a>
            </li>
        </ul>
    </div> --}}
    <div class="h-0.5 w-full bg-gray-200 mt-16 "></div>
    <div class="flex flex-col items-center">
        <p class="text-xl font-medium py-3">Suivez-nous</p>
        <div class="flex py-3">
            <a href="#" class=" text-white bg-main-color text-2xl p-2 rounded-full w-10 h-10 flex items-center justify-center mx-2 hover:-translate-y-3 transition-transform">
                <i class="fab fa-facebook-f text-md text-base"></i>
            </a>
            <a href="#" class=" text-white bg-main-color text-2xl p-2 rounded-full w-10 h-10 flex items-center justify-center mx-2 hover:-translate-y-3 transition-transform">
                <i class="fab fa-linkedin-in text-base"></i>
            </a>
            <a href="#" class=" text-white bg-main-color text-2xl p-2 rounded-full w-10 h-10 flex items-center justify-center mx-2 hover:-translate-y-3 transition-transform">
                <i class="fab fa-twitter text-base"></i>
            </a>
        </div>
        <p class="text-md  py-3">© {{ date('Y',strtotime(now())) }} Goal.ma - Tous Droits Résérvés</p>
    </div>
    
    
</footer>
