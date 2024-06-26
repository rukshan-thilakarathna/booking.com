<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\RoomType;

use App\Models\PropertyType;
use App\Models\User;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

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
            Select::make('bathroomfacilities')
                ->allowAdd()
                ->multiple()
                ->options(config('constants.BathroomFacilities')),
        ];
    }
}
