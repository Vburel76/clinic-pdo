<?php
session_start();

require_once '../controllers/controller-connection.php';

include('templates/header.php');
?>
    <p class="fs-2 text-center m-5">IDENTIFICATION</p>



    <form action="#" method="POST">
        <div class="row justify-content-center m-0 p-0 ">
            <div class="col-lg-3 border border-dark p-5 rounded  ">
                <label for="login">Identifiant</label>
                <span class="ms-2 text-danger">
                    <?= isset($error['login']) ? $error['login'] : '' ?>
                </span>
                <input id="login" name="login" class="tailleInput " type="text" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">

                <label class="mt-4">Mot de passe</label><span class="ms-2 text-danger"><?= isset($error['password']) ? $error['password'] : '' ?></span>
                <input name="password" class="tailleInput" type="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">

                <div class="row justify-content-center m-0 p-0">
                    <div class="col-lg-11  mt-3 ">
                        <p class="text-danger text-center fontStyle"><?= isset($error['connection']) ? $error['connection'] : '' ?></p>
                        <input type="submit" class="btn fontColor btnSize" value="Connection">
                    </div>
                </div>
            </div>

            <a class="text-center m-3" href="#">Mot de passe oublié</a>


        </div>
    </form>




<?php
include('templates/footer.php');
?>