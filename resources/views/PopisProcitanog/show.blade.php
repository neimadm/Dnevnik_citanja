<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETALJI KNJIGE</title>
</head>
<body>
    @if (session("success"))
        <p style="color:green;">{{session("success")}}</p>
    @else (session("error"))
        <p style="color:red;">{{session("error")}}</p>
    @endif

    <h1>{{$knjiga->naziv}}</h1>
        <table>
            <tr>
                <td>Autor: </td>
                <td>{{$knjiga->autor_ime}} {{$knjiga->autor_prezime}}</td>
            </tr>
            <tr>
                <td>Datum početka čitanja: </td>
                <td>{{$knjiga->pocetak_citanja}}</td>
            </tr>
            <tr>
                <td>Datum završetka čitanja: </td>
                <td>{{$knjiga->kraj_citanja}}</td>
            </tr>
            <tr>
                <td>Komentar: </td>
                <td>{{$knjiga->komentar}}</td>
            </tr>
            <tr>
                <td>Ocjena: </td>
                <td>{{$knjiga->ocjena}}</td>
            </tr>
        </table>
        <br>
        <a href="{{route('PopisProcitanog.edit', $knjiga->id)}}">Izmijeni podatke o knjizi</a>
        <br>
        <br>
        <form method="post" action="{{route('PopisProcitanog.destroy', $knjiga->id)}}">
            @csrf
            @method("DELETE")
            <button type="submit" onclick="return confirm('Jeste li sigurni da želite izbrisati knjigu iz baze?')">Izbriši knjigu</button>
        </form>
        <br>
        <a href="{{route('PopisProcitanog.index')}}">Povratak na popis svih pročitanih knjiga</a>
</body>
</html>