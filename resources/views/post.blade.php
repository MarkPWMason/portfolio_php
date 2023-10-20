<x-layout>
    <div class="homeContainer">
        <button onclick="window.location='{{ route('homePage') }}'">Homepage</button>
        <h1>{{ $post->title }}</h1>
        <ul>
            @foreach ($post->skills as $skill)
                <li id="postSkill">{{ $skill['skill'] }}</li>
            @endforeach
        </ul>
    </div>
</x-layout>
