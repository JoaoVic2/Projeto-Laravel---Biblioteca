<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Declaração do tipo de documento HTML -->
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura a página para ser responsiva -->
    <title>Lista de Livros</title> <!-- Título da página, que aparece na aba do navegador -->
</head>
<body>
    <h1>Livros</h1> <!-- Cabeçalho principal da página -->

    <!-- Formulário de busca -->
    <form method="GET" action="{{ route('livros.index') }}"> <!-- Envia uma requisição GET para a rota 'livros.index' -->
        <input type="text" name="search" placeholder="Buscar por título" value="{{ request('search') }}"> <!-- Campo de texto para busca, que retém o valor pesquisado -->
        <button type="submit">Buscar</button> <!-- Botão para submeter a busca -->
        <a href="{{ route('livro.create') }}">Criar</a> <!-- Link para criar um novo livro, direcionando para a rota 'livro.create' -->
    </form>

    <ul>
        <!-- Loop para exibir a lista de livros -->
        @foreach ($livros as $livro)
            <li>
                <!-- Link para exibir os detalhes de cada livro, usando a rota 'livro.show' e o ID do livro -->
                <a href="{{ route('livro.show', $livro->id) }}">{{ $livro->titulo }}</a> 
                
                <!-- Link para editar o livro, usando a rota 'livro.edit' com o ID do livro como parâmetro -->
                <a href="{{ route('livro.edit', ['livro' => $livro->id]) }}">editar</a>
            </li>
        @endforeach
    </ul>

    <!-- Controle de paginação -->
    <div>
        <!-- Exibe a página atual e o total de páginas -->
        <span>Página {{ $livros->currentPage() }} de {{ $livros->lastPage() }}</span>

        <!-- Link para a página anterior, se não estiver na primeira página -->
        @if ($livros->onFirstPage())
            <span>Anterior</span> <!-- Mostra 'Anterior' como texto desabilitado -->
        @else
            <a href="{{ $livros->previousPageUrl() }}">Anterior</a> <!-- Link para a página anterior -->
        @endif

        <!-- Link para a próxima página, se houver mais páginas -->
        @if ($livros->hasMorePages())
            <a href="{{ $livros->nextPageUrl() }}">Próximo</a> <!-- Link para a próxima página -->
        @else
            <span>Próximo</span> <!-- Mostra 'Próximo' como texto desabilitado -->
        @endif
    </div>
</body>
</html>
