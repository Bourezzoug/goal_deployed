  <footer class="bg-gray-50" style="-webkit-font-smoothing: antialiased;">
    {{-- <img src="images/logo.png" class="h-20 mx-auto pt-8" alt=""> --}}
    <div class="flex flex-col md:flex-row container mx-auto px-6 text-black justify-between  pt-16">
        <div>
            <img src="{{ asset('images/image-6.png') }}" class="h-28" alt="">
            <p class="font-Roboto-c py-1 text-[1rem]  max-w-md">
              Goal.ma, votre rendez-vous incontournable pour l'actualité sportive. Retrouvez les dernières nouvelles sur l’actualité et les événements sportifs nationaux et internationaux pour rester connecté avec le monde du sport.
            </p>
            <div class="flex items-center my-2 gap-2">
              <a href="https://www.facebook.com/goalmarocofficiel" class="text-white bg-main-color px-3.5 py-2 border cursor-pointer  border-none rounded-full transition-all">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
              <a href="https://www.linkedin.com/company/goal-ma/" target="_blank" class="text-white px-3 py-2 border cursor-pointer  bg-main-color border-none rounded-full transition-all">
                <i class="fa-brands fa-linkedin-in"></i>
              </a>
              <a href="https://www.tiktok.com/@goal.ma" class="text-white px-3 py-2 border cursor-pointer  bg-main-color border-none rounded-full transition-all">
                <i class="fa-brands fa-tiktok"></i>
              </a>
            </div>
        </div>
        {{-- <div class="mt-5 md:mt-0">
            <h4 class="uppercase text-xl font-Lato">Concept</h4>
            <p class="font-Roboto-c py-1 mt-1 "><a href="#">Notre concept</a></p>
            <p class="font-Roboto-c py-1 "><a href="#">Activer une carte cadeau</a></p>
            <p class="font-Roboto-c py-1 "><a href="#">Magazine</a></p>
            <p class="font-Roboto-c py-1 "><a href="#">E-boutique</a></p>
            <p class="font-Roboto-c py-1 "><a href="{{ route('contact.index') }}">Contactez-nous</a></p>
          </div> --}}
        <div class="lg:mr-24 mt-5 md:mt-0">
          {{-- <h4 class="uppercase text-xl font-Lato">Support</h4> --}}
          <p class="font-Roboto-c py-1 mt-1  ">
            <a href="/contactez-nous">
              <i class="fa-solid fa-angles-right"></i>
              Rect. des données personnelles
            </a>
          </p>
          <p class="font-Roboto-c py-1 mt-1  ">
            <a href="/contactez-nous">
              <i class="fa-solid fa-angles-right"></i>
              Se désabonner
            </a>
          </p>
          <p class="font-Roboto-c py-1 mt-1">
            <a href="/contactez-nous">
              <i class="fa-solid fa-angles-right"></i>
              Contactez-nous
            </a>
          </p>
          <p class="font-Roboto-c py-1 mt-1  ">
            <a href="{{ asset('pdf/note-legale.pdf') }}">
              <i class="fa-solid fa-angles-right"></i>
              Note Légale
            </a>
          </p>
          <img src="{{ asset('images/cndp.png') }}" class="h-28 mt-6 mx-auto" alt="CNDP">
          <p class="font-Roboto-c py-1 mt-1  ">
            Accréditation N° :
          </p>
        </div>
    </div>
    <div class="nav-footer py-3 text-black border-t mt-12 border-[#5f5f5f]">
    </div>

      <div class="container font-Roboto-c px-6 mx-auto pb-3 flex justify-around text-sm text-black">
        <p>&copy; {{ date('Y',strtotime(now())) }} Goal.ma - Tous Droits Résérvés </p>
      </div>

</footer>