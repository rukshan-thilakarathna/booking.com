<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use App\Models\PropertyType;
use App\Models\RoomType;
use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
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
            Select::make('roomfacilities')
//                ->allowAdd()
                ->multiple()
                ->options(config('constants.RoomFacilities')),
        ];
    }
}
