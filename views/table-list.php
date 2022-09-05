<?php
session_start();
require_once('../controllers/controller-table-list.php');
?>
<?php include('templates/header.php'); ?>
<a href="dashboard.php">Retour</a>

<p class="fs-2 text-center m-5">LISTE DES PATIENTS</p>

<div class="row m-0 p-0 justify-content-center">
    <div class="col-lg-8 text-center">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">info</th>
                    <th scope="col">modifier</th>
                    <th scope="col">supprimer</th>

                </tr>
            </thead>
            <tbody class="p-5">
                <?php
                foreach ($patients as $value) { ?>
                    <tr>
                        <th class="pt-3"><?= $value['patients_id'] ?></th>
                        <td class="pt-3"><?= $value['patients_lastname'] ?></td>
                        <td class="pt-3"><?= $value['patients_firstname'] ?></td>
                        <td class="pt-3"><?= $value['patients_phonenumber'] ?></td>
                        <td><a href="info-patient.php?patients=<?= $value['patients_id'] ?>" class="btn btn-primary">+ info</a></td>
                        <td><a href="modif-patient.php?patientId=<?= $value['patients_id'] ?>" class="btn btn-secondary">modification</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#patient-<?= $value['patients_id'] ?>">Supprimer</button>
                        </td>
                    </tr>



                <?php } ?>



            </tbody>
        </table>
        <?php
        foreach ($patients as $value) { ?>

            <!-- Modal -->
            <div class="modal fade" id="patient-<?= $value['patients_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimez ? </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">non</button>

                                <button type="button" class="btn btn-primary" name="delete" value="<?= $value['patients_id'] ?>" onclick="document.location='table-list.php?patients_id=<?= $value['patients_id'] ?>'">oui</button>
                         

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>

<?php
include('templates/footer.php');
?>