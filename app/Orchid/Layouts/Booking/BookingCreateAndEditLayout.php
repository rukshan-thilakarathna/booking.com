<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Booking;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class BookingCreateAndEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Select::make('booking.room_id')
                ->title('Room Number')
                ->required()
                ->placeholder('Select Room Number')
                ->fromQuery(Rooms::where('user_id', '=', (Auth::user())->id), 'number'),

            Select::make('booking.user_id')
                ->title('Is Registered User')
                ->empty('No select', '')
                ->fromQuery(User::where('role', '=', 'user'), 'email'),

            Input::make('booking.email')
                ->type('email')
                ->title('Email')
                ->placeholder('Enter Email'),

            Input::make('booking.name')
                ->type('text')
                ->required()
                ->title('Name')
                ->placeholder('Enter Name'),

            Input::make('booking.phone_number')
                ->type('text')
                ->required()
                ->title('Phone Number')
                ->placeholder('Enter Phone Number'),

            Input::make('booking.id')
                ->type('hidden'),

            Input::make('booking.adults')
                ->type('number')
                ->required()
                ->title('Adults')
                ->placeholder('Enter Adults Count'),

            Input::make('booking.children')
                ->type('number')
                ->title('Children')
                ->placeholder('Enter Children'),


            Input::make('booking.check_in_Date')
                ->type('datetime-local')
                ->required()
                ->title('Check In Date')
                ->placeholder('YYYY-MM-DDTHH:MM'),

            Input::make('booking.check_out_Date')
                ->type('datetime-local')
                ->title('Check Out Date')
                ->required()
                ->placeholder('YYYY-MM-DDTHH:MM'),

            TextArea::make('booking.special_requests')
                ->title('Special Requests')
                ->rows(5),
        ];
    }
}
