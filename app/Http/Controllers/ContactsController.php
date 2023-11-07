<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('index', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'contact' => [
                'required',
                'max:9',
                Rule::unique('contacts', 'contact'),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email'),
            ],
        ]);

        try {
            Contact::create([
                'name' => $request->name,
                'contact' => $request->contact,
                'email' => $request->email,
            ]);

            return redirect('/')->with('mensagem', 'Create Contact!');
        } catch (\Illuminate\Database\QueryException $e) {
            // O número de contato ou email já está cadastrado
            if ($e->errorInfo[1] == 1062) {
                if (strpos($e->getMessage(), 'contacts_contact_unique') !== false) {
                    return back()
                        ->withInput()
                        ->withErrors(['contact' => 'O número de contato já está cadastrado.']);
                } elseif (strpos($e->getMessage(), 'contacts_email_unique') !== false) {
                    return back()
                        ->withInput()
                        ->withErrors(['email' => 'O email já está cadastrado.']);
                }
            }

            return back()
                ->withInput()
                ->withErrors(['error' => 'Ocorreu um erro durante a criação do contato.']);
        }
    }

    public function destroy($id_contact)
    {
        $contact = Contact::findOrFail($id_contact);
        $contact->delete();
        return redirect('/')->with('mensagem', 'Contact Delete Success!');
    }

    public function edit($id_contact)
    {
        $contact = Contact::findOrFail($id_contact);
        return view('edit', ['contact' => $contact]);
    }

    // Outros métodos do seu controller, como atualizar, conforme necessário
}
