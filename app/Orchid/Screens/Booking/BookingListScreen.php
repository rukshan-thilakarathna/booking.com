<?php

namespace App\Orchid\Screens\Booking;

use App\Models\Availability;
use App\Models\Booking;
use App\Models\Properties;
use App\Models\Rooms;
use App\Orchid\Layouts\Booking\BookingCreateAndEditLayout;
use App\Orchid\Layouts\Booking\BookingListLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Http\Middleware\Access;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BookingListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        $bookings = Booking::with('properties','roomType','Room');

        if ($user->role == 'user'){
            $bookings = $bookings->where('user_id',$user->id);
        }
        $bookings = $bookings->filters()->orderBy('id', 'desc')->paginate(12);


        return [
            'bookings' => $bookings
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Booking List Screen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [
            ModalToggle::make('Check Availability')
                ->modal('Check Availability')
                ->canSee($user->hasAnyAccess(['create.booking.permissions']))
                ->method('ChackAvailability'),
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
            BookingListLayout::class,
            Layout::modal('Check Availability',Layout::rows([

                Select::make('properties')
                    ->fromQuery(Properties::where('user_id',(Auth::user())->id),'name')
                    ->multiple()
                    ->title('Select Properties')
                    ->required(),

                Group::make([
                    Input::make('chack_in')
                        ->type('date')
                        ->required()
                        ->title('Check In'),

                    Input::make('chack_out')
                        ->type('date')
                        ->required()
                        ->title('Check Out')
                ],),
                Group::make([
                    Input::make('adults')
                        ->type('number')
                        ->title('Adults'),
                    Input::make('children')
                        ->type('number')
                        ->title('Children')
                ],),
            ]))->applyButton('Chack'),
        ];
    }

    public function ChackAvailability(Request $request)
    {

        $chackIn = strtotime($request->chack_in);
        $chackOut = strtotime($request->chack_out);
        $adults = $request->adults;
        $children = $request->children;
        $property_id=$request->properties;

        $availability = (new Availability)->ChackAvailability($chackIn,$chackOut,$property_id,$adults,$children);

        $perameters='';
        if ($availability != false){
            if (count($availability) > 0) {
                foreach ($availability as $key => $room){
                    $oparetor = $key==0 ? '?' : '&';
                    $perameters .= $oparetor.'rooms[]='.$room->room_number;
                }
                return redirect('dashboard/bookings/available'.$perameters.'&chackIn='.$request->chack_in.'&chackOut='.$request->chack_out.'&adults='.$adults.'&children='.$children);
            } else {
                Toast::error(__('Rooms Not Available'));
            }
        }else {
            Toast::error(__('Invalide Data'));
        }

    }

    public function ChangePaymentStatus(Request $request)
    {
        $booking = Booking::findOrFail($request->get('id'));

        if ($request->get('payment_status')==0){
            $booking->payment_status = 1;
            $booking->booking_status = 1;
        }
        $booking->save();
        Toast::info(__('Successful'));
    }

    public function CancelBooking(Request $request)
    {
        $booking = Booking::findOrFail($request->get('id'));
            $booking->booking_status = 2;
            $booking->save();

            $Availabile = Availability::where('room_number' ,$booking->room_number)->first();

            $chackIn = strtotime($booking->check_in_Date);
            $chackOut = strtotime($booking->check_out_Date);

            $dates = (new Availability)->getDate($chackIn,$chackOut);


            $Availabile = Availability::where('room_number' ,$booking->room_number )->first();

            foreach ($dates['DateList'] as $key => $date){
                if ($date < 10){
                    $date = str_replace("0","",$date);
                }
                $Availabile->$date = str_replace('['.$dates['YearMonthDateList'][$key].']',"",$Availabile->$date);
            }
        $Availabile->save();
        Toast::info(__('Successful'));
    }

    public function ChackOutBooking(Request $request)
    {
        $booking = Booking::findOrFail($request->get('id'));
        $booking->booking_status = 3;
        $booking->save();

        $Availabile = Availability::where('room_number' ,$booking->room_number)->first();

        $chackIn = strtotime($booking->check_in_Date);
        $chackOut = strtotime($booking->check_out_Date);

        $dates = (new Availability)->getDate($chackIn,$chackOut);


        $Availabile = Availability::where('room_number' ,$booking->room_number )->first();

        foreach ($dates['DateList'] as $key => $date){
            if ($date < 10){
                $date = str_replace("0","",$date);
            }
            $Availabile->$date = str_replace('['.$dates['YearMonthDateList'][$key].']',"",$Availabile->$date);
        }
        $Availabile->save();
        Toast::info(__('Successful'));
    }
}
