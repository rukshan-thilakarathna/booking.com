<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class PropertyFacilitiesLayout extends Rows
{

    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            CheckBox::make('facilities[]')
                ->value(0)
                ->checked(false)
                ->placeholder('Parking'),

            CheckBox::make('facilities[]')
                ->value(1)
                ->checked(false)
                ->placeholder('Free Wifi'),

            CheckBox::make('facilities[]')
                ->value(2)
                 ->checked(false)
                ->placeholder('Restaurant'),

            CheckBox::make('facilities[]')
                ->value(3)
                 ->checked(false)
                ->placeholder('Pet friendly'),

            CheckBox::make('facilities[]')
                ->value(4)
                 ->checked(false)
                ->placeholder('Room service'),

            CheckBox::make('facilities[]')
                ->value(5)
                 ->checked(false)
                ->placeholder('24-hour front desk'),

            CheckBox::make('facilities[]')
                ->value(6)
                 ->checked(false)
                ->placeholder('Fitness center'),

            CheckBox::make('facilities[]')
                ->value(7)
                 ->checked(false)
                ->placeholder('Non-smoking rooms'),

            CheckBox::make('facilities[]')
                ->value(8)
                 ->checked(false)
                ->placeholder('Airport shuttle'),

            CheckBox::make('facilities[]')
                ->value(9)
                 ->checked(false)
                ->placeholder('Family rooms'),

            CheckBox::make('facilities[]')
                ->value(10)
                 ->checked(false)
                ->placeholder('Spa'),

            CheckBox::make('facilities[]')
                ->value(11)
                 ->checked(false)
                ->placeholder('Electric vehicle charging station'),

            CheckBox::make('facilities[]')
                ->value(12)
                 ->checked(false)
                ->placeholder('Wheelchair accessible'),

            CheckBox::make('facilities[]')
                ->value(13)
                 ->checked(false)
                ->placeholder('Swimming pool'),
        ];

    }
}

