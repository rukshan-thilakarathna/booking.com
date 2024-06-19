<?php

namespace App\Orchid\Screens\RoomType;

use App\Models\Reviews;
use App\Models\Rooms;
use App\Models\RoomType;
use App\Orchid\Layouts\Rooms\RoomCreateAndUpdateLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeListLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

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
            'room_types' => RoomType::filters()->with('propertyName', 'postedUser')->orderBy('id', 'desc')->where('user_id' ,Auth::user()->id)->paginate(12),
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

    public function permission(): ?iterable
    {
        return [
            'create.room.type.permissions'
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
            Layout::modal('Create Room',
                [Layout::block(RoomCreateAndUpdateLayout::class)
                    ->title(__(' Information'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.'))]
            )->size(Modal::SIZE_LG),
        ];
    }

    public function remove(Request $request): void
    {
        RoomType::findOrFail($request->get('id'))->delete();

        Toast::info(__('Room Type was removed'));
    }

    public function statusChange(Request $request): void
    {
        $roomtype = RoomType::findOrFail($request->get('id'));

        $status = $request->get('status') == 1 ? 0 : 1;
        $roomtype->status = $status;
        $roomtype->save();
        Toast::info(__('Room Type Status was Changed'));
    }

    public function CreateRoom(Request $request): void
    {
        $newRoom = New Rooms;


        if ($request->hasFile('room.images'))
        {
            // Get the uploaded file
            $file = $request->file('room.images');

            // Generate a unique name for the file
            $name = time() . random_int(1, 100) . '.' . $file->extension();

            // Move the file to the 'Property/Rooms' directory
            $file->move(public_path('Property/Rooms'), $name);

            // Set the generated file name
            $gb_image_name = $name;
        }

        $newRoom->room_type_id = $request->get('room_type_id');;
        $newRoom->property_id = $request->get('property_id');;
        $newRoom->number = $request['room.number'];
        $newRoom->price = $request['room.price'];
        $newRoom->point_price = $request['room.point_price'];
        $newRoom->Children = $request['room.Children'] ?? 1;
        $newRoom->display_price = $request['room.display_price'];
        $newRoom->user_choice = $request['room.user_choice'] ?? 1;
        $newRoom->open_point_or_cash = $request['room.open_point_or_cash'] ?? 1;
        $newRoom->first_payment_price = $request['room.first_payment_price'];
        $newRoom->image = $gb_image_name ?? 0;
        $newRoom->status = 1;

        $newRoom->save();

        $roomtype = RoomType::findOrFail($request->get('room_type_id'));
        $roomtype->rooms_added = 1;
        $roomtype->save();
        Toast::info(__('Room was Created'));
    }



}
