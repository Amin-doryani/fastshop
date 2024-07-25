<form action="{{route("storeadmin")}}" method="post">
    @csrf
    <input type="text" name="name" id="name">
    <input type="text" name="username">
    <input type="text" name="password">
    <button type="submit">submit</button>
</form>