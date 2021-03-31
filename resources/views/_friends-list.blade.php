<h1 class="font-bold text-xl mb-4">Following</h1>
<ul>
    @auth()
    @forelse(auth()->user()->follows as $user)
    <li class="mb-2">
        <div class="flex items-center text-sm">
            <a href="{{route('profile',$user)}}" class="flex items-center text-sm">
        <img src="{{$user->avatar}}" alt="" class="rounded-full mr-2" width="50" height="50">
            {{$user->name}}
            </a>
        </div>
    </li>
        @empty
        <p class="p-4">No Friends Yet</p>

    @endforelse
    @endauth

</ul>
