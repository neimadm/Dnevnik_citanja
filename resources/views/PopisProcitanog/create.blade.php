<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNOS NOVE KNJIGE</title>
</head>
<body>
    <form method="post" action="{{route('PopisProcitanog.store')}}">
        @csrf
        <table>
            <tr>
                <td>Naziv knjige: </td>
                <td><input type="text" name="naziv" required></td>
            </tr>
            <tr>
                <td>Prezime autora: </td>
                <td><input type="text" name="autor_prezime" required></td>
            </tr>
            <tr>
                <td>Ime autora: </td>
                <td><input type="text" name="autor_ime" required></td>
            </tr>
            <tr>
                <td>Datum početka čitanja: </td>
                <td><input type="date" name="pocetak_citanja" required></td>
            </tr>
        </table>
        <br>
        
        <button type="submit">Unesi</button>
    </form>
</body>
</html>