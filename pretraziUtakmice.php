<?php
include 'kon.php';

$utakmica = new Utakmica();

$nizUtakmica = $utakmica->vratiSve($mysqli);

if(empty($nizUtakmica)) {
    echo "Nema postojecih utakmica.";
} else {
 ?>

 <table class="table table-hover">
    <thead>
        <tr>
            <th>Tim 1</th>
            <th>Tim 2</th>
            <th>Opis</th>
            <th>Vreme</th>
        </tr>
    </thead>
    <tbody>

    <?php
        foreach ($nizUtakmica as $utakmica) {
            ?>
        <tr>
            <td><?= $utakmica->tim1 ?></td>
            <td><?= $utakmica->tim2 ?></td>
            <td><?= $utakmica->opis ?></td>
            <td><?= $utakmica->vreme ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
 </table>
<?php } ?> 