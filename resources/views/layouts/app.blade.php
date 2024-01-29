<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .header-right {
                width: calc(100% - 3.5rem);
            }
            .sidebar:hover {
                width: 15rem;
            }
            @media only screen and (min-width: 768px) {
                .header-right {
                    width: calc(100% - 15rem);
                }
            }
          </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">


            <div>
               <div x-data="setup()" >
                   <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">

                     <!-- Header -->
                     <div class="fixed w-full flex items-center justify-between h-12 text-white z-10">
                       <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-60 h-14 bg-companyColor-primary  border-none">
                         <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
                         <span class="hidden md:block">ADMIN</span>
                       </div>
                       <div class="flex justify-between items-center h-12 bg-companyColor-primary  header-right">
                         <div class=" rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm ">

                         </div>
                         <ul class="flex items-center">

                           <li>
                             <div class="block w-px h-6 mx-3 bg-gray-400 "></div>
                           </li>
                           <li>
                             <a href="#" class="flex items-center mr-4 hover:text-blue-100">
                               <span class="inline-flex mr-1">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                               </span>
                               Logout
                             </a>
                           </li>
                         </ul>
                       </div>
                     </div>
                     <!-- ./Header -->

                     <!-- Sidebar -->
                     <div class="fixed flex flex-col top-12 left-0 w-14 hover:w-60 md:w-60 bg-companyColor-primary-lighter  h-full text-white transition-all duration-300 border-none z-10 sidebar">
                       <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                         <ul class="flex flex-col py-4 space-y-1">

                           <li>
                             <a href="#" class="listMenu">
                               <span class="inline-flex justify-center items-center ml-4 sh">


                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                  </svg>

                               </span>
                               <span class="ml-2 text-sm tracking-wide truncate">Libros</span>
                             </a>
                           </li>
                           <li>
                             <a href="#" class="listMenu">
                               <span class="inline-flex justify-center items-center ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                                  </svg>

                               </span>
                               <span class="ml-2 text-sm tracking-wide truncate">Escaner</span>
                               {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> --}}
                             </a>
                           </li>
                           {{-- <li>
                             <a href="#" class="listMenu">
                               <span class="inline-flex justify-center items-center ml-4">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                               </span>
                               <span class="ml-2 text-sm tracking-wide truncate">Messages</span>
                             </a>
                           </li>
                           <li>
                             <a href="#" class="listMenu">
                               <span class="inline-flex justify-center items-center ml-4">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                               </span>
                               <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                               <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
                             </a>
                           </li>
                           <li class="px-5 hidden md:block">
                             <div class="flex flex-row items-center mt-5 h-8">
                               <div class="text-sm font-light tracking-wide text-companyColor-text2 uppercase">Settings</div>
                             </div>
                           </li> --}}
                           <li>
                             <a href="#" class="listMenu">
                               <span class="inline-flex justify-center items-center ml-4">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                               </span>
                               <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                             </a>
                           </li>
                           <li>
                             <a href="#" class="listMenu">
                               <span class="inline-flex justify-center items-center ml-4">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                 </svg>
                               </span>
                               <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
                             </a>
                           </li>
                         </ul>
                         <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">CoderFi @2021</p>
                       </div>
                     </div>
                     <!-- ./Sidebar -->


                     <div class="h-full ml-14 mt-14 mb-10 md:ml-60">
                        <main class="px-2 sm:px-4 md:px-0">
                            {{ $slot }}
                        </main>
                     </div>


                   </div>
                 </div>


         </div>




        </div>

        @stack('modals')

        @livewireScripts



    </body>
</html>
