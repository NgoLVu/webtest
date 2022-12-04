
<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>
        @if (!empty($theloais))
        @foreach ($theloais as $key)
        @if ($key->loaitin)
        <li href="#" class="list-group-item menu1">
            {{$key->Ten}}
        </li>
        <ul>
            @foreach ($key->loaitin as $lt)
            <li class="list-group-item">
                <a href="loaitin/{{$lt->id}}.html">{{$lt->Ten}}</a>
            </li>
            @endforeach
        </ul>

        @endif
        @endforeach
        @endif
    </ul>
</div>
