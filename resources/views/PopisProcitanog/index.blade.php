<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POPIS PROČITANOG</title>
</head>
<body>
    @if (session("success"))
        <p style="color:green;">{{session("success")}}</p>
    @else (session("error"))
        <p style="color:red;">{{session("error")}}</p>
    @endif

    <p>Ukupan broj pročitanih knjiga: {{$ukupnoProcitanihKnjiga}}</p>
    <p>Postotak pročitanih knjiga: {{$postotakProcitanog}} %</p>


    <h1>Dnevnik čitanja</h1>
    <form method="get" action="{{route('PopisProcitanog.index')}}">
        @csrf
        <select id="poredak" name="poredak">
            <option value="naziv">naziv</option>
            <option value="datum_pocetka">početak čitanja</option>
            <option value="datum_kraja">kraj čitanja</option>
        </select>
        <button type="submit">POREDAJ</button>
    </form>
    <ul>
        @foreach ($knjige as $knjiga)
            <li><a href="{{route('PopisProcitanog.show', $knjiga->id)}}">{{$knjiga->naziv}}</a> - {{$knjiga->autor_ime}} {{$knjiga->autor_prezime}}</li>
            <br>
        @endforeach
    </ul>
    <br>
    <a href="{{route('PopisProcitanog.create')}}">Unesi novu knjigu</a>
</body>
</html>