<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use App\Models\RoomFacilities;
use App\Models\RoomType;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class RoomTypeRoomFacilitiesLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Select::make('roomtype.roomfacilities_item')
                ->fromModel(RoomFacilities::class,'name') // Assuming this returns a model class
                ->allowAdd()
                ->multiple(),
        ];
    }
}
