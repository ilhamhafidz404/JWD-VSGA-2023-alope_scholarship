 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="./css/style.css">
 </head>

 <body class="bg-gray-200">

   <nav class="fixed flex justify-between items-center left-0 right-0 py-5 z-50 px-20">
     <div>
       <h2 class="text-xl font-bold text-white">ALOPE SCHOLAR</h2>
     </div>
     <div class="flex items-center text-white uppercase">
       <a href="./pages/user/login.php" class="text-sm mr-4 inline-flex gap-2 items-center hover:font-semibold">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5">
           <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
         </svg>

         Login User
       </a>
       <span class="mx-5">|</span>
       <a href="./pages/admin/login.php" class="text-sm mr-4 inline-flex gap-2 items-center hover:font-semibold">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5">
           <path fill-rule="evenodd" d="M10.5 3.798v5.02a3 3 0 01-.879 2.121l-2.377 2.377a9.845 9.845 0 015.091 1.013 8.315 8.315 0 005.713.636l.285-.071-3.954-3.955a3 3 0 01-.879-2.121v-5.02a23.614 23.614 0 00-3 0zm4.5.138a.75.75 0 00.093-1.495A24.837 24.837 0 0012 2.25a25.048 25.048 0 00-3.093.191A.75.75 0 009 3.936v4.882a1.5 1.5 0 01-.44 1.06l-6.293 6.294c-1.62 1.621-.903 4.475 1.471 4.88 2.686.46 5.447.698 8.262.698 2.816 0 5.576-.239 8.262-.697 2.373-.406 3.092-3.26 1.47-4.881L15.44 9.879A1.5 1.5 0 0115 8.818V3.936z" clip-rule="evenodd" />
         </svg>
         Login Admin
       </a>
     </div>
   </nav>

   <div class="relative w-full" style="height: 600px; width: 100%">
     <img src="./images/bgLogin.jpg" class="h-full absolute w-full object-cover">
     <div class="absolute bg-black/50 inset-0 z-40"></div>
     <div class="w-[500px] z-50 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
       <h1 class="font-bold text-3xl text-white">ALOPE SCHOLARSHIP</h1>
       <p class="text-gray-300 mt-3">ALOPE untuk Indonesia lebih berkarakter, cerdas dan percaya diri untuk meraih impian.</p>
     </div>
   </div>

   <h2 class="text-xl font-semibold text-center mt-10">JENIS BEASISWA</h2>
   <div class="container mx-auto grid grid-cols-2 mt-10 gap-10 px-20">
     <div class="bg-white p-5 rounded shadow">
       <h2 class="uppercase font-semibold flex gap-3 items-center">
         <span class="bg-indigo-400 h-[30px] w-[30px] flex items-center justify-center rounded-full text-white">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
             <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
             <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
             <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
           </svg>
         </span>
         Beasiswa Akademik
       </h2>
       <p class="text-sm mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ut adipisci? </p>
     </div>
     <div class="bg-white p-5 rounded shadow">
       <h2 class="uppercase font-semibold flex gap-3 items-center">
         <span class="bg-purple-400 h-[30px] w-[30px] flex items-center justify-center rounded-full text-white">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
             <path fill-rule="evenodd" d="M5.166 2.621v.858c-1.035.148-2.059.33-3.071.543a.75.75 0 00-.584.859 6.753 6.753 0 006.138 5.6 6.73 6.73 0 002.743 1.346A6.707 6.707 0 019.279 15H8.54c-1.036 0-1.875.84-1.875 1.875V19.5h-.75a2.25 2.25 0 00-2.25 2.25c0 .414.336.75.75.75h15a.75.75 0 00.75-.75 2.25 2.25 0 00-2.25-2.25h-.75v-2.625c0-1.036-.84-1.875-1.875-1.875h-.739a6.706 6.706 0 01-1.112-3.173 6.73 6.73 0 002.743-1.347 6.753 6.753 0 006.139-5.6.75.75 0 00-.585-.858 47.077 47.077 0 00-3.07-.543V2.62a.75.75 0 00-.658-.744 49.22 49.22 0 00-6.093-.377c-2.063 0-4.096.128-6.093.377a.75.75 0 00-.657.744zm0 2.629c0 1.196.312 2.32.857 3.294A5.266 5.266 0 013.16 5.337a45.6 45.6 0 012.006-.343v.256zm13.5 0v-.256c.674.1 1.343.214 2.006.343a5.265 5.265 0 01-2.863 3.207 6.72 6.72 0 00.857-3.294z" clip-rule="evenodd" />
           </svg>
         </span>
         Beasiswa Non-Akademik
       </h2>
       <p class="text-sm mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ut adipisci? </p>
     </div>
   </div>

   <div class="h-[5px] w-full bg-gradient-to-r mt-10 from-indigo-500 to-purple-400"></div>
   <footer class="px-20 bg-white py-5">
     <div class="grid grid-cols-2 gap-10">
       <div>
         <h3 class="text-xl font-semibold">ALOPE SCHOLAR</h3>
         <p class="text-sm mt-3">
           ALOPE untuk Indonesia lebih berkarakter, cerdas dan percaya diri untuk meraih impian.
         </p>
       </div>
       <div>
         <h3 class="font-semibold">HUBUNGI KAMI</h3>
         <p class="text-sm mt-3">WA : 083871352030</p>
         <p class="text-sm mt-2">Email : ilhammhafidzz@gmail.com</p>
       </div>
     </div>
     <hr class="my-5">
     <p class="text-center text-sm">Copyright &copy; by Ilham Hafidz</p>
   </footer>

 </body>

 </html>