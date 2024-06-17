<?php

namespace App\Orchid\Screens\RoomType;

use App\Models\RoomType;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomTypeCardsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
   public function query(RoomType $room_type_id): iterable
    {
        return [
            'roomtype' => $room_type_id
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Cards';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive guide to the design and implementation of cards, including basic and advanced features.';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Back')->route('room-types')
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
            Layout::legend('roomtype', [
                Sight::make('name'),
                Sight::make('disription'),
                Sight::make('room_size' , 'Room Size'),
                Sight::make('bathroom_facilities' , 'Bathroom Facilities'),
                Sight::make('kitchen_facilities' , 'Kitchen Facilities'),
                Sight::make('room_facilities' , 'Room Facilities'),
                Sight::make('view_facilities' , 'View Facilities'),
                Sight::make('bathroom_count' , 'Room Count'),
                Sight::make('washroom_count' , 'Washroom Count'),
                Sight::make('kitchen_count' , 'Kitchen Size'),
                Sight::make('smoking', 'Smoking')->render(fn (RoomType $roomType) => $roomType->smoking == 0
                    ? 'Ok'
                    : 'No'),

                Sight::make('images', 'Images')->render(function (RoomType $roomType) {
                    if ($roomType->images != null) {
                        $image_array = explode(',', $roomType->images);
//                        return $image_array;
                        $imagee='';
                        foreach ($image_array as $image) {
                            if ($image != ''){
                                $imagee .=  '<img style=" height: 100px;margin: 0 10px" src="/Property/RoomType/' . $image . '">';
                            }

                        }
                        return $imagee;
                    }else{
                        return 'No Image';
                    }
                }),
                Sight::make('created_at', 'Created'),
                Sight::make('updated_at', 'Updated'),
                Sight::make('status', 'Status')->render(fn (RoomType $roomType) => $roomType->status == 0
                    ? 'Ok'
                    : 'No'),

            ]),
        ];
    }

}
