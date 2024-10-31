<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

// Define um conjunto de rotas padrão para o recurso "livros" usando o LivroController.
// Isso cria automaticamente rotas para index, create, store, show, edit, update e destroy.
Route::resource('livros', LivroController::class);

// Define uma rota para a página inicial do site que chama o método 'index' do LivroController.
// A rota é nomeada como 'Livro.index' e pode ser acessada com o nome ao invés de uma URL direta.
Route::get('/', [LivroController::class, 'index'])->name('Livro.index');

// Define uma rota que permite buscar um livro pelo título, chamando o método 'showByTitle' no LivroController.
// A rota inclui um parâmetro {titulo} para passar o título do livro na URL e é nomeada 'livro.showByTitle'.
Route::get('/livro/titulo/{titulo}', [LivroController::class, 'showByTitle'])->name('livro.showByTitle');

// Define uma rota para exibir o formulário de criação de um novo livro.
// Usa o método 'create' do LivroController e nomeia a rota como 'livro.create'.
Route::get('/livro/create', [LivroController::class, 'create'])->name('livro.create');

// Define uma rota para processar o envio do formulário de criação de um novo livro.
// Usa o método 'store' do LivroController para salvar os dados do livro e nomeia a rota como 'livro.store'.
Route::post('/livro/create', [LivroController::class, 'store'])->name('livro.store');

// Define uma rota para exibir detalhes de um livro específico pelo ID do livro.
// Usa o método 'show' do LivroController e nomeia a rota como 'livros.show'.
Route::get('/livro/{livro}', [LivroController::class, 'show'])->name('livros.show');

// Cria outro conjunto de rotas padrão para o recurso "livro" usando o LivroController.
// Esta linha é redundante, pois já existe uma `Route::resource` para "livros" acima.
Route::resource('livro', LivroController::class);

// Define uma rota para exibir o formulário de edição de um livro específico pelo ID do livro.
// Usa o método 'edit' do LivroController e nomeia a rota como 'livro.edit'.
Route::get('/livro/{livro}/edit', [LivroController::class, 'edit'])->name('livro.edit');

// Define uma rota para processar a atualização de um livro específico pelo ID do livro.
// Usa o método 'update' do LivroController e nomeia a rota como 'livro.update'.
Route::put('/livro/{livro}', [LivroController::class, 'update'])->name('livro.update');

// Define uma rota para deletar um livro específico pelo ID do livro.
// Usa o método 'destroy' do LivroController e nomeia a rota como 'livro.destroy'.
Route::delete('/livro/{livro}', [LivroController::class, 'destroy'])->name('livro.destroy');
