<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\PropertyType;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class PropertyCreateAndEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
                Select::make('property.type')
                    ->fromModel(PropertyType::class, 'name')
                    ->title(__('Property Type'))
                    ->required(),

               Input::make('property.name')
                   ->type('text')
                   ->max(40)
                   ->required()
                   ->title(__('property Name'))
                   ->placeholder(__('Name')),

               TextArea::make('property.description')
                   ->title('Example Description')
                   ->rows(6),

        ];
    }
}

