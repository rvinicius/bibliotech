<?php 
require_once("cabecalho.php"); 
?>

<br/>
<div class="container card">
  <h2 class="card-title pt-3">Cadastro de usuário</h2>
<form action="insert-usuario.php" method="post">
  <div class="form-row card-body ">

    <div class="form-group col-md-5">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome">
    </div>
    <div class="form-group col-md-5">
      <label for="dataNascimento">Data de nascimento</label>
      <input type="date" class="form-control" name="dataNascimento">
    </div>

    <div class="form-group col-md-5">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="cpf">
    </div>

    <div class="form-group col-md-5">
      <label for="rg">RG</label>
      <input type="text" class="form-control" name="rg">
    </div>
        
    <div class="form-group col-md-5">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email">
    </div>
    
    <div class="form-group col-md-5">
      <label for="telefone">Telefone</label>
      <input type="text" class="form-control" name="telefone">
    </div>

    <div class="form-group col-md-10">
      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" name="endereco">
    </div>

     <div class="form-group col-md-10">
       <input type="submit" value="Cadastrar" class="btn btn-primary float-right" />
     </div>
  </div>

</form>
</div>
<?php require_once("rodape.php"); ?>