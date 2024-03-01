<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <style>
            [x-cloak] { display: none !important; }
        </style>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        
        @livewireStyles
        {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}" ></script> --}}
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @include('layouts.nav.navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
                @yield('content')
            </main>
        </div>

        @stack('modals')
        @livewireScripts
        <script>
            document.addEventListener('alpine:init', () => {
              Alpine.store('accordion', {
                tab: 0
              });
              
              Alpine.data('accordion', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('titre', {
                tab: 0
              });
              
              Alpine.data('titre', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.titre.tab = this.$store.titre.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.titre.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.titre.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('extrait', {
                tab: 0
              });
              
              Alpine.data('extrait', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.extrait.tab = this.$store.extrait.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.extrait.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.extrait.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('image', {
                tab: 0
              });
              
              Alpine.data('image', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.image.tab = this.$store.image.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.image.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.image.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('seo', {
                tab: 0
              });
              
              Alpine.data('seo', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.seo.tab = this.$store.seo.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.seo.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.seo.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('contenu', {
                tab: 0
              });
              
              Alpine.data('contenu', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.contenu.tab = this.$store.contenu.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.contenu.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.contenu.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('champs', {
                tab: 0
              });
              
              Alpine.data('champs', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.champs.tab = this.$store.champs.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.champs.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.champs.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('inscrit', {
                tab: 0
              });
              
              Alpine.data('inscrit', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.inscrit.tab = this.$store.inscrit.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.inscrit.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.inscrit.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('role', {
                tab: 0
              });
              
              Alpine.data('role', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.role.tab = this.$store.role.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.role.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.role.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('user', {
                tab: 0
              });
              
              Alpine.data('user', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.user.tab = this.$store.user.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.user.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.user.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('categorie', {
                tab: 0
              });
              
              Alpine.data('categorie', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.categorie.tab = this.$store.categorie.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.categorie.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.categorie.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('post', {
                tab: 0
              });
              
              Alpine.data('post', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.post.tab = this.$store.post.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.post.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.post.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('sondage', {
                tab: 0
              });
              
              Alpine.data('sondage', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.sondage.tab = this.$store.sondage.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.sondage.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.sondage.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
            document.addEventListener('alpine:init', () => {
              Alpine.store('menu', {
                tab: 0
              });
              
              Alpine.data('menu', (idx) => ({
                init() {
                  this.idx = idx;
                },
                idx: -1,
                handleClick() {
                  this.$store.menu.tab = this.$store.menu.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                  return this.$store.menu.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                  return this.$store.menu.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
              }));
            })
          </script>
          
    </body>
</html>
