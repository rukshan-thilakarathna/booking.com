<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomCardsScreen extends Screen
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
        return [
            'room' => $room_id
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Room Type View Cards';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive guide to the design and implementation of cards, including basic and advanced features.';
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
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Back')->route('room',$this->room->room_type_id)
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function layout(): iterable
    {
        return [
            Layout::legend('room', [
                Sight::make('number' ,'Room Number'),
                Sight::make('adults','Adults' ),
                Sight::make('Children' ,'Children'),
                Sight::make('price' ,'Price'),
                Sight::make('dicecount','Discount (%)' ),
                Sight::make('display_price' ,'Total Price'),
                Sight::make('point_price','Point Price' ),
                Sight::make('user_choice','User Choice' )->render(function (Rooms $rooms){
                    return $rooms->user_choice == 1 ? 'No Choice' : $rooms->user_choice;
                }),
                Sight::make('open_point_or_cash' ,'Open Point Or Cash' )->render(function (Rooms $rooms){
                    return $rooms->open_point_or_cash == 1 ? 'Cash' : 'Point';
                }),
                Sight::make('first_payment_price' ,'First Payment'),
                Sight::make('image' )->render(function (Rooms $rooms){

                    $imagee =  '<img style=" height: 100px;margin: 0 10px" src="/Property/Rooms/' . $rooms->image . '">';

                    return empty($rooms->image) ? 'No Image' :$imagee;
                }),
                Sight::make('status' ,'Status')->render(function (Rooms $rooms){
                    return config('constants.RoomStatus')[$rooms->status];
                }),
                Sight::make('created_at' ) ->usingComponent(DateTimeSplit::class),
                Sight::make('updated_at' ) ->usingComponent(DateTimeSplit::class),
//                Sight::make('disription'),
//                Sight::make('room_size' , 'Room Size (m²)'),
//                Sight::make('bathroom_facilities' , 'Bathroom Facilities'),
//                Sight::make('kitchen_facilities' , 'Kitchen Facilities'),
//                Sight::make('room_facilities' , 'Room Facilities'),
//                Sight::make('view_facilities' , 'View Facilities'),
//                Sight::make('bathroom_count' , 'Room Count'),
//                Sight::make('washroom_count' , 'Washroom Count'),
//                Sight::make('kitchen_count' , 'Kitchen Size'),
//                Sight::make('smoking', 'Smoking')->render(fn (RoomType $roomType) => $roomType->smoking == 0
//                    ? 'No'
//                    : 'Ok'),
//
//                Sight::make('images', 'Images')->render(function (RoomType $roomType) {
//                    if ($roomType->images != null) {
//                        $image_array = explode(',', $roomType->images);
////                        return $image_array;
//                        $imagee='';
//                        foreach ($image_array as $image) {
//                            if ($image != ''){
//                                $imagee .=  '<img style=" height: 100px;margin: 0 10px" src="/Property/RoomType/' . $image . '">';
//                            }
//
//                        }
//                        return $imagee;
//                    }else{
//                        return 'No Image';
//                    }
//                }),
//                Sight::make('created_at', 'Created'),
//                Sight::make('updated_at', 'Updated'),
//                Sight::make('status', 'Status')->render(fn (RoomType $roomType) =>  config('constants.RoomTypeStatus')[$roomType->status]),

            ]),
        ];
    }

}
