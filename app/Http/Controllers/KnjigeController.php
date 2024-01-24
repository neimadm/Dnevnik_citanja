<?php

namespace App\Http\Controllers;

//dodati model
use App\Models\Knjiga;
use Exception;
use Illuminate\Http\Request;

class KnjigeController extends Controller
{
    //prikaz svih procitanih knjiga
    public function index(Request $request)
    {
        //dohvaća sve knjige i sortira ih abecedno po nazivu
        //$knjige=Knjiga::orderBy("naziv")->get();

        if ($request->poredak=="naziv")
        {
            $knjige=Knjiga::orderBy("naziv")->get();
        }
        elseif ($request->poredak=="datum_pocetka")
        {
            $knjige=Knjiga::orderBy("pocetak_citanja")->get();
        }
        elseif ($request->poredak=="datum_kraja")
        {
            $knjige=Knjiga::orderBy("kraj_citanja")->get();
        }
        else
        {
            $knjige=Knjiga::orderBy("naziv")->get();
        }

        //broj redova u tablici
        $ukupnoKnjiga=Knjiga::count();

        //ukupan broj samo pročitanih knjiga (one koje imaju unesen i datum završetka čitanja)
        $ukupnoProcitanihKnjiga=Knjiga::where("kraj_citanja", "!=", null)->count();

        $postotakProcitanog=round($ukupnoProcitanihKnjiga/$ukupnoKnjiga*100, 2);

        return view("PopisProcitanog.index", compact("knjige", "ukupnoProcitanihKnjiga", "postotakProcitanog"));
    }

    //unos nove knjige u bazu
    public function create()
    {
        return view("PopisProcitanog.create");
    }

    public function store(Request $request)
    {
        try
        {
            //validacija forme
            $request->validate(
                [
                    "naziv" => "string|required|max:255",
                    "autor_prezime" => "string|required|max:255",
                    "autor_ime" => "string|required|max:255",
                    "pocetak_citanja" => "date|required",            
                ]);

            //unijeti novu knjigu u tablicu
            Knjiga::create(
                [
                    "naziv" => $request->naziv,
                    "autor_prezime" => $request->autor_prezime,
                    "autor_ime" => $request->autor_ime,
                    "pocetak_citanja" => $request->pocetak_citanja,
                ]);

                //vratiti na index s porukom uspjeha
                return redirect()->route("PopisProcitanog.index")->with("success", "Unos nove knjige uspješan");
        }
        catch (\Exception $e)
        {
            return redirect()->route("PopisProcitanog.index")->with("error", "Unos knjige nije uspio");
        }
    }

    //prikaz detalja za pojedinu knjigu
    public function show($id)
    {
        $knjiga=Knjiga::find($id);
        return view("PopisProcitanog.show", compact("knjiga"));
    }

    //editiranje zapisa
    public function edit($id)
    {
        $knjiga=Knjiga::find($id);
        return view("PopisProcitanog.edit", compact("knjiga"));
    }

    public function update(Request $request, $id)
    {
        try
        {
            
            //validacija forme
            //kod edita polja kraj_citanja, komentar i ocjena mogu biti nullable (da se uopće ne unose)
            $request->validate(
                [
                    "naziv" => "string|required|max:255",
                    "autor_prezime" => "string|required|max:255",
                    "autor_ime" => "string|required|max:255",
                    "pocetak_citanja" => "date|required",
                    "kraj_citanja" => "date|nullable",
                    "komentar" => "string|max:255|nullable",
                    "ocjena" => "integer|max:10|min:1|nullable",
                ]);

            //pronaći knjigu po id
            $knjiga=Knjiga::find($id);

            //editirati knjigu iz tablice
            $knjiga->update(
                [
                    "naziv" => $request->naziv,
                    "autor_prezime" => $request->autor_prezime,
                    "autor_ime" => $request->autor_ime,
                    "pocetak_citanja" => $request->pocetak_citanja,
                    "kraj_citanja" => $request->kraj_citanja,
                    "komentar" => $request->komentar,
                    "ocjena" => $request->ocjena,
                ]);

            return redirect()->route("PopisProcitanog.show", $knjiga->id)->with("success", "Uspješna promjena podataka o knjizi");
        }
        catch (\Exception $e2)
        {
            $knjiga=Knjiga::find($id);
            return redirect()->route("PopisProcitanog.show", $knjiga->id)->with("error", "Promjena podataka o knjizi nije uspjela");
        }
    }

    //brisanje knjiga iz baze
    public function destroy($id)
    {
        try
        {
            $knjiga=Knjiga::find($id);
            $knjiga->delete();

            return redirect()->route("PopisProcitanog.index")->with("success", "Knjiga uspješno izbrisana iz baze");
        }
        catch (\Exception $e3)
        {
            return redirect()->route("PopisProcitanog.index")->with("error", "Brisanje knjige iz baze nije uspjelo");
        }
    }
}
