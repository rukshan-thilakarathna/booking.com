<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\Availability;
use App\Models\Rooms;
use App\View\Components\RoomsCalendar;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use App\Models\Booking;
use Orchid\Support\Facades\Toast;
use Carbon\Carbon;

class RoomsCalendarListScreen extends Screen
{
    public $RoomNumber = 0;
    public $Roomid = 0;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Rooms $id): iterable
    {

        $availabierelities = Availability::where('room_number', $id->number)->get();


        $this->RoomNumber = $id->number;
        $this->Roomid = $id->id;

        return [
            'id' => $id->number,
            'availabierelities' => $availabierelities,
            ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room number 00'.$this->RoomNumber.' Booking Calendar';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Filters')
                ->modal('Feilter')
                ->method('Filters',[
                    'id'=>$this->Roomid
                ]),

                Button::make(__('Block'))
                ->icon('bs.check-circle')
                ->method('save',[
                    'id'=>$this->Roomid
                ]),

            Link::make('Back')->route('room-types')
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
            \Orchid\Support\Facades\Layout::component(RoomsCalendar::class),

            Layout::modal('Feilter',Layout::rows([
                Group::make([
                    Input::make('event_month')
                        ->type('month')
                        ->title('Event Month')
                        ->value('2024-07')
                        ->placeholder('YYYY-MM')
                        ->horizontal(),
                ],),
            ]))->applyButton('Apply'),
        ];
    }

    public function Filters(Request $request)
    {
        return redirect('dashboard/calendar/'.$request->id.'?Date='.$request->event_month);
    }

    public function save(Request $request)
    {

      
        if($request->dates != null){
            $BookRoom = Rooms::with('roomType','property')->where('id',$request->id)->first();


        $chackIn = strtotime($request->dates[0]);
        $chackOut = strtotime( $request->dates[count($request->dates) - 1]);
        $property_id[] = $BookRoom->property_id;


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
            $newBooking->room_id =  $BookRoom->id;
            $newBooking->user_id =  0;
            $newBooking->name =null;
            $newBooking->email = null;
            $newBooking->phone_number = null;
            $newBooking->check_in_Date = $request->dates[0];
            $newBooking->room_number = $BookRoom->number;
            $newBooking->check_out_Date = $request->dates[count($request->dates) - 1];
            $newBooking->booking_date =Carbon::now();
            $newBooking->total_amount = 0;
            $newBooking->payment_method =null;
            $newBooking->adults = 0;
            $newBooking->children = 0;
            $newBooking->special_requests ='';
            $newBooking->payment_status =4;
            $newBooking->booking_status = 4;

            $newBooking->save();
            Toast::info(__('Successful'));
        }else{
            Toast::error(__('Date Empty'));
        }

    }


}
