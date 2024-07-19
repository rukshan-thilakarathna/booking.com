<?php

namespace App\Orchid\Screens\Booking;

use App\Models\Booking;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;

class BookingCardsScreen extends Screen
{
    public $bookingId;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    public function query(Booking $id): iterable
    {
        $this->bookingId = $id;
        $booking = Booking::with('properties','roomType','Room')->where('id',$id->id)->first();


        return [
            'booking' => $booking
        ];
    }


    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Booking View Cards';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive guide to the design and implementation of cards, including basic and advanced features.';
    }



    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Back')->route('bookings')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function layout(): iterable
    {
        return [
            Layout::legend('booking', [
                Sight::make('room_number' ,'Room Number'),
                Sight::make('properties.name' ,'Property Name'),
                Sight::make('roomType.name' ,'Room Type Name'),
                Sight::make('name' ,'User Name'),
                Sight::make('email' ,'User Email'),
                Sight::make('phone_number' ,'User Number'),
                Sight::make('total_amount' ,'Price'),

                Sight::make('adults' ,'Adults'),
                Sight::make('children' ,'Children'),

                Sight::make('special_requests' ,'Special Requests'),

                Sight::make('check_in_Date' ,'Check In Date') ->usingComponent(DateTimeSplit::class),
                Sight::make('check_out_Date' ,'Check Out Date') ->usingComponent(DateTimeSplit::class),

                Sight::make('booking_date' ,'Booking Date') ->usingComponent(DateTimeSplit::class),
            ]),
        ];
    }

}
