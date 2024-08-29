<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use \App\Models\PropertyFacilities;

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
            Select::make('property.facilities_item')
                ->fromModel(PropertyFacilities::class,'name') // Assuming this returns a model class
                ->allowAdd()
                ->multiple(),
        ];

    }
}

