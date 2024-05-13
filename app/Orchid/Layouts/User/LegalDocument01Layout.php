<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;

class LegalDocument01Layout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.id')
                ->type('hidden'),

            Input::make('user.profile_image')
                ->required()
                ->type('file')
                ->title('Profile Image'),

            Input::make('user.nic_or_passport_front_image')
                ->type('file')
                ->required()
                ->title('NIC Card Front Image'),

            Input::make('user.nic_or_passport_back_image')
                ->type('file')
                ->required()
                ->title('NIC Card Back Image'),
        ];
    }
}
