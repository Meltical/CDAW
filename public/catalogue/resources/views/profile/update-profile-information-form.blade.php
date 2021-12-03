<form action="{{ route('profileupdate') }}" method="POST" class="flex flex-col">
    @csrf
    @method('PUT')
    <label for="name">name</label>
    <input id="name" name="name" type="text">
    <label id="email" name="email" for="email">email</label>
    <input id="email" name="email" type="text">
    <button type="submit">submit</button>
</form>
