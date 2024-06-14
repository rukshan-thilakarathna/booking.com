<?php

namespace App\Orchid\Screens\RoomType;

use App\Models\Reviews;
use App\Models\RoomType;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeListLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class RoomTypesListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'room_types' => RoomType::filters()->orderBy('id', 'desc')->paginate(12),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room Types';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            RoomTypeListLayout::class,

            Layout::modal('Room Type View',[Layout::block(RoomTypeEditLayout::class)
                ->title(__(' Information'))
                ->vertical()
                ->description(__('Update your account\'s profile information and email address.')),

                Layout::block(RoomTypeRoomFacilitiesLayout::class)
                    ->title(__('Room Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),

                Layout::block(RoomTypeBathRoomFacilitiesLayout::class)
                    ->title(__('BathRoom Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),

                Layout::block(RoomTypeViewFacilitiesLayout::class)
                    ->title(__('View Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),

                Layout::block(RoomTypeKitchenFacilitiesLayout::class)
                    ->title(__('Kitchen Facilities'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),])->size(Modal::SIZE_LG)->withoutApplyButton(true)->async('asyncGetRoomType'),
        ];
    }


    public function asyncGetRoomType(RoomType $roomtype): iterable
    {
        return [
            'roomtype' => $roomtype,
        ];
    }
}
