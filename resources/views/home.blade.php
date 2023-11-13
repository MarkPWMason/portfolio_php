<x-layout>
    <div class="homeContainer">
        <!-- Slider main container -->
        <div class="rain front-row"></div>
        <div class="rain back-row"></div>


        <div id="snow">
            <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
        </div>

        <div id="background-wrap">
            <div class="x1">
                <div class="cloud"></div>
            </div>

            <div class="x2">
                <div class="cloud"></div>
            </div>

            <div class="x3">
                <div class="cloud"></div>
            </div>

            <div class="x4">
                <div class="cloud"></div>
            </div>

            <div class="x5">
                <div class="cloud"></div>
            </div>
        </div>

        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($posts as $post)
                    <div class="swiper-slide">
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
                                <hr color="black">
                                <div id="descriptionContainer">
                                    <p id="postDescription">
                                        {{ \Illuminate\Support\Str::limit($post->description, $limit = 300, $end = '...') }}
                                    </p>
                                </div>
                            </div>


                            <a id="postLink" href="{{ $post->link }}" target="_blank"
                                onclick='event.stopPropagation()'>{{ $post->link }}</a>
                        </div>
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

</x-layout>
