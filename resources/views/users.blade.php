<h1>hello</h1>
<!-- @if($user=="dipali")
<h3>hi {{$user}}</h3>
@endif -->


@for($i=0;$i<10;$i++)
<h4>{{$i}}</h4>
@endfor

@foreach($user as $u)
<h4>{{$u}}</h4>
@endforeach

<script>
    var data=@json($user);
    console.warn(data);
    </script>