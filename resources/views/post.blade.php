<x-layout>
    <div class="homeContainer">
        <h1 id="title">{{ $post->title }}</h1>
        <p id="postLink">Link to Project: <a target="_blank" href="{{ $post->link }}">{{ $post->link }}</a></p>
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
                <h2 id="skillsHeader">Description</h2>
                <p id="postDescription">
                    {{ $post->description }}
                </p>
            </div>
        </div>
        <div id="madeWithContainer">
            <div>
                <p class="subTitle">How It Could Be Better</p>
                <p id="better">{{ $post->better }}</p>
            </div>
            <hr color="000">
            <div>
                <p class="subTitle">What It Was Made With</p>
                <p id="madeWith">{{ $post->madeWith }}</p>
            </div>

        </div>
        <div id="imageContainer">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($post->images as $image)
                        <div class="swiper-slide">
                            <img id="postImage" src="{{ route('image', $image->imageUrl) }}" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-buttons">
                <span class="swiper-button-prev"></span>
                <span class="swiper-button-next"></span>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        {{-- Hardware acceleration breaks videos dont enable it in chrome --}}
        @if (count($post->videos) > 0)
            @foreach ($post->videos as $video)
                <div>
                    <video id="video" controls>
                        <source src="{{ route('video', $video->videoFilename) }}" type="{{ $video->mimeType }}">
                    </video>
                </div>
            @endforeach
        @endif

    </div>
</x-layout>
