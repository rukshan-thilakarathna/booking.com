<?php

namespace App\Orchid\Screens\RoomType;

use App\Models\RoomType;
use App\Orchid\Layouts\RoomType\FullPropertyFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomTypesEditScreen extends Screen
{

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    public function query(RoomType $room_type): iterable
    {
        return [
            'roomtype' => $room_type
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */

    public function name(): ?string
    {
        return 'RoomTypesEditScreen';
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
            Layout::block(RoomTypeEditLayout::class)
                ->title(__(' Information'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(FullPropertyFacilitiesLayout::class)
                ->title(__(' Full Property Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeRoomFacilitiesLayout::class)
                ->title(__('Room Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeBathRoomFacilitiesLayout::class)
                ->title(__('BathRoom Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeViewFacilitiesLayout::class)
                ->title(__('View Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeKitchenFacilitiesLayout::class)
                ->title(__('Kitchen Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),
        ];
    }


    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'roomtype.name' => 'nullable|string|max:255',
        ]);



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $bathroom_facilities_list = '';
        $bathroom_facilities = $request->input('bathroomfacilities');

        if (!empty($bathroom_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $bathroom_sanitized_facilities = array_map('htmlspecialchars', $bathroom_facilities);
            $bathroom_facilities_list = implode(', ', $bathroom_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $room_facilities_list = '';
        $room_facilities = $request->input('roomfacilities');

        if (!empty($room_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $room_sanitized_facilities = array_map('htmlspecialchars', $room_facilities);
            $room_facilities_list = implode(', ', $room_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $kitchen_facilities_list = '';
        $kitchen_facilities = $request->input('kitchenfacilities');

        if (!empty($kitchen_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $kitchen_sanitized_facilities = array_map('htmlspecialchars', $kitchen_facilities);
            $kitchen_facilities_list = implode(', ', $kitchen_sanitized_facilities);
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $view_facilities_list = '';
        $view_facilities = $request->input('viewfacilities');

        if (!empty($view_facilities)) {
            // Ensure each facility item is converted to a string using htmlspecialchars
            $view_sanitized_facilities = array_map('htmlspecialchars', $view_facilities);
            $view_facilities_list = implode(', ', $view_sanitized_facilities);
        }
        if($request->hasfile('images')) {
            $image = $this->store($request);
        }

        // Create a new RoomType instance
        $roomtype = RoomType::findOrFail($request['roomtype.id']);

        // Assign validated data to the RoomType instance
        $roomtype->name = $request['roomtype.name'];
        $roomtype->images = $image ??  $roomtype->images;
        $roomtype->user_id = Auth::user()->id;
        $roomtype->room_size = $request['roomtype.room_size'];
        $roomtype->bathroom_facilities = $bathroom_facilities_list ?? $roomtype->bathroom_facilities;
        $roomtype->bedroom_count = $request['roomtype.bedroom_count'] ?? 1;
        $roomtype->washroom_count = $request['roomtype.wshroom_count'] ?? 1;
        $roomtype->kitchen_count = $request['roomtype.kitchen_count'] ?? 0;
        $roomtype->kitchen_facilities = $kitchen_facilities_list ?? $roomtype->kitchen_facilities;
        $roomtype->disription = $request['roomtype.disription'];
        $roomtype->room_facilities = $room_facilities_list ?? $roomtype->room_facilities;
        $roomtype->view_facilities = $view_facilities_list ?? $roomtype->view_facilities;
        $roomtype->smoking = $request['roomtype.smoking'] ?? 0;
        $roomtype->status = $request['roomtype.status'] ?? 1;

        // Save the RoomType instance to the database
        $roomtype->save();
        Toast::info(__('Room Type  was updated'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
        ]);

        if($request->hasfile('images'))
        {

            $gb_image_name = '';
            foreach($request->file('images') as $file)
            {
                $name =time() . random_int(1, 100) . '.' . $file->extension();
                $file->move(public_path('Property/RoomType'), $name);
                $gb_image_name .= $name . ',';
            }
        }

        return $gb_image_name;
    }
}
