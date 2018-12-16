<?php
/**
 * @var \App\Entity\Booking[] $bookings
 */
?>

<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">ID Reserva</th>
        <th scope="col">Ciudad salida</th>
        <th scope="col">Fecha/hora salida</th>
        <th scope="col">Ciudad llegada</th>
        <th scope="col">Fecha/hora llegada</th>
        <th scope="col">Aerolinea</th>
        <th scope="col">Vencimiento de reserva</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($bookings as $booking): ?>
        <tr>
            <th scope="row"><?= $booking->getId() ?></th>
            <td><?= $booking->getDeparture() ?></td>
            <td><?= $booking->getDepartureDateUTC() ?></td>
            <td><?= $booking->getDestination() ?></td>
            <td><?= $booking->getArriveDateUTC() ?></td>
            <td><?= $booking->getAirline() ?></td>
            <td><?= $booking->getExpirationDate() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
