<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    public function index() {

       /** @var User|null $user */
        $user = Auth::user();

        if (!$user) {
            abort(403); // usuário não logado
        }

        $contacts = $user->contacts()->orderBy('name')->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create() {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->contacts()->create($data);

        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id); 

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $contact->update($data); 
        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id); 
        $contact->delete(); 
        return redirect()->route('contacts.index')->with('success', 'Contato deletado com sucesso!');
    }
}
