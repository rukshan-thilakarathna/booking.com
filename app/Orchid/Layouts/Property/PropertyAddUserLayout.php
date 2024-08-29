<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

use App\Models\User;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class PropertyAddUserLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        $property_owners = User::where('role', 'property-owner')->get()->pluck('name', 'id');

        return [
            Select::make('property.user_id')
                ->options($property_owners)
                ->title(__('Property Owner'))
                ->required(),
        ];

    }
}
