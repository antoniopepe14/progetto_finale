
<p>{{ $data['name'] }} con mail <hr>
    {{ $data['email'] }} ha richiesto di diventare Revisore</p>
<p>{{ $data['description'] }}</p>
<p>Se vuoi renderlo revisore, clicca qui</p>
<a href="{{route('make.revisor', compact('user'))}} ">Clicca qui</a>

