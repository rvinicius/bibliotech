
  <div class="form-row ">

    <div class="form-group col-md-5">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" value="<?= $usuario->getNome()?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="nome">Data de nascimento</label>
      <input type="text" class="form-control" name="dataNascimento" value="<?= $usuario->getDataNascimento()?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="isbn">CPF</label>
      <input type="text" class="form-control" name="cpf" value="<?= $usuario->getCpf()?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="isbn">RG</label>
      <input type="text" class="form-control" name="rg" value="<?= $usuario->getRg()?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="isbn">E-mail</label>
      <input type="text" class="form-control" name="email" value="<?= $usuario->getEmail()?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="isbn">Endereco</label>
      <input type="text" class="form-control" name="endereco" value="<?= $usuario->getEndereco()?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="autor">Telefone</label>
      <input type="text" class="form-control" name="telefone" value="<?= $usuario->getTelefone()?>" readonly>
    </div>
  </div>

