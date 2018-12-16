<?php
/** @var \App\Entity\Airline[] $airlines */
/** @var \App\Entity\City[] $cities */
/** @var boolean $showSuccessMessage */
?>
<form id="create-form' target="/?controller=booking&action=create" method="post" >

    <div id="errorMessage" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none">
        <p> </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </div>
    <?php if($showSuccessMessage):?>
        <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
            Reserva cargada con exito
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
    <?php endif;?>
    <div class="form-group">
        <label for="departure">Ciudad salida</label>
        <select name="departure" class="form-control" id="departure">
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city->getId(); ?>"><?= $city->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="destination">Ciudad llegada</label>
        <select name="destination" class="form-control" id="destination">
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city->getId(); ?>"><?= $city->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="departureDate">Fecha salida</label>
        <input name="departureDate" type="text" class="form-control" id="departureDate">
    </div>
    <div class="form-group">
        <label for="airline">Aerolinea</label>
        <select name="airline" class="form-control" id="airline">
            <?php foreach ($airlines as $airline): ?>
                <option value="<?= $airline->getId(); ?>"><?= $airline->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>
