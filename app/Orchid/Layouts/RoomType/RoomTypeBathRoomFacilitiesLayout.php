<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use \App\Models\BathRoomFacilities;

class RoomTypeBathRoomFacilitiesLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Select::make('roomtype.bathroomfacilities_item')
                ->fromModel(BathRoomFacilities::class,'name')
                ->allowAdd()
                ->multiple(),
        ];
    }
}
