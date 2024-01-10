<form class="d-inline" action="{{route('setLanguage', $lang)}}" method="POST">@csrf <button type="submit" class="btn ps-0"> 
    <img class="flag" src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="25" height="25"/> </button>
</form>