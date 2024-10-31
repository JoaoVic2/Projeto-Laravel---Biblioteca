<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe uma lista de livros com funcionalidade de busca e paginação.
     */
    public function index(Request $request)
    {
        // Cria uma nova query para o modelo Livro
        $query = Livro::query();
    
        // Se o campo de busca estiver preenchido, adiciona um filtro pelo título
        if ($request->filled('search')) {
            $query->where('titulo', 'like', '%' . $request->search . '%');
        }
    
        // Pagina os resultados da query, limitando a 10 livros por página
        $livros = $query->paginate(10);
        
        // Retorna a view 'home_livros' com a variável 'livros' contendo os resultados
        return view('home_livros', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo livro.
     */
    public function create()
    {
        return view('create_livros');
    }

    /**
     * Store a newly created resource in storage.
     * Salva um novo livro no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados do formulário, exigindo que sejam strings
        $data = $request->validate([
            'nome' => 'string',
            'autor' => 'string',
            'descricao' => 'string'
        ]);
        
        // Cria uma nova instância de Livro e preenche os dados
        $livro = new Livro();
        $livro->titulo = $data['nome'];
        $livro->autor = $data['autor'];
        $livro->descricao = $data['descricao'];
        
        // Salva o novo livro no banco de dados
        $livro->save();
        
        // Redireciona de volta com uma mensagem de confirmação de criação
        return redirect()->back()->with('message', 'Livro criado');
    }

    /**
     * Display the specified resource.
     * Exibe os detalhes de um livro específico.
     */
    public function show(Livro $livro)
    {
        // Retorna a view 'show_livro' com os dados do livro específico
        return view('show_livro', ['livro' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     * Exibe o formulário de edição para um livro específico.
     */
    public function edit(Livro $livro)
    {
        // Retorna a view 'edit_livro' com os dados do livro a ser editado
        return view('edit_livro', ['livro' => $livro]);
    }

    /**
     * Update the specified resource in storage.
     * Atualiza os dados de um livro existente no banco de dados.
     */
    public function update(Request $request, Livro $livro)
    {
        // Valida os dados de entrada, com restrições de obrigatoriedade e tamanho
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'nullable|string'
        ]);
    
        // Atualiza os dados do livro com os valores fornecidos
        $livro->titulo = $data['nome'];
        $livro->autor = $data['autor'];
        $livro->descricao = $data['descricao'];
        
        // Salva as alterações no banco de dados
        $livro->save();
    
        // Redireciona para a lista de livros com uma mensagem de sucesso
        return redirect()->route('livros.index');
    }

    /**
     * Remove the specified resource from storage.
     * Deleta um livro específico do banco de dados.
     */
    public function destroy(Livro $livro)
    {
        // Remove o livro do banco de dados
        $livro->delete();
    
        // Redireciona para a lista de livros com uma mensagem de sucesso
        return redirect()->route('livros.index');
    }
}
