<?php

namespace App\Orchid\Layouts\Booking;

use App\Models\Booking;
use App\Models\Properties;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
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
        $user = \App\Models\User::find((Auth::user())->id);
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

                if ($booking->booking_status == 3){
                    return 'Check Out';
                }
                if ($booking->booking_status == 4){
                    return 'Blocked';
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
                            ->canSee($user->hasAnyAccess(['edit.booking.permissions']))
                            ->route('bookings-update', $booking->id),

                        Link::make(__('View'))
                            ->canSee($user->hasAnyAccess(['view.booking.permissions']))
                            ->route('bookings-view', $booking->id),

                        Button::make('Change Payment Status')
                            ->canSee($booking->payment_status == 0  && $user->hasAnyAccess(['payment.booking.permissions']))
                            ->method('ChangePaymentStatus',[
                                'payment_status' => $booking->payment_status,
                                'id' => $booking->id
                            ]),

                            Button::make('Make Payment')
                            ->canSee($booking->payment_status == 0 && $user->role == 'user')
                            ->method('ChangePaymentStatus',[
                                'payment_status' => $booking->payment_status,
                                'id' => $booking->id
                            ]),

                        ModalToggle::make('Send Property Review')
                            ->modal('Send Property Review')
                            ->canSee( $booking->booking_status == 3 && $booking->reviewed == 0 && $user->role == 'user')
                            ->method('SendPropertyReview', [
                                'booking_id' => $booking->id,
                                'property_id' => $booking->property_id,
                                'sub_property_id' => $booking->room_number,
                            ]),

                        ModalToggle::make('Send Guest Review')
                            ->modal('Send Guest Review')
                            ->canSee( $booking->booking_status == 3 && $booking->reviewed == 0 && $user->role == 'property-owner')
                            ->method('SendGuestReview', [
                                'booking_id' => $booking->id,
                                'property_id' => $booking->property_id,
                                'sub_property_id' => $booking->room_number,
                                'guest_id' => $booking->user_id,
                            ]),

                        Button::make('Cancel Booking')
                            ->canSee($booking->booking_status == 1 && $user->hasAnyAccess(['cancel.booking.permissions']))
                            ->method('CancelBooking',[
                                'id' => $booking->id
                            ]),

                        Button::make('Check Out')
                            ->canSee(($booking->booking_status == 4 || $booking->booking_status == 1) && $user->hasAnyAccess(['checkOut.booking.permissions']))
                            ->method('ChackOutBooking',[
                                'id' => $booking->id
                            ]),

                    ])),
        ];
    }
}
