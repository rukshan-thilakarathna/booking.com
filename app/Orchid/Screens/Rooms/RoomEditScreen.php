<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Orchid\Layouts\Role\RoleEditLayout;
use App\Orchid\Layouts\Rooms\RoomCreateAndUpdateLayout;
use App\Orchid\Layouts\RoomType\FullPropertyFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomEditScreen extends Screen
{
    public $room;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    public function query(Rooms $room_id): iterable
    {
        $this->room = $room_id;
//        dd($room_id);
        return [
            'room' => $room_id
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */

    public function name(): ?string
    {
        return 'Room Edit Screen';
    }

    public function permission(): ?iterable
    {
        return [
            'create.room.type.permissions'
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */

    public function commandBar(): iterable
    {
        return [
            Link::make('Back')->route('room',$this->room->room_type_id),
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**$user = \App\Models\User::find((Auth::user())->id);
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */

    public function layout(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [

            Layout::block([
                RoomCreateAndUpdateLayout::class
            ]) ->title(__('Edit Room Information'))
                ->description(__('Update your account\'s profile information and email address.')),
        ];
    }


    public function save(Request $request)
    {
        $newRoom = Rooms::findOrFail($request['room.id']);

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


        $fullprice = $request['room.price'];
        if(!empty($request['room.dicecount'])){
            $fullprice =  $fullprice-(($fullprice*$request['room.dicecount'])/100);
        }
        $first_payment_price = ($fullprice*10)/100;

        // Assign validated data to the RoomType instance
        $newRoom->room_type_id = $request->get('room_type_id');;
        $newRoom->property_id = $request->get('property_id');;
        $newRoom->number = $request['room.number'];
        $newRoom->price = $request['room.price'];
        $newRoom->dicecount = $request['room.dicecount'];
        $newRoom->point_price = $request['room.point_price'];
        $newRoom->Children = $request['room.Children'] ?? 1;
        $newRoom->display_price = $fullprice;
        $newRoom->user_choice = $request['room.user_choice'] ?? 1;
        $newRoom->open_point_or_cash = $request['room.open_point_or_cash'] ?? 1;
        $newRoom->first_payment_price = $first_payment_price;
        $newRoom->image = $gb_image_name ?? 0;
        $newRoom->status = 1;

        // Save the RoomType instance to the database
        $newRoom->save();
        Toast::info(__('Room  was updated'));
    }
}
