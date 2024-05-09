<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class ContactCreateAndEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('property.email')
                ->type('email')
                ->title('Email')
                ->required()
//                ->value('bootstrap@example.com')
                ->placeholder('example@example.com')
                ->help('Enter your email address.'),

            Input::make('property.contact_number')
                ->type('tel')
                ->title('Contact Number')
                ->required()
                ->placeholder('Enter phone number')
                ->help('Enter your phone number.'),

            Input::make('property.whatsapp_numner')
                ->type('tel')
                ->title('Whatsapp Number')
                ->placeholder('Enter Whatsapp Number')
                ->help('Enter your Whatsapp Number.'),
        ];
    }
}
