<?php 
require_once("cabecalho.php"); 
?>

<br/>
<div class="container card">
  <h2 class="card-title pt-3">Cadastro de usuário</h2>
<form action="insert-usuario.php" method="post">
  <div class="form-row card-body ">

    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="form-group col-md-6">
      <label for="dataNascimento">Data de nascimento</label>
      <input type="date" class="form-control" name="dataNascimento" required>
    </div>

    <div class="form-group col-md-6">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="cpf" onkeyup="mascara(this,mascCpf)" maxlength="14" required>
    </div>

    <div class="form-group col-md-6">
      <label for="rg">RG</label>
      <input type="text" class="form-control" name="rg" onkeyup="mascara(this,mascRg)" maxlength="12" required>
    </div>
        
    <div class="form-group col-md-6">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="telefone">Telefone</label>
      <input type="text" class="form-control" name="telefone" onkeyup="mascara(this,mascTel)" maxlength="15" required>
    </div>

    <div class="form-group col-md-12">
      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" name="endereco" required>
    </div>

     <div class="form-group col-md-12">
       <input type="submit" value="Cadastrar" class="btn btn-primary float-right" />
     </div>
  </div>

</form>
</div>
<?php require_once("rodape.php"); ?>