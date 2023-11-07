<?php

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $contacts = Contact::all();
    
    return view('index', ['contacts' => $contacts]);
});

Route::get('/create-contact', function () {
    return view('create');
});

Route::post('/create', function(Request $informacoes) {
    Contact::create([
        'name'=> $informacoes->name,
        'contact'=>$informacoes->contact,
        'email'=>$informacoes->email
    ]);
    echo "foi";
});

Route::delete('/delete-contact/{id_contact}', function ($id_contact) {
    $contact = Contact::findOrFail($id_contact);
    $contact->delete();
    return redirect('/')->with('mensagem', 'Contact Delete Sucess!');
});

Route::get('/edit-contact/{$id_contact}', function ($id_contact) {
    $contact = Contact::findOrFail($id_contact);
    return view('edit', ['contact'=>$contact]);
});