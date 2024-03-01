<div>
  
    {{-- <x-jet-dialog-modal wire:model="showCreateModel" maxWidth='7xl'> --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Créer un nouvel article') }}
            </h2>
        </x-slot>
  
        <div class="container mx-auto p-6">
            <form wire:submit.prevent="create" id="forms" autocomplete="off" enctype="multipart/form-data">
  
                {{-- <x-slot name="content"> --}}
                  <div class="container mx-auto p-6">        
              
                      <div class="xl:grid grid-cols-2  md:grid-cols-6  gap-8">
                        <div class="xl:grid col-span-4">
                            <div class="col-span-4 md:col-span-2  lg:col-span-4">
                                <main class="p-5 pt-0 ">
                                    <x-jet-label for="title" value="{{ __('Titre') }}"/>
                                      <div class="flex  items-start w-full">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="titre">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-indigo-500 text-white"
                                              >
                                                <span>Titre de l'article</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-indigo-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="py-5 xl:mr-6 pl-3">
                                                <x-jet-label for="title" value="{{ __('Titre') }}"/>
                                                <x-jet-input wire:model.defer="title" id="titre" type="text" class="mt-1 block w-full lg:w-96 xl:w-100 input-field"/>
                                                <x-jet-input-error for="title" class="mt-2 input-error"/>
                                              </div>
                
                
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                    
                            <div class="col-span-1 md:col-span-2  lg:col-span-4 mt-6">
                                <main class="p-5 pt-0 ">
                                    <x-jet-label for="extrait" value="{{ __('extrait') }}"/>
                                      <div class="flex  items-start w-full">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="extrait">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-indigo-500 text-white"
                                              >
                                                <span>Extrait de l'article</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-indigo-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="py-5 xl:mr-6 pl-3">
                                                <x-jet-label for="excerpt" value="{{ __('Extrait') }}"/>
                                                <textarea id="message"  wire:model.defer="excerpt" rows="4" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500       w-full lg:w-96 xl:w-100" placeholder="Extrait..."></textarea>
                                                <x-jet-input-error for="excerpt" class="mt-2 input-error"/>                
                                              </div>
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                            <div class="col-span-1 md:col-span-2  lg:col-span-4 mt-6">
                                <main class="p-5 pt-0 ">
                                    <x-jet-label for="contenu" value="{{ __('Contenu') }}"/>
                                      <div class="flex  items-start w-full">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="contenu">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-indigo-500 text-white"
                                              >
                                                <span>Contenu de l'article</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-indigo-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="py-5 xl:mr-6 pl-3">
                                                <div wire:ignore>
                                                  <div class="form-control" wire:model.defer="body" id="summary-ckeditor"></div>
                                              </div>
              {{-- <script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.0/dist/tinymce.min.js" referrerpolicy="origin"></script> --}}
                                              
                                                  <script>
                                                      document.addEventListener('livewire:load', function () {
                                                          initEditor();
                                              
                                                          window.livewire.on('render', function () {
                                                              initEditor();
                                                          });
                                                      });
                                              
                                                      function initEditor() {
                                                        tinymce.init({
                                                            selector: '#summary-ckeditor',
                                                            
                                                            // paste_as_text: true
                                                            plugins: 'lists link image charmap print preview hr anchor pagebreak paste',
                                                            paste_as_text: true,
                                                            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                                                            height: 300,
                                                            setup: function (editor) {
                                                                editor.on('change', function () {
                                                                    window.livewire.emit('bodyUpdated', editor.getContent());
                                                                });
                                                            },
                                                            paste_data_images: true,
                                                        });
                                                    }
      
                                                  </script>
                                              
                                              
                                              
                                                
                                                
                                              </div>
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                            <div class="col-span-1 md:col-span-2  lg:col-span-4 mt-6">
                                <main class="p-5 pt-0">
                                    <x-jet-label for="Source" value="{{ __('Source') }}"/>
                                      <div class="flex  items-start w-full">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="source">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-emerald-500 text-white"
                                              >
                                                <span>Source</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-emerald-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="pt-5 xl:mr-6 pl-3">
                                                <x-jet-label for="source" value="{{ __('Source') }}"/>
                                                <x-jet-input wire:model.defer="source" id="source" type="text" class="input-field mt-1 block w-full lg:w-96 xl:w-100"/>
                                                <x-jet-input-error for="source" class="mt-2 input-error"/>
                                              </div>
                                              <input type="hidden" wire:model="author_id" value="{{ Auth::id() }}">
                                              <div class="py-5 xl:mr-6 pl-3">
                                                <x-jet-label for="source_link" value="{{ __('Lien de la source') }}"/>
                                                <x-jet-input wire:model.defer="source_link" id="source_link" type="text" class="input-field mt-1 block w-full lg:w-96 xl:w-100"/>
                                                <x-jet-input-error for="source_link" class="mt-2 input-error"/>
                                              </div>

                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                            <div class="col-span-1 md:col-span-2  lg:col-span-4 mt-6">
                                <main class="p-5 pt-0 ">
                                    <x-jet-label for="Champs additionnels" value="{{ __('Champs additionnels') }}"/>
                                      <div class="flex  items-start w-full">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="champs">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                              >
                                                <span>Champs additionnels</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-stone-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              {{-- <div class="pt-5 xl:mr-6 pl-3">
                                                <x-jet-label for="tags" value="{{ __('Tags') }}"/>
                                                <textarea id="tags"  wire:model.defer="tags" rows="4" class="block p-2.5 input-field text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500       w-full " placeholder="Veuillez séparer vos tags avec des virgules"></textarea>
                                                <x-jet-input-error for="tags" class="mt-2 input-error"/>   
                                              </div> --}}

                                              <div class="pt-5 xl:mr-6 pl-3">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <x-jet-checkbox wire:model.defer="video_youtube" id="video_youtube" type="text" class="sr-only peer" />
                                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                                                    <span class="ml-3 text-sm font-medium text-gray-900 ">Video youtube</span>
                                                </label>
                                              </div>
                                              <div class="py-5 xl:mr-6 pl-3">
                                                <x-jet-label for="lien_video" value="{{ __('Lien Video') }}"/>
                                                <x-jet-input wire:model.defer="lien_video" id="lien_video" type="text" class="input-field mt-1 block w-full lg:w-96 xl:w-100"/>
                                                <x-jet-input-error for="lien_video" class="mt-2 input-error"/>
                                              </div>
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                        </div>
                        <div class="grid col-span-2">
                            <div class="col-span-4 md:col-span-2  lg:col-span-2">
                                <!-- component -->
                                    <main class="p-5 pt-0 ">
                                    <x-jet-label for="title" value="{{ __('Titre') }}"/>
                                      <div class="flex justify-center items-start ">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-yellow-500 text-white"
                                              >
                                                <span>Détails de l'article</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-yellow-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="pt-5 mr-5 pl-3">
                                                <x-jet-label for="slug" value="{{ __('URL Slug') }}"/>
                                                <x-jet-input wire:model.defer="slug" id="slug" type="text" class="input-field mt-1 block w-full xl:w-80"/>
                                                <x-jet-input-error for="slug" class="mt-2 input-error"/>
                                              </div>
                                            <script>
document.getElementById('titre').addEventListener('input', function() {
  var title = this.value;
  var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
  document.getElementById('slug').value = slug;
  Livewire.emit('slugUpdated', slug); // Emit an event to update the slug property in Livewire component
});
                                            </script>
<div class="pt-5 mr-5 pl-3">
    <x-jet-label class="text-xs" for="categorieID" value="{{ __('Catégories') }}"/>
    <x-select wire:model="categorieID" class="input-field mt-1">
        <option value="" readonly="true" hidden="true" selected>{{ __('Selectionner une catégorie') }}</option>
        @forelse($categories as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @empty
        @endforelse
    </x-select>
    <x-jet-input-error for="categorieID" class="mt-2 input-error"/>
</div>

@if($categorieID == 8 || $categorieID == 64 || $categorieID == 65)
    <div class="pt-5 mr-5 pl-3">
        <x-jet-label class="text-xs" for="sous-catégorie" value="{{ __('Sous catégories') }}"/>
        <x-select wire:model="sous_categorieID" class="input-field mt-1">
            <option value="" readonly="true" hidden="true" selected>{{ __('Selectionner une catégorie') }}</option>
            @forelse($sous_categories as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @empty
            @endforelse
        </x-select>
        <x-jet-input-error for="sous_categorieID" class="mt-2 input-error"/>
    </div>
@endif

                                              
                                              <div class="pt-5 mr-5 pl-3">
                                                
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                  <x-jet-checkbox wire:model.defer="miseavant" id="miseavant" type="text" class="sr-only peer" />
                                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                                                  <span class="ml-3 text-sm font-medium text-gray-900 ">Mise en avant</span>
                                              </label>
                                              @if(session('alert_error'))
                                              <div class="text-sm text-red-300">{{ session('alert_error') }}</div>
                                              @endif
                                                <x-jet-input-error for="miseavant" class="mt-2 input-error"/>
                                              </div>
                                              <div class="py-5 mr-5 pl-3">
                                                <x-jet-label class="text-xs" for="status" value="{{ __('Status') }}"/>
                                                <x-select wire:model="status"  class="input-field mt-1">
                                                  <option value="" readonly="true" hidden="true" selected>{{ __('Status de l\'article') }}</option>
                                                  <option value="Publié">Publié</option>
                                                  <option value="Brouillon">Brouillon</option>
                                                  <option value="En_attente">En attente</option>
                                              </x-select>
                                              <x-jet-input-error for="status" class="mt-2 input-error"/>
                                              @if($status == 'En_attente')
                                                  <!-- Show date picker component here -->
                                                  <div class="py-5">
                                                    <x-jet-input wire:model.defer="publication_date" type="datetime-local" class="input-field mt-1 block w-full xl:w-80" :min="now()->format('Y-m-d\TH:i')"   />
                                                  </div>
                                                  <x-jet-input-error for="publication_date" class="mt-2 input-error"/>
                                              @endif
                                              </div>
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                            <div class="col-span-4 md:col-span-2  lg:col-span-2">
                                <!-- component -->
                                    <main class="p-5 pt-0 ">
                                    <x-jet-label for="image" value="{{ __('Image') }}"/>
                                      <div class="flex justify-center items-start ">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="image">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-cyan-500 text-white"
                                              >
                                                <span>Image de l'article</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-cyan-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="py-5 mr-5 pl-3">
                                                {{-- <div class="flex flex-row items-center justify-center">
                                                    <div class="relative mt-4">
                                                        <div class="w-full xl:w-80 h-56 bg-gray-200">
                                                            @if(!empty($avatar))
                                                                <img src="{{ $avatar->temporaryUrl() }}" 
                                                                    class="object-cover w-full h-full">
                                                            @endif
                                                        </div>
                                                        <span class="absolute bottom-0 left-0 w-8 h-8 p-2 rounded-full bg-indigo-600 shadow-md">
                                                        <label>
                                                            <svg wire:target="avatar" wire:loading.class="animate-bounce" class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                            </svg>
                                                            <input wire:model="avatar" id="avatar" type="file" accept="image/png, image/jpeg,image/webp" class="hidden upload opacity-0">
                                                        </label>
                                                        </span>
                                                            <x-jet-input-error for="avatar" class="mt-2 input-error"/>
                                                        </div>
                                                    </div> --}}
                                                    <!--<div>-->
                                                    <!--    <input type='file' name='photo' wire:model='photo' />-->
                                                    <!--</div>-->
                                                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                                                           <!--Profile Photo File Input -->
                                                          <input type="file" class="hidden input-field"
                                                                      wire:model="photo"
                                                                      
                                                                      x-ref="photo"
                                                                      x-on:change="
                                                                              photoName = $refs.photo.files[0].name;
                                                                              const reader = new FileReader();
                                                                              reader.onload = (e) => {
                                                                                  photoPreview = e.target.result;
                                                                              };
                                                                              reader.readAsDataURL($refs.photo.files[0]);
                                                                      " />
                                      
                                                      <x-jet-label for="photo" value="{{ __('Photo') }}" />
                                      
                                                       <!--Current Profile Photo -->
                                                      <div class="mt-2 w-full xl:w-80 h-56 bg-gray-100" x-show="! photoPreview">
                                                          <!--<img src="{{ $photo }}" alt="{{ $photo }}" class="h-full w-full object-cover">-->
                                                      </div>
                                      
                                                       <!--New Profile Photo Preview -->
                                                      <div class="mt-2 xl:w-80 h-56" x-show="photoPreview" style="display: none;">
                                                          <span class="block w-full h-full bg-cover bg-no-repeat bg-center"
                                                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                                          </span>
                                                      </div>
                                      
                                                      <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                                          {{ __('Select A New Photo') }}
                                                      </x-jet-secondary-button>
                                      
                                      
                                                      <x-jet-input-error for="photo" class="mt-2 input-error" />
                                                  </div>
                                              </div>
                                              
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                            <div class="col-span-4 md:col-span-2  lg:col-span-2">
                                <!-- component -->
                                    <main class="p-5 pt-0 ">
                                    <x-jet-label for="Contenu_SEO" value="{{ __('Contenu SEO') }}"/>
                                      <div class="flex justify-center items-start ">
                                          <ul class="flex flex-col w-full">
                                            <li class="bg-white my-2 shadow-lg" x-data="seo">
                                              <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-red-500 text-white"
                                              >
                                                <span>Contenu SEO</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-red-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="py-5 mr-5 pl-3">
                                                <x-jet-label for="seo_title" value="{{ __('Mots clés') }}"/>
                                                <x-jet-input wire:model.defer="seo_title" type="text" class="mt-1 block w-full xl:w-80 input-field"/>
                                                <x-jet-input-error for="seo_title" class="mt-2 input-error"/>
                                              </div>
                                              <div class="py-5 mr-5 pl-3">
                                                <x-jet-label for="meta_description" value="{{ __('Meta description') }}"/>
                                                <textarea id="meta_description"  wire:model.defer="meta_description" rows="4" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500       w-full lg:w-96 xl:w-80" placeholder="Meta description..."></textarea>
                                                <x-jet-input-error for="meta_description" class="mt-2 input-error"/>   
                                              </div>
      
                                              
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                            </div>
                        </div>
                        
                    </div>
                    
              </div>
                {{-- </x-slot> --}}
                {{-- <x-slot name="footer"> --}}
                <div class="px-11" style="display:flex;justify-content:flex-end">
                    {{-- <x-jet-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button> --}}
                    <x-jet-button type="submit"  wire:click="create" wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
                {{-- </x-slot> --}}
            </form>
        </div>
  
    {{-- </x-jet-dialog-modal> --}}
  </div>
  <script>
    document.getElementById('forms').addEventListener('submit',(e) => {
      e.preventDefault();

    })
  </script>