<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Character;

class CharacterController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $character = Character::create([
            'name' => request('name'),
            'birthday' => request('birthday'),
        ]);
        $character->occupation = request('occupation');
        $character->save();

        if(!$character) {
            abort(403, 'All bad man!');
        } else {
            return response()->json(['message' => 'Saved!']);
        }
    }
}
