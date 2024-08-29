<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use App\Models\ViewFacilities;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class RoomTypeViewFacilitiesLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {


        return [
            Select::make('roomtype.viewfacilities_item')
                ->fromModel(ViewFacilities::class,'name') // Assuming this returns a model class
                ->allowAdd()
                ->multiple(),
        ];
    }
}
