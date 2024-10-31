<form action="{{ route('livro.update',['livro' => $livro->id]) }}" method="POST">
    <!-- Define a rota para a ação do formulário, direcionando para 'livro.update' com o ID do livro -->
    @csrf <!-- Token CSRF para proteção contra ataques CSRF -->
    @method('PUT') <!-- Especifica que o método HTTP usado é PUT, necessário para atualização de recursos no padrão REST -->

    <!-- Campo para editar o título do livro -->
    <div>
        <label for="nome">Título do Livro:</label> <!-- Rótulo do campo de entrada para o título do livro -->
        <input type="text" id="nome" name="nome" required /> <!-- Campo de texto para o título, marcado como obrigatório -->
    </div>

    <!-- Campo para editar o autor do livro -->
    <div>
        <label for="autor">Autor:</label> <!-- Rótulo do campo de entrada para o autor do livro -->
        <input type="text" id="autor" name="autor" required /> <!-- Campo de texto para o autor, marcado como obrigatório -->
    </div>

    <!-- Campo para editar a descrição do livro -->
    <div>
        <label for="descricao">Descrição:</label> <!-- Rótulo para a área de texto para a descrição do livro -->
        <textarea id="descricao" name="descricao" required></textarea> <!-- Área de texto para a descrição, marcada como obrigatória -->
    </div>

    <!-- Botão para submeter o formulário e realizar a edição -->
    <div class="button">
        <button type="submit">editar</button> <!-- Botão de envio para confirmar a edição -->
    </div>
</form>
