<x-layout>
    <div class="homeContainer">
        @foreach ($posts as $post)
            <div id="postContainer" onclick="window.location = '{{ route('showPost', $post->id) }}'">
                <h1 id="postTitle">{{ $post->title }}</h1>
                <div id="desc_skillsContainer">
                    @if (count($post->skills) > 0)
                        <div id="skillsContainer">
                            <h2 id="skillsHeader">Skills</h2>
                            <ul id="postSkills">
                                @foreach ($post->skills as $skill)
                                    <li id="postSkill">{{ $skill['skill'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="descriptionContainer">
                        <p id="postDescription">{{ $post->description }}</p>
                    </div>
                </div>

                {{-- <div>
                    @foreach ($post->images as $image)
                        <img id="postImage" src="{{ route('image', $image->imageUrl) }}" />
                    @endforeach
                </div> --}}
                <a href="{{ $post->link }}" target="_blank" onclick='event.stopPropagation()'>{{ $post->link }}</a>
            </div>
        @endforeach
    </div>



</x-layout>
