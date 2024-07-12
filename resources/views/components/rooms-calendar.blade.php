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

        // Get the current year and month
        $year = 2024;
        $month = 8;
        if ($month < 10){
            $month = '0'.$month;
        }
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

            <div
                @if(strpos($availability, $dateString))
                    style="background: red; color: white;"
                @endif
                class="zd2"> {{ $currentDay }}</div>
        @endfor
</div>

@endforeach
