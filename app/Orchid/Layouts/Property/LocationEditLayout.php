<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\PropertyType;
use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class LocationEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Select::make('main_location')
                ->fromModel(Districts::class, 'name_en')
                ->title(__('Distric'))
                ->required(),

            Select::make('sub_location')
                ->fromModel(Cities::class, 'name_en')
                ->title(__('City'))
                ->required(),

            Input::make('address')
                ->type('text')
                ->title('Address'),
        ];
    }
}
