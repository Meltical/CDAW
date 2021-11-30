 <section class="flex flex-col h-screen">
     <div class="flex justify-center items-center h-64 border">
         <div class="flex flex-col justify-center items-center">
             @if (Auth::user())
             <img class="w-20 h-20 object-cover rounded-full mb-4 " src="{{ Auth::user()->avatarUrl }}" alt="profile img">
             <span>{{ Auth::user()->name }}</span>
             <form action="{{ route('logout') }}" method="post">
                 @csrf
                 <button type="submit" class="text-sm underline text-gray-400 cursor-pointer">Logout</button>
             </form>
             @else
             <div class="w-20 h-20 rounded-full bg-red-300 mb-4 flex justify-center items-center">
                 <i class="fas fa-2x fa-user text-white"></i>
             </div>
             <a href="{{ route('login') }}" class="font-bold hover:underline cursor-pointer">Login</a>
             @endif
         </div>
     </div>
     <div class="flex flex-grow justify-center border-r">
         <div class="p-14">
             <ul class="flex flex-col gap-4 whitespace-nowrap">
                 <li>
                     <a class="@if(Route::currentRouteName() == 'home') text-red-500 text-lg font-bold @endif" href="{{ URL::to('/') }}">Discover</a>
                 </li>
                 @if (Auth::user())
                 <li>
                     <a class="@if(Route::currentRouteName() == 'history') text-red-500 text-lg font-bold @endif" href="{{ route('history') }}">History</a>
                 </li>
                 <li>
                     <a class="@if(Route::currentRouteName() == 'likes') text-red-500 text-lg font-bold @endif" href="{{ route('likes') }}">Likes</a>
                 </li>
                 <li>
                     <a class="@if(Route::currentRouteName() == 'playlists') text-red-500 text-lg font-bold @endif" href="{{ route('playlists') }}">Playlists</a>
                 </li>
                 @endif
                 <li>
                     <a class="text-sm text-gray-700 italic" href="https://github.com/MikUwU/CDAW/issues" target="_blank">Help and feedback</a>
                 </li>
             </ul>
         </div>
     </div>
 </section>