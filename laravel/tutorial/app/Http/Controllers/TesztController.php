<?php

namespace App\Http\Controllers;
use App\Models\Name;
use App\Models\Family;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TesztController extends Controller
{
    public function teszt()
    {
        $name = ['Alice', 'Bob', 'Charlie', 'Diana', 'Eve', 'Frank'];
        $randomNameKey = array_rand($name);
        $randomName = $name[$randomNameKey];
        return view('pages.teszt', compact('randomName'));
    }

    public function names()
    {
        $names = Name::all();
        $families = Family::all();

        return view('pages.names', compact('names', 'families'));
    }

    public function namesCreate($name, $family_id = null)
    {
        $nameRecord = new Name();
        $nameRecord->name = $name;
        $nameRecord->family_id = $family_id;
        $nameRecord->save();

        return $nameRecord->id;
    }

    public function familyCreate($name)
    {
        $familyRecord = new Family();
        $familyRecord->surname = $name;
        $familyRecord->save();

        return $familyRecord->id;
    }

    public function deleteName(Request $request) {
        $name = Name::find($request->input('id'));
        $name->delete();
        return "ok";
    }

    public function manageSurname()
    {
        $names = Family::all();
        return view('pages.surname', compact('names'));
    }

    public function deleteSurname(Request $request) {
        try {
            $name = Family::find($request->input('id'));
            $name->delete();
            return response()->json(['success' => true]);
        } catch (Illuminate\Database\QueryException $e) {
            return response()->json(['success' => false, 'message' => 'Nem törölhető, mert ide hivatkoznak!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }


    public function newSurname(Request $request)
    {
        $validateData = $request->validate([
            'inputFamily' => 'required|alpha|min:2|max:20',
        ]);
        $familyRecord = new Family();
        $familyRecord->surname = $request->input('inputFamily');
        $familyRecord->save();

        return redirect('/names/manage/surname');
    }

    public function newName(Request $request)
    {
        $validateData = $request->validate([
            'inputName' => 'required|alpha|min:2|max:20',
            'inputFamily' => 'required|integer|exists:App\Models\Family,id',
        ]);
        $nameRecord = new Name();
        $nameRecord->name = $request->input('inputName');
        $nameRecord->family_id = $request->input('inputFamily');
        $nameRecord->save();

        return redirect('/names');
        
    }
    /* 
    function saveData(Request $request){

    }

    function returnObject(){
        $obj = new \stdClass();
        $obj->name = "John";
        $obj->server = "SZBI-PG";
        return response()->json($obj);
    }

    function returnError(){
        return response()
            ->view('error',
             ['változó' => 'ez egy változó értéke'], 404);

    }

    function returnServerError(){
        return redirect('https://szbi-pg.hu');
    }
    */


}