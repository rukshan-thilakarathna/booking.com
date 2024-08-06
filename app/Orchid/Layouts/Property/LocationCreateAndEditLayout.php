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
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class LocationCreateAndEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Relation::make('property.main_location')
                ->fromModel(Districts::class, 'name_en')
                ->required()
                ->title(__('Distric')),

            Relation::make('property.sub_location')
                ->fromModel(Cities::class, 'name_en')
                ->required()
                ->title(__('City')),

            Input::make('property.address')
                ->type('text')
                ->title('Address'),

            Input::make('property.map')
                ->type('text')
                ->title('Map Link'),
        ];
    }
}
