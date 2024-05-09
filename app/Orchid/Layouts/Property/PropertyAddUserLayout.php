<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Property;

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
