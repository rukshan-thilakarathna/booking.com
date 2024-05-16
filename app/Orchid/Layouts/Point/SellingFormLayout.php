<?php

namespace App\Orchid\Layouts\Point;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use PHPUnit\Metadata\Group;


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
