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
                 @if(Route::currentRouteName() == 'home')
                 <li>
                     <a class="text-red-500 text-lg font-bold" href="{{ URL::to('/') }}">Discover</a>
                 </li>
                 @else
                 <li>
                     <a href="{{ URL::to('/') }}">Discover</a>
                 </li>
                 @endif

                 @if (Auth::user())
                 @if(Route::currentRouteName() == 'history')
                 <li>
                     <a class="text-red-500 text-lg font-bold" href="{{ route('history') }}">History</a>
                 </li>
                 @else
                 <li>
                     <a href="{{ route('history') }}">History</a>
                 </li>
                 @endif
                 @if(Route::currentRouteName() == 'likes')
                 <li>
                     <a class="text-red-500 text-lg font-bold" href="{{ route('likes') }}">Likes</a>
                 </li>
                 @else
                 <li>
                     <a href="{{ route('likes') }}">Likes</a>
                 </li>
                 @endif
                 @if(Route::currentRouteName() == 'playlists')
                 <li>
                     <a class="text-red-500 text-lg font-bold" href="{{ route('playlists') }}">Playlists</a>
                 </li>
                 @else
                 <li>
                     <a href="{{ route('playlists') }}">Playlists</a>
                 </li>
                 @endif
                 @endif
                 <li>
                     <a class="text-sm text-gray-700 italic" href="https://github.com/MikUwU/CDAW/issues" target="_blank">Help and feedback</a>
                 </li>
             </ul>
         </div>
     </div>
 </section>