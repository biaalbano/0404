<?php
require_once '.vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection; //PDO

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fecthAll(PDO::FETCH_ASSOC);



$_title = 'Gêneros';
?>

</php include('./includes/header.php') ?>
        <a class="btn btn-primary" href="insert.php">Novo Gênero</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?= $g['id'] ?></td>
                    <td><?= $g['nome'] ?></td>
                    <td><a class="btn btn-secondary" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                    <td><a class="btn btn-danger" href="delete.php?id=<?= $g['id'] ?>">Excluir</a>
                </tr>
                <?php endforeach ?>
        </table>
<?php include('/includes/footer.php') ?>