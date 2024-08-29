<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use App\Models\KitchenFacilities;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class RoomTypeKitchenFacilitiesLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [

                Select::make('roomtype.kitchenfacilities_item')
                ->fromModel(KitchenFacilities::class,'name') // Assuming this returns a model class
                ->allowAdd()
                ->multiple(),
        ];
    }
}
