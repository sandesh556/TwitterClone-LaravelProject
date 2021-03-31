<div class="border border-blue-400 rounded-lg p-8 mb-8">
    <form method="post" action="/tweets">
        {!! csrf_field() !!}
        <textarea name="body"  class="w-full" placeholder="Whats up?!" required>

        </textarea>
        <hr class="my-2">
        <footer class="flex justify-between items-center">
            <img src="{{auth()->user()->avatar}}" alt="" class="rounded-full mr-2" width="50" height="50">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 rounded-lg shadow h-10 px-10 text-white">Tweet</button>
        </footer>
    </form>
    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror

</div>
