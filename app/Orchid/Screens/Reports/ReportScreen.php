<?php

namespace App\Orchid\Screens\Reports;

use App\Models\Booking;
use App\Models\Properties;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;

class ReportScreen extends Screen
{
    public $AllBookingCount = 0;
    public $CheckOutBooking = 0;
    public $PendingBookingCount = 0;
    public $CanceledBookingCount = 0;
    public $ConfirmBookingCount = 0;
    public $BarterbedConfirmBookingRevenue = 0;
    public $BarterbedPendingBookingRevenue = 0;

    public $PropertyConfirmBookingRevenue = 0;
    public $PropertyPendingBookingRevenue = 0;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Request $request): iterable
    {


        // Use Carbon to get the start and end of the current month
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        // Get dates from request or default to the current month
        $startDate = $request->query('fromDate') ? date('Y-m-d', $request->query('fromDate')) : $startOfMonth;
        $endDate = $request->query('toDate') ? date('Y-m-d', $request->query('toDate')) : $endOfMonth;


        $bookings = Booking::selectRaw('
            COUNT(*) as AllBookingCount,
            SUM(CASE WHEN booking_status = 1 THEN 1 ELSE 0 END) as CheckOutBooking,
            SUM(CASE WHEN booking_status = 0 THEN 1 ELSE 0 END) as PendingBookingCount,
            SUM(CASE WHEN booking_status = 2 THEN 1 ELSE 0 END) as CanceledBookingCount,
            SUM(CASE WHEN booking_status = 3 THEN 1 ELSE 0 END) as ConfirmBookingCount
        ')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();

        $this->AllBookingCount = $bookings->AllBookingCount;
        $this->CheckOutBooking = $bookings->CheckOutBooking;
        $this->PendingBookingCount = $bookings->PendingBookingCount;
        $this->CanceledBookingCount = $bookings->CanceledBookingCount;
        $this->ConfirmBookingCount = $bookings->ConfirmBookingCount;


        $confirmBookings = Booking::selectRaw('
            SUM(total_amount * 0.10) as ConfirmBookingRevenue,
            SUM(total_amount) as AllConfirmBookingRevenue
        ')
            ->where('booking_status', 3)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();

        $this->BarterbedConfirmBookingRevenue = $confirmBookings->ConfirmBookingRevenue;
        $this->PropertyConfirmBookingRevenue = $confirmBookings->AllConfirmBookingRevenue - $confirmBookings->ConfirmBookingRevenue;

// Query for Pending Bookings
        $pendingBookings = Booking::selectRaw('
            SUM(total_amount * 0.10) as PendingBookingRevenue,
            SUM(total_amount) as AllPendingBookingRevenue
        ')
            ->where('booking_status', 0)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();

        $this->BarterbedPendingBookingRevenue = $pendingBookings->PendingBookingRevenue;
        $this->PropertyPendingBookingRevenue = $pendingBookings->AllPendingBookingRevenue - $pendingBookings->PendingBookingRevenue;



        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Report Screen';
    }

    public function description(): ?string
    {
        return 'A comprehensive guide to the design and implementation of cards, including basic and advanced features.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Filters  ')
                ->modal('Report Feilter')
                ->method('Filters'),

            Link::make('This Month')->route('reports')
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
            Layout::split([
                Layout::view('platform::dummy.block', ['title' => 'This Month Barterbed Confirm Booking Revenue','text' => 'LKR '.$this->BarterbedConfirmBookingRevenue]),
                Layout::view('platform::dummy.block', ['title' => 'This Month Barterbed Pending Booking Revenue','text' => 'LKR '.$this->BarterbedPendingBookingRevenue]),

                Layout::view('platform::dummy.block', ['title' => 'This Month All Booking Count','text' => $this->AllBookingCount]),
                Layout::view('platform::dummy.block', ['title' => 'This Month Confirm Booking Count','text' => $this->ConfirmBookingCount]),

                Layout::view('platform::dummy.block', ['title' => 'This Month Property Owner Pending Booking Revenue','text' => 'LKR '.$this->PropertyPendingBookingRevenue]),
                Layout::view('platform::dummy.block', ['title' => 'This Month Property Owner Confirm Booking Revenue','text' => 'LKR '.$this->PropertyConfirmBookingRevenue]),

                Layout::view('platform::dummy.block', ['title' => 'This Month Pending Booking Count','text' => $this->PendingBookingCount]),
                Layout::view('platform::dummy.block', ['title' => 'This Month CheckOut Booking Count','text' => $this->CheckOutBooking]),
            ])->ratio('50/50')->reverseOnPhone(),

            Layout::modal('Report Feilter',Layout::rows([

                Group::make([
                    Input::make('fromDate')
                        ->type('date')
                        ->required()
                        ->title('From Date'),

                    Input::make('toDate')
                        ->type('date')
                        ->required()
                        ->title('To Date')
                ],),
            ]))->applyButton('Apply'),

        ];
    }

    public function Filters(Request $request)
    {
        $fromDate = strtotime($request->fromDate);
        $toDate = strtotime($request->toDate);

        return redirect('dashboard/reports?fromDate='.$fromDate.'&toDate='.$toDate);
    }


}
