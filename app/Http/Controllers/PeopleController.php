<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $people = People::paginate();
        return view('people.index', compact('people'));
    }

    public function personEdit($id){
        $people = People::findOrFail($id);
        $people->registered = !$people->registered;
        $people->save();

        return redirect(route('people.index'))->with([
            'message' => $people->id_no . ' is updated!'
        ]);
    }
}
