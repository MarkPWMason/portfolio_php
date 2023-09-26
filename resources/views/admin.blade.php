<x-layout>
    <form method="POST" id="adminLogin" action="{{ route('adminLogin') }}">
        @csrf
        <input name="loginusername" class="formInput" type="text">
        <input name="loginpassword" class="formInput" type="text">
        <input class="formBtn" type="submit">
    </form>
</x-layout>
