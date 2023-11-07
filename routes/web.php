<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::get('/', [ContactsController::class, 'index']);
Route::get('/create-contact', [ContactsController::class, 'create']);
Route::post('/create', [ContactsController::class, 'store']);
Route::delete('/delete-contact/{id_contact}', [ContactsController::class, 'destroy']); // Rota para deletar
Route::get('/edit-contact/{id_contact}', [ContactsController::class, 'edit']); // Rota para editar
Route::put('/update/{id_contact}', [ContactsController::class, 'update']); // Rota para atualizar
