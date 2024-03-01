
@extends('layouts.frontend')
@section('meta_description', 'description')

@section('content')
@include('frontend.components.headers')

<div class="2xl:mx-auto 2xl:container lg:px-20   md:px-6 py-9 px-0  sm:w-auto">
    <div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay hidden " id="header-overlay"></div>

<main class="">
        
    <div class="block lg:flex lg:space-x-2 px-4 lg:p-0  mb-10">
        <!-- post cards -->
        <div class="w-full lg:w-[70%]">
            <main class="lg:pt-8 bg-white ">
            <div class="lg:block">
                
            </div>
            @if(count($results) > 0)
            @forelse ($results as $article)
        <div class="relative rounded w-full lg:flex mb-4 sm:mb-10 lg:p-0 gap-1">
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
            @else
    <p>Pas de résultats.</p>
            @endif
            @if ($query)
            <div class="pb-10 w-4/5">
                {{ $results->links() }} 
            </div>
            @endif
        
            
            </main>
            



        </div>

        <!-- right sidebar -->
                <div class="w-full lg:w-[30%] sm:px-3">
            <main class=" pb-16 lg:pt-10 lg:pb-24 bg-white ">

                        
                <div class="flex justify-center lg:justify-between sm:px-4 mx-auto max-w-screen-xl ">
                    <div class="grid grid-cols-1 max-w-2xl">
                    
                        <div class="pt-1 pb-5">
                            <h2 class="post-header relative text-sm font-semibold font-Lato"><span class="bg-main-color text-white rounded-full py-2 px-3">Les plus vues</span></h2>
                        </div>
                        <div class="lg:max-w-md">
                @foreach ($mostViewdArticle as $article)
                <div class="flex sm:px-1 py-4">
                    <a href="sport/{{ $article->category->slug . '/' .$article->slug }}" class="flex-shrink-0  w-28 h-28 mr-4 overflow-hidden rounded">
                        <img alt="" class="w-full h-full object-cover hover:scale-110 transition-transform" src="{{ $article->image }}">
                    </a>
                    <div class="flex flex-col flex-grow">
                        <h2 class="font-Roboto " style="font-size:15px;font-weight:500">
                            <a  href="sport/{{ $article->category->slug . '/' .$article->slug }}" >{{ $article->title }}</a>
                        </h2>
                        
                        <p class="mt-auto text-xs font-Lato text-gray-400">{{ \Carbon\Carbon::parse($article->created_at)->isoFormat('dddd Do MMMM YYYY', 'LL', 'fr') }}
                        </p>
                    </div>
                </div>
                @endforeach
                        </div>
                </div>

                </div>
                <div class="mt-2 sm:px-4 max-w-2xl mx-auto">
                    
                                    <div class="mt-5 flex flex-col space-y-5">
                    {{-- <h4 class="font-Roboto text-[17px] uppercase">Social Media</h4> --}}
                    <a href="#" class="w-full bg-[#506fbf] rounded-full flex justify-between items-center my-2" style="background:#506fbf">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Facebook</span>
                        <div class="bg-[#445fa2] rounded-full " style="background:#445fa2;padding:0.75rem 1rem">
                            <i class="fa-brands fa-facebook text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="w-full bg-black bg-opacity-80 rounded-full flex justify-between items-center my-2" style="background:#272727">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Twitter</span>
                        <div class="bg-black rounded-full" style="padding:0.75rem 1rem">
                            <i class="fa-brands fa-x-twitter text-white"></i>
                        </div>
                    </a>

                    <a href="#" class="w-full bg-red-400 rounded-full flex justify-between items-center my-2">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Youtube</span>
                        <div class="bg-red-600 rounded-full" style="padding:0.75rem 1rem">
                            <i class="fa-brands fa-youtube text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="w-full rounded-full flex justify-between items-center my-2" style="background: radial-gradient(circle at 33% 100%,#fed373 4%,#f15245 30%,#d92e7f 62%,#9b36b7 85%,#515ecf)">
                        <span class="text-sm text-white" style="margin-left:1.25rem">Instagram</span>
                        <div class="bg-[#9b36b7] rounded-full" style="background:#9b36b7;padding:0.75rem 1rem">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </div>
                    </a>
                </div>
                    <form method="POST" id="sondage" action="{{ route('entries.store') }}" class="container">
                        @csrf
                        @include('survey::standard', ['survey' => $sondages])
                    </form>
                </div>
                </div>
                
            </main>
            
            
            <!-- main ends here -->
            </div>
@include('frontend.components.scrollUp')
@include('frontend.components.footers')
@endsection
