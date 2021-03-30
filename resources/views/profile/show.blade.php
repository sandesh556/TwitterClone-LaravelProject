<x-app>

  <header class="mb-6 relative">
      <img src="https://github.com/laracasts/Tweety/blob/master/public/images/default-profile-banner.jpg?raw=true" class="mb-2">

      <div class="flex justify-between items-center mb-6">
          <div>
              <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
              <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
          </div>
          <div class="flex">
              <a href="" class="rounded-full border border-gray-300 py-2 px-4 text-black mr-2 text-xs">Edit Profile</a>
              <form method="POST" action="/Profiles/{{$user->name}}/follow">
              <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">Follow</button>
          </form>

          </div>

          <img src="{{$user->avatar}}" alt="" class="rounded-full mr-2 absolute" style="width: 150px; left: calc(50% - 75px); top: 138px;">
      </div>
      <p class="text-sm">This is a profile page and the description is what is being written here about the user</p>
  </header>

    <hr>
    @include('_timeline',[
    'tweets'=> $user->tweets
])

</x-app>

