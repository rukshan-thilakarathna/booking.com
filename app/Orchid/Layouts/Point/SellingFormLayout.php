<?php

namespace App\Orchid\Layouts\Point;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;


class SellingFormLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */


    public function fields(): array
    {
        return [

            Input::make('point_count')
                ->type('number')
                ->required()
                ->placeholder('Enter Point Count')
                ->title('Point Count'),

            Input::make('Price')
                ->type('number')
                ->required()
                ->placeholder('Enter Price')
                ->title('Price'),

            Password::make('password')
                ->required()
                ->placeholder('Enter Your Password')
                ->title(__('Password')),

        ];

    }
}
