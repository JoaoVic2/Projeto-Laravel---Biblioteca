<h1><?php echo e($livro->titulo); ?></h1>
<p>Autor: <?php echo e($livro->autor); ?></p>
<p>Descrição: <?php echo e($livro->descricao); ?></p>

<form action="<?php echo e(route('livro.destroy', $livro->id)); ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn btn-danger">Deletar</button>
</form>
<?php /**PATH C:\Users\João\Biblioteca\resources\views/show_livro.blade.php ENDPATH**/ ?>