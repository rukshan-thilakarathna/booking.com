<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Booking;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
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
            Select::make('room_id')
                ->title('Room Number')
                ->placeholder('Select Room Number')
                ->multiple()
                ->fromQuery(Rooms::where('user_id', '=', (Auth::user())->id), 'number'),

            Select::make('user_id')
                ->title('Is Registered User')
                ->empty('No select', '')
                ->fromQuery(User::where('role', '=', 'user'), 'email'),

            Input::make('email')
                ->type('email')
                ->title('Email')
                ->placeholder('Enter Email'),

            Input::make('name')
                ->type('text')
                ->title('Name')
                ->placeholder('Enter Name'),

            Input::make('Phone Number')
                ->type('text')
                ->title('Phone Number')
                ->placeholder('Enter Phone Number'),

            Input::make('check_in_Date')
                ->type('datetime-local')
                ->title('Check In Date')
                ->placeholder('YYYY-MM-DDTHH:MM'),

            Input::make('check_out_Date')
                ->type('datetime-local')
                ->title('Check Out Date')
                ->placeholder('YYYY-MM-DDTHH:MM'),
        ];
    }
}
