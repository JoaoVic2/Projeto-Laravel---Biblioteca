<h1>{{ $livro->titulo }}</h1> <!-- Exibe o título do livro dinamicamente usando a variável $livro -->
<p>Autor: {{ $livro->autor }}</p> <!-- Exibe o nome do autor do livro -->
<p>Descrição: {{ $livro->descricao }}</p> <!-- Exibe a descrição do livro -->

<!-- Formulário para deletar o livro -->
<form action="{{ route('livro.destroy', $livro->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
    @csrf <!-- Token de segurança para proteger contra ataques CSRF (Cross-Site Request Forgery) -->
    @method('DELETE') <!-- Especifica o método HTTP DELETE, necessário para realizar exclusão em rotas RESTful -->
    <button type="submit" class="btn btn-danger">Deletar</button> <!-- Botão para confirmar e enviar a exclusão do livro -->
</form>
