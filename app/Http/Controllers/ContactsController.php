<?php
namespace App\Http\Controllers;

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
                Rule::unique('contacts', 'contact'), // Verifica se o número de contato é único
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email'), // Verifica se o email é único
            ],
        ]);

        Contact::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);

        return redirect('/')->with('mensagem', 'Create Contact!');
    }
}
