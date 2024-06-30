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

            TextArea::make('booking.special_requests')
                ->title('Special Requests')
                ->rows(5),
        ];
    }
}
