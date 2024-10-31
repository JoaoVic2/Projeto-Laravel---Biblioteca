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
    <form method="GET" action="<?php echo e(route('livros.index')); ?>"> <!-- Envia uma requisição GET para a rota 'livros.index' -->
        <input type="text" name="search" placeholder="Buscar por título" value="<?php echo e(request('search')); ?>"> <!-- Campo de texto para busca, que retém o valor pesquisado -->
        <button type="submit">Buscar</button> <!-- Botão para submeter a busca -->
        <a href="<?php echo e(route('livro.create')); ?>">Criar</a> <!-- Link para criar um novo livro, direcionando para a rota 'livro.create' -->
    </form>

    <ul>
        <!-- Loop para exibir a lista de livros -->
        <?php $__currentLoopData = $livros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <!-- Link para exibir os detalhes de cada livro, usando a rota 'livro.show' e o ID do livro -->
                <a href="<?php echo e(route('livro.show', $livro->id)); ?>"><?php echo e($livro->titulo); ?></a> 
                
                <!-- Link para editar o livro, usando a rota 'livro.edit' com o ID do livro como parâmetro -->
                <a href="<?php echo e(route('livro.edit', ['livro' => $livro->id])); ?>">editar</a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <!-- Controle de paginação -->
    <div>
        <!-- Exibe a página atual e o total de páginas -->
        <span>Página <?php echo e($livros->currentPage()); ?> de <?php echo e($livros->lastPage()); ?></span>

        <!-- Link para a página anterior, se não estiver na primeira página -->
        <?php if($livros->onFirstPage()): ?>
            <span>Anterior</span> <!-- Mostra 'Anterior' como texto desabilitado -->
        <?php else: ?>
            <a href="<?php echo e($livros->previousPageUrl()); ?>">Anterior</a> <!-- Link para a página anterior -->
        <?php endif; ?>

        <!-- Link para a próxima página, se houver mais páginas -->
        <?php if($livros->hasMorePages()): ?>
            <a href="<?php echo e($livros->nextPageUrl()); ?>">Próximo</a> <!-- Link para a próxima página -->
        <?php else: ?>
            <span>Próximo</span> <!-- Mostra 'Próximo' como texto desabilitado -->
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\João\Biblioteca\resources\views/home_livros.blade.php ENDPATH**/ ?>