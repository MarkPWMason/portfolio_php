<x-layout>
    <div>
        <h1>content</h1>
        @dump($posts)
        @foreach ($posts as $post)
            <h1>{{ $post->title }}</h1>
            <div>
                @foreach ($post->skills as $skill)
                    <p>{{ $skill['skill'] }}</p>
                @endforeach
            </div>

            <div>
                @foreach ($post->images as $image)
                    <img src="{{ route('image', $image->imageUrl) }}" />
                @endforeach
            </div>
        @endforeach
    </div>
</x-layout>
