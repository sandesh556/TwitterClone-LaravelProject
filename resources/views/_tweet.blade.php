
    <div class="flex p-4 border-b border-b-gray-400">
        <div class="mr-2 flex-shrink-0">
            <a href="{{route('profile',$tweet->user->name)}}">
            <img src="{{$tweet->user->avatar}}" alt="" class="rounded-full mr-2" width="50" height="50">
            </a>
        </div>
        <div>
            <a href="{{route('profile',$tweet->user->name)}}">
            <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
            </a>
            <p class="text-sm justify-content-end">{{$tweet->body}}</p>

        </div>
    </div>

