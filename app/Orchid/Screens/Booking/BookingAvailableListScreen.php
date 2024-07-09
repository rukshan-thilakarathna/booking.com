<?php

namespace App\Orchid\Screens\Booking;


use App\Models\Availability;
use App\Models\Booking;
use App\Models\Rooms;
use App\Orchid\Layouts\Booking\BookingCreateAndEditLayout;
use App\Orchid\Layouts\Rooms\AvailableRoomsListLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BookingAvailableListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $chackIn;
    public $chackOut;
    public $adults;
    public $children;

    public function query(Request $request): iterable
    {
        $room = Rooms::with('roomType','property')->whereIn('number', $request['rooms'])->get();

        $this->chackIn = $request['chackIn'] ?? 0;
        $this->chackOut = $request['chackOut'] ?? 0;
        $this->adults = $request['adults'] ?? 0;
        $this->children = $request['children'] ?? 0;



        return [
            'rooms' => $room
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */

    public function name(): ?string
    {
        return 'BookingListScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            \Orchid\Screen\Actions\Link::make('Back')->route('bookings')
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
            Layout::table('rooms',[
                TD::make('id', __('Room Id')),
                TD::make('number', __('Room Number')),
                TD::make('roomType.name', __('Room Type')),
                TD::make('property.name', __('Property Name')),
                TD::make('display_price', __('One Day Price')),
                TD::make('point_price', __('Point Price'))->defaultHidden(),
                TD::make('status', __('Availability'))->render(function (Rooms $rooms){
                    return config('constants.RoomStatus')[$rooms->status];
                }),
                TD::make('created_at', __('Created'))
                    ->usingComponent(DateTimeSplit::class)

                    ->defaultHidden()
                    ->align(TD::ALIGN_RIGHT),

                TD::make('updated_at', __('Last edit'))
                    ->usingComponent(DateTimeSplit::class)

                    ->defaultHidden()
                    ->align(TD::ALIGN_RIGHT),

                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(fn (Rooms $room) => DropDown::make()
                        ->icon('bs.three-dots-vertical')
                        ->list([
                            ModalToggle::make('Place new booking')
                                ->modal('Place new booking')
                                ->method('CreateBooking',[
                                    'roomId'=>$room->id,
                                    'chackIn'=>$this->chackIn,
                                    'chackOut'=>$this->chackOut,
                                    'adults'=>$this->adults,
                                    'children'=>$this->children,

                                ]),

                        ])),
            ]),
            Layout::modal('Place new booking',
                [
                    Layout::block(BookingCreateAndEditLayout::class)
                        ->title(__(' Information'))
                        ->vertical()
                        ->description(__('Update your account\'s profile information and email address.')),
                ]
            )->size(Modal::SIZE_LG)->applyButton('Create'),
        ];
    }



    public function CreateBooking(Request $request)
    {

        $BookRoom = Rooms::with('roomType','property')->where('id',$request->get('roomId'))->first();

        $chackIn = strtotime($request->get('chackIn'));
        $chackOut = strtotime($request->get('chackOut'));
        $adults = $request->get('adults');
        $children = $request->get('children');
        $property_id[] = $BookRoom->property_id;


        $availability = (new Availability)->ChackAvailability($chackIn,$chackOut,$property_id,$adults,$children);

        $perameters=[];
        if (count($availability) >0){
            foreach ($availability as $key => $room){
                $perameters[] = $room->room_number;
            }
        }

        if (in_array($BookRoom->number,$perameters)){
            $availabilityDb = Availability::where('room_number',$BookRoom->number)->first();
            $dates = (new Availability)->getDate($chackIn,$chackOut);

            foreach ($dates['DateList'] as $key => $date){
                if ($date < 10){
                    $date = str_replace("0","",$date);
                }
                $availabilityDb->$date = $availabilityDb->$date.'['.$dates['YearMonthDateList'][$key].']';
            }

            $availabilityDb->save();

            $newBooking = new Booking();

            $newBooking->property_id = $BookRoom->property_id;
            $newBooking->room_type = $BookRoom->room_type_id;
            $newBooking->room_id =  $request->get('roomId');
            $newBooking->user_id = $request['booking.room_id'] ?? 0;
            $newBooking->name = $request['booking.name'];
            $newBooking->email = $request['booking.email'] ?? 0;
            $newBooking->phone_number = $request['booking.phone_number'];
            $newBooking->check_in_Date = $request->get('chackIn');
            $newBooking->room_number = $BookRoom->number;
            $newBooking->check_out_Date = $request->get('chackOut');
            $newBooking->booking_date =Carbon::now();
            $newBooking->total_amount = $BookRoom->display_price*count($dates['DateList']);
            $newBooking->payment_method ='cash';
            $newBooking->adults = $request->get('adults');
            $newBooking->children = $request->get('children');
            $newBooking->special_requests =$request['booking.special_requests'];
            $newBooking->payment_status =0;
            $newBooking->booking_status = 0;



            $newBooking->save();
            Toast::info(__('Booking Successful'));
        }else{
            Toast::error(__('Rooms Not Available'));
        }





    }

}
