 <section class="flex flex-col h-screen">
     <div class="flex justify-center items-center h-64 border">
         <div class="flex flex-col justify-center items-center">
             <div class="w-20 h-20 rounded-full mb-4 profile"></div>
             <span>Komi</span>
         </div>
     </div>
     <div class="flex flex-grow justify-center border-r">
         <div class="p-14">
             <ul class="flex flex-col gap-4 whitespace-nowrap">
                 <li>
                     <a class="text-red-500 text-lg font-bold" href="{{ URL::to('/') }}">Discover</a>
                 </li>
                 <li>
                     <a href="#">Library</a>
                 </li>
                 <li>
                     <a href="#">Notification</a>
                 </li>
                 <li>
                     <a href="#">Settings</a>
                 </li>
                 <li>
                     <a class="text-sm text-gray-700 italic" href="#">Help and feedback</a>
                 </li>
             </ul>
         </div>
     </div>
 </section>