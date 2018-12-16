<?php

namespace App\Controller;

use App\Entity\Airline;
use App\Entity\Booking;
use App\Repository\CityRepository;
use App\Utils\Strategies\ExpirationStrategyFactory;
use App\Views\Booking\CreateView;
use App\Views\Booking\ListView;
use App\Repository\BookingRepository;
use App\Repository\AirlineRepository;
use App\Exceptions\UnsupportedStrategyException;


class BookingController
{
    /**
     * @return mixed
     */
    public function listAction()
    {
        $bookingRepository = new BookingRepository();
        $bookings = $bookingRepository->findAll();
        $listView = new ListView();
        return $listView->render(compact('bookings'));
    }

    /**
     * @return mixed
     * @throws UnsupportedStrategyException
     */
    public function createAction()
    {
        $airlinesRepository = new AirlineRepository();
        $airlines = $airlinesRepository->findAll();

        $cityRepository = new CityRepository();
        $cities = $cityRepository->findAll();

        $showSuccessMessage = false;

        if (isset($_POST['departure'], $_POST['destination'], $_POST['airline'], $_POST['departureDate'])) {

            $booking = $this->createBooking();
            $bookingRepository = new BookingRepository();
            if ($bookingRepository->save($booking)) {
                $showSuccessMessage = true;
            }
        }
        $createView = new CreateView();
        return $createView->render(compact('airlines', 'cities', 'showSuccessMessage'));
    }

    /**
     * @return Booking
     * @throws UnsupportedStrategyException
     */
    private function createBooking()
    {
        $bookingExpirationDate = $this->getBookingExpirationDate();
        $bookingDepartureDateTime = $_POST['departureDate'] . ' 10:00:00';
        $bookingArriveDateTime = $_POST['departureDate'] . ' 15:00:00';
        $booking = new Booking(
            -1,
            $_POST['departure'],
            $_POST['destination'],
            $bookingDepartureDateTime,
            $bookingArriveDateTime,
            $_POST['airline'],
            $bookingExpirationDate,
            null
        );
        return $booking;
    }

    /**
     * @return string
     * @throws UnsupportedStrategyException
     */
    private function getBookingExpirationDate()
    {
        $airlinesRepository = new AirlineRepository();
        /** @var Airline $airline */
        $airline = $airlinesRepository->findOneById($_POST['airline']);
        $strategy = ExpirationStrategyFactory::createStrategy($airline->getBookingExpirationStrategy());
        $bookingExpirationDate = $strategy->getExpirationDate(new \DateTime(), $airline->getExpirationDays());
        return $bookingExpirationDate;
    }
}