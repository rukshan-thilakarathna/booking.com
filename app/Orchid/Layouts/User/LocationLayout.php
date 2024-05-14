<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use App\Models\Cities;
use App\Models\Districts;
use Orchid\Platform\Models\User;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Layouts\Rows;

class LocationLayout extends Rows
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
            Relation::make('user.main_location')
                ->fromModel(Districts::class, 'name_en')
                ->title(__('Distric')),

            Relation::make('user.sub_location')
                ->fromModel(Cities::class, 'name_en')
                ->title(__('City')),

            Input::make('user.address')
                ->type('text')
                ->title('Address'),
        ];
    }
}
