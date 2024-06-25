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
            \Orchid\Screen\Fields\Group::make([
                CheckBox::make('bathroomfacilities[]')
                    ->value('Free toiletries')
                    ->checked(false)
                    ->placeholder('Free toiletries'),

                CheckBox::make('bathroomfacilities[]')
                    ->value('Slippers')
                    ->checked(false)
                    ->placeholder('Slippers'),

                CheckBox::make('bathroomfacilities[]')
                    ->value('Bathrobe')
                    ->checked(false)
                    ->placeholder('Bathrobe'),
            ],),
            \Orchid\Screen\Fields\Group::make([

                CheckBox::make('bathroomfacilities[]')
                    ->value('Spa bath')
                    ->checked(false)
                    ->placeholder('Spa bath'),

                CheckBox::make('bathroomfacilities[]')
                    ->value('Bidet')
                    ->checked(false)
                    ->placeholder('Bidet'),

                CheckBox::make('bathroomfacilities[]')
                    ->value('Bath or shower')
                    ->checked(false)
                    ->placeholder('Bath or shower'),
            ],),

            CheckBox::make('bathroomfacilities[]')
                ->value('Toilet paper')
                ->checked(false)
                ->placeholder('Toilet paper'),

        ];
    }
}
