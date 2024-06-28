<?php

namespace App\Orchid\Layouts\Booking;

use App\Models\Booking;
use App\Models\Properties;
use App\Models\Rooms;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BookingListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'bookings';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', __('Booking Code'))->filter()->sort(),

            TD::make('room_number', __('Room Number'))->filter()->sort(),

            TD::make('properties.name', __('Property Name')),

            TD::make('roomType.name', __('Room Type')),

            TD::make('total_amount', __('Price')),

            TD::make('payment_status', __('Payment Status'))->render(function (Booking $booking){
                return $booking->payment_status == 1 ? 'Successful' : 'Pending';
            }),

            TD::make('booking_status', __('Status'))->render(function (Booking $booking){
//                return $booking->booking_status == 1 ? 'Confirm' : 'Pending';
                if ($booking->booking_status == 1){
                    return 'Confirm';
                }

                if ($booking->booking_status == 0){
                    return 'Pending';
                }

                if ($booking->booking_status == 2){
                    return 'Canceled';
                }
            }),

            TD::make('created_at', __('Created At'))
                ->usingComponent(DateTimeSplit::class)
                ->filter()->sort()
                ->defaultHidden(),

            TD::make('updated_at', __('Updateda'))
                ->usingComponent(DateTimeSplit::class)
                ->filter()->sort()
                ->defaultHidden(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Booking $booking) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('bookings-update', $booking->id),

                        Link::make(__('View'))
                            ->route('bookings-view', $booking->id),

                        Button::make('Change Payment Status')
                            ->canSee($booking->payment_status == 0)
                            ->method('ChangePaymentStatus',[
                                'payment_status' => $booking->payment_status,
                                'id' => $booking->id
                            ]),

                        Button::make('Cancel Booking')
                            ->canSee($booking->booking_status == 1)
                            ->method('CancelBooking',[
                                'id' => $booking->id
                            ]),

                    ])),
        ];
    }
}
