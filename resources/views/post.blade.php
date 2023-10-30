<x-layout>
    <div class="homeContainer">
        <h1 id="title">{{ $post->title }}</h1>
        <p id="description">{{ $post->description }}</p>
        <div id="madeWithContainer">
            <p id="better">{{ $post->better }}</p>
            <p id="madeWith">{{ $post->madeWith }}</p>
        </div>

        <div>
            <h2 id="skillHeader">Skills</h2>
            <ul id="skillsList">
                @foreach ($post->skills as $skill)
                    <li id="postSkill">{{ $skill['skill'] }}</li>
                @endforeach
            </ul>
        </div>

        @foreach ($post->videos as $video)
            <video id="video" width="320" height="240" controls>
                <source src="{{ route('video', $video->videoFilename) }}" type="{{ $video->mimeType }}">
            </video>
        @endforeach
        <div>
            @foreach ($post->images as $image)
                <img id="postImage" src="{{ route('image', $image->imageUrl) }}" />
            @endforeach
        </div>
        <a target="_blank" href="{{ $post->link }}">{{ $post->link }}</a>
    </div>
</x-layout>
