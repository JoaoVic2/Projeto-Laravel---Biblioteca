<form action="<?php echo e(route('livro.update',['livro' => $livro->id])); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div>
        <label for="nome">Título do Livro:</label>
        <input type="text" id="nome" name="nome" required />
    </div>
    <div>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required />
    </div>
    <div>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
    </div>
    <div class="button">
        <button type="submit">editar</button>
    </div>
</form>
<?php /**PATH C:\Users\João\Biblioteca\resources\views/edit_livro.blade.php ENDPATH**/ ?>