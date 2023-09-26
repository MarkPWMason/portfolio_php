<x-layout>

    <?php
    $languages = ['CSS', 'HTML', 'JS', 'TS', 'React', 'PHP', 'Laravel'];
    ?>

    <form id="postForm" method="POST" action="{{ route('publish-post') }}" enctype="multipart/form-data">
        @csrf
        <input name="title" type="text" placeholder="title">
        <textarea name="description" id="" cols="30" rows="10" placeholder="desc"></textarea>
        <label for="video">Video</label>
        <input name="video" type="file">
        <input name="link" type="text" placeholder="link to project">
        <textarea name="better" id="" cols="30" rows="10" placeholder="how to make it better"></textarea>
        <textarea name="madeWith" id="" cols="30" rows="10" placeholder="what was it made with"></textarea>

        <label for="screenshots">Screenshots</label>
        <input name="screenshots[]" type="file" multiple>

        {{-- <input name="skill" type="text" placeholder="skills used"> --}}
        <select multiple="multiple" name="languages[]" id="languages">
            @foreach ($languages as $language)
                <option value="{{ $language }}">{{ $language }}</option>
            @endforeach
        </select>

        <input type="submit">
    </form>

</x-layout>
