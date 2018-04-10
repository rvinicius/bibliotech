<?php
require_once('cabecalho.php');

$usuarioDao = new UsuarioDAO($conexao);
$usuarios = $usuarioDao->listaUsuarios();

$livrosDao = new LivroDAO($conexao);
$livros = $livrosDao->listaLivrosDisponiveis();

?>

<div class="container card">
    <h2 class="card-title pt-3">Cadastro de empréstimo</h2>
    <form action="insert-emprestimo.php" method="post">
        <div class="form-row card-body">
    
            <div class="form-group col-md-6">
                <label for="usuario">Usuário</label>
                <select name="id_usuario" class="form-control">
                    <?php foreach ($usuarios as $usuario) : ?>
                        <option value="<?= $usuario->getId() ?>"><?= $usuario->getId()." - ".$usuario->getNome() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        
            <div class="form-group col-md-6">
                <label for="livro">Livro</label>
                    <select name="id_livro" class="form-control">
                    <?php foreach ($livros as $livro) : ?>
                        <option value="<?= $livro->getId() ?>"><?= $livro->getId()." - ".$livro->getNome() ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group col-md-12">
               <input type="submit" value="Gerar empréstimo" class="btn btn-primary float-right" />
            </div>
            <div class="alert alert-info col-md-12" role="alert">
                O empréstimo tem duração de 7 dias úteis e é responsabilidade do dono do empréstimo fazer a renovação ou a entrega dentro da data. A multa para cada dia fora do prazo é de <strong>1 R$</strong>.
            </div>
        </div>
    </form>
</div>