<?php
session_start();
 function mostraAlerta($tipo) {
     if(isset($_SESSION[$tipo])) {
?>
    <div class="alert alert-<?= $tipo ?>"><?= $_SESSION[$tipo]?></div>
<?php
        unset($_SESSION[$tipo]);
     }
 }