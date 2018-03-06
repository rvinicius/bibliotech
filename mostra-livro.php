

  <div class="form-row ">

    <div class="form-group col-md-5">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" value="<?= $livro->getNome()?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="isbn">ISBN</label>
      <input type="text" class="form-control" name="isbn" value="<?= $livro->getIsbn()?>" readonly>
    </div>

    <div class="form-group col-md-5">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" name="autor" value="<?= $livro->getAutor()?>" readonly>
    </div>
  </div>

