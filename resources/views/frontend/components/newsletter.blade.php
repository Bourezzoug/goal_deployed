<div class="relative bg-main-color">
    {{-- <div class="absolute inset-x-0 bottom-0">
        <svg viewBox="0 0 224 12" fill="#f8fafc" class="w-full -mb-1 text-white" preserveAspectRatio="none">
            <path
                d="M0,0 C48.8902582,6.27314026 86.2235915,9.40971039 112,9.40971039 C137.776408,9.40971039 175.109742,6.27314026 224,0 L224,12.0441132 L0,12.0441132 L0,0 Z">
            </path>
        </svg>
    </div> --}}
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="relative max-w-2xl sm:mx-auto sm:max-w-xl md:max-w-2xl sm:text-center">
            <h2 class="mb-6 font-sans text-3xl text-center font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
              Recevez nos dernières actualités
            </h2>
            <form method="POST" action="/" id='newsLetterForm-second' class="flex flex-col items-center w-full mb-4 md:flex-row md:px-16">
                @csrf
                <input
          placeholder="Email"
          required
          type="email"
          name="email"
          {{-- id="email-error-2" --}}
          class="flex-grow w-full h-12 px-4 mb-3  transition duration-200 border-2 border-transparent rounded appearance-none md:mr-2 md:mb-0 bg-deep-purple-900 focus:border-teal-accent-700 focus:outline-none focus:shadow-outline"
        />
        <input 
            type="submit"
            class="inline-flex items-center justify-center w-full h-12 px-6 font-semibold tracking-wide bg-white shadow-xl transition duration-200 rounded  md:w-auto hover:text-deep-purple-900 bg-teal-accent-400 hover:bg-teal-accent-700 focus:shadow-outline focus:outline-none cursor-pointer text-main-color"
            value="S'abonner"
        />
                

            </form>
            <div id="email-error-2" class="text-red-500 text-sm"></div>

        </div>
    </div>
</div>