@php

        function getWeekDays() {
            $weekDays = [];
            $startOfWeek = new DateTime();
            $startOfWeek->setISODate((int)date('o'), (int)date('W'), 1); // Set to Monday of the current week

            for ($i = 0; $i < 7; $i++) {
                $weekDays[] = $startOfWeek->format('l'); // 'l' is the format character for the full textual representation of the day
                $startOfWeek->modify('+1 day');
            }
            return $weekDays;
        }

        $zdateString = $_GET['Date'] ?? date('Y-m');
        $zdate = DateTime::createFromFormat('Y-m', $zdateString);

        // Extract month and year
        $zmonth = $zdate->format('m'); // Outputs '12'
        $zyear = $zdate->format('Y'); // Outputs '2024'

        // Get the current year and month
        $year = $zyear;
        $month = $zmonth;

        $monthName = date('F', mktime(0, 0, 0, $month, 1));
        // Get the number of days in the current month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $weekDaysArray = getWeekDays();
        $all_dates = 42;
        $date = new DateTime($year.'-'.$month.'-01');
        $firstDayName = $date->format('l');
        $firstDayIndexNumber = array_search($firstDayName, $weekDaysArray);

        $Day = [];
        for ($i = 0; $i < $all_dates; $i++){
            if ($firstDayIndexNumber > $i){
                $Day[] = '*';
            }
        }

        for ($i = 1; $i <= $daysInMonth; $i++){
            $Day[] = $i;
        }

        for ($i = 1; $i <= $all_dates; $i++){
            if (($all_dates-($all_dates-$daysInMonth)) < $i){
                $Day[] = '*';
            }
        }

@endphp

@foreach($availabierelities as $key => $value)


<div class="zd3">
    <h1>{{$year}} - {{$month}} ({{$monthName}})</h1>
</div>
<form>
    <div class="zd1">
        @foreach($weekDaysArray as $day)
            <div class="zd2 zd4">{{ $day }}</div>
        @endforeach
            @for ($i = 0; $i < $all_dates; $i++)
                @php
                    $currentDay = $Day[$i];
                    $availability = $value->$currentDay;
                    $dateString = '[' . $year . '-' . $month . ']';
                @endphp

                <div class="zd2">
                    <span style="background: white; display: flex;width: 24px;align-items: center;justify-content: center;border-radius: 5px; ">{{ $currentDay }}</span>

                    @if ($currentDay != '*')
                        @if(strpos($availability, $dateString))
                            <span style="border-radius: 0px 5px 5px 0px;background: #d9a9a9;display: block; width: 100%;padding: 5px 13px;border-left: 2px solid #f14a4a !important;">booked</span>
                        @else
                        <input type="checkbox" class="zin1" name="dates[]" value="{{$year}}-{{$month}}-{{$currentDay}}">
                            <span style="border-radius: 0px 5px 5px 0px;background: #83e399;display: block; width: 100%;padding: 5px 13px;border-left: 2px solid #179d35 !important;">available</span>
                        @endif
                    @endif
                </div>
            @endfor
    </div>
</form>

@endforeach
