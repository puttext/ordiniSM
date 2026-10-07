<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Modifica dei propri dati. Gli altri utenti si gestiscono da Amministrazione → Utenti.
 */
class UserController extends Controller
{
    public function edit($id)
    {
        if ($id != \Auth::id()) {
            return redirect()->route('user.edit', \Auth::id());
        }
        $this->dati['user'] = \Auth::user();

        return view('user.edit')->with($this->dati);
    }

    public function update(Request $request, $id)
    {
        $user = \Auth::user();
        if ($id != $user->id) {
            return redirect()->route('user.edit', $user->id)->withErrors(['Puoi modificare solo i tuoi dati']);
        }

        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:6|confirmed',
        ], [], [
            'name' => 'nome',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->route('user.edit', $user->id)->with('message', 'Dati salvati');
    }
}
