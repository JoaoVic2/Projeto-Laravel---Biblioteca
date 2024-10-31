<form action="<?php echo e(route('livro.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
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
        <button type="submit">Enviar</button>
    </div>
</form>
<?php /**PATH C:\Users\João\Biblioteca\resources\views/create_livros.blade.php ENDPATH**/ ?>