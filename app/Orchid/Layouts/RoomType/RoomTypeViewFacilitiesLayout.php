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
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('viewfacilities[]')
                    ->value('Balcony')
                    ->checked(false)
                    ->placeholder('Balcony'),

                CheckBox::make('viewfacilities[]')
                    ->value('Mountain view')
                    ->checked(false)
                    ->placeholder('Mountain view'),

                CheckBox::make('viewfacilities[]')
                    ->value('Garden view')
                    ->checked(false)
                    ->placeholder('Garden view'),
            ],),
            \Orchid\Screen\Fields\Group::make([

                CheckBox::make('viewfacilities[]')
                    ->value('City view')
                    ->checked(false)
                    ->placeholder('City view'),
            ],),



        ];
    }
}
