<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IZMIJENA PODATAKA</title>
</head>
<body>
    <h1>Izmijeni podatke o knjizi:</h1>
    <form method="post" action="{{route('PopisProcitanog.update', $knjiga->id)}}">
        @csrf
        @method("PUT")
        <table>
            <tr>
                <td>Naziv knjige: </td>
                <td><input type="text" name="naziv" required value="{{$knjiga->naziv}}"></td>
            </tr>
            <tr>
                <td>Prezime autora: </td>
                <td><input type="text" name="autor_prezime" required value="{{$knjiga->autor_prezime}}"></td>
            </tr>
            <tr>
                <td>Ime autora: </td>
                <td><input type="text" name="autor_ime" required value="{{$knjiga->autor_ime}}"></td>
            </tr>
            <tr>
                <td>Datum početka čitanja: </td>
                <td><input type="date" name="pocetak_citanja" required value="{{$knjiga->pocetak_citanja}}"></td>
            </tr>
            <tr>
                <td>Datum završetka čitanja: </td>
                <td><input type="date" name="kraj_citanja" ></td>
            </tr>
            <tr>
                <td>Komentar: </td>
                <td><input type="text" name="komentar" ></td>
            </tr>
            <tr>
                <td>Ocjena: </td>
                <td><input type="number" name="ocjena" step="1" max="10" min="1"></td>
            </tr>
        </table>
        <br>
        <button type="submit">Izmijeni podatke</button>       
    </form>
</body>
</html>