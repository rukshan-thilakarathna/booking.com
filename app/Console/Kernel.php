<?php

namespace App\Console;

use App\Mail\smsMail;
use App\Models\Booking;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
                function modifyDateAndCompareToToday($dateString, $modification) {
                    // Create a DateTime object from the input date string
                    $date = new DateTime($dateString);

                    // Modify the date using the provided modification string
                    $date->modify($modification);

                    // Get today's date
                    $today = new DateTime();
                    $today->setTime(0, 0, 0); // Set the time to 00:00:00 for comparison

                    // Compare the modified date to today's date
                    return $date->format('Y-m-d') == $today->format('Y-m-d');
                }

                // Get user bookings with booking status 0
                $userbookings = Booking::where('booking_status', 0)->get();
                // Get bookings with booking status 1
                $pobookings = Booking::where('booking_status', 1)->get();

                // Iterate over user bookings and send notifications
                foreach ($userbookings as $book) {
                    if (modifyDateAndCompareToToday($book->last_payment_date, '+1 day')) {

                        $bk = Booking::where('id',$book->id)->first();
                        $bk->booking_status = 2;
                        $bk->save();

                    }

                    // Day 01
                    if (modifyDateAndCompareToToday($book->last_payment_date, '-1 day')) {
                        // Send notification for day 01
                        // e.g., sendUserNotification($book, 1);
                    }

                    // Day 03
                    if (modifyDateAndCompareToToday($book->last_payment_date, '-3 day')) {
                        // Send notification for day 03
                        // e.g., sendUserNotification($book, 3);
                    }

                    // Day 07
                    if (modifyDateAndCompareToToday($book->last_payment_date, '-7 day')) {
                        // Send notification for day 07
                        // e.g., sendUserNotification($book, 7);
                    }
                }

                // Iterate over PO bookings and send notifications
                foreach ($pobookings as $book) {
                    // Day 01
                    if (modifyDateAndCompareToToday($book->check_in_Date, '-1 day')) {
                        // Send notification for day 01
                        // e.g., sendPONotification($book, 1);
                    }

                    // Day 03
                    if (modifyDateAndCompareToToday($book->check_in_Date, '-3 day')) {
                        // Send notification for day 03
                        // e.g., sendPONotification($book, 3);
                    }

                    // Day 07
                    if (modifyDateAndCompareToToday($book->check_in_Date, '-7 day')) {
                        // Send notification for day 07
                        // e.g., sendPONotification($book, 7);
                    }
                }


//            $data = ['message' => 'This is a test message'];
//            Mail::to('thilakarathnarukshan9@gmail.com')->send(new smsMail($data));
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
