<form action="{{route('store')}}" method="post">
    @csrf
    <textarea name="position" style="width: 500px; height: 300px; display: block"></textarea>

    <input type="submit" style="width: 100px; height: 100px; display: block">
</form>