<?php

namespace App\Observers\doctor;

use App\Models\Avaliable_time;
use App\Models\Time_Slots;

use Carbon\Carbon;
class AvaliableTimeObserve
{
    /**
     * Handle the Avaliable_time "created" event.
     */


        public function created(Avaliable_time $avaliable_time)
        {
            $startDate = Carbon::now()->startOfWeek()->next($avaliable_time->day); 
            $endDate = $startDate->copy()->addWeek();


            $this->createTimeSlots($avaliable_time, $startDate);
            $this->createTimeSlots($avaliable_time, $endDate);
        }

        private function createTimeSlots(Avaliable_time $avaliable_time, Carbon $date)
        {
            $startTime = Carbon::parse($avaliable_time->start_time);
            $endTime = Carbon::parse($avaliable_time->end_time);

            while ($startTime->lt($endTime)) {
                $slotEndTime = $startTime->copy()->addMinutes($avaliable_time->duration);

                Time_Slots::create([
                    'avaliable_time_id' => $avaliable_time->id,
                    'start_time' => $startTime->toTimeString(),
                    'end_time' => $slotEndTime->toTimeString(),
                    'date' => $date->toDateString(),
                    'status' => 'available',
                ]);

                $startTime->addMinutes($avaliable_time->duration);
            }
        }

    /**
     * Handle the Avaliable_time "updated" event.
     */
    public function updated(Avaliable_time $avaliable_time)
    {
        // حذف جميع الـ TimeSlot المرتبطة بالـ avaliable_time المعدلة
        $avaliable_time->timeSlots()->delete();

        // إنشاء TimeSlot جديدة بناءً على البيانات المحدثة
        $startDate = Carbon::now()->startOfWeek()->next($avaliable_time->day); // اليوم المحدد من الأسبوع الحالي
        $endDate = $startDate->copy()->addWeek(); // نفس اليوم من الأسبوع القادم

        $this->updateTimeSlots($avaliable_time, $startDate);
        $this->updateTimeSlots($avaliable_time, $endDate);
    }

    public function updateTimeSlots(Avaliable_time $avaliable_time, Carbon $date)
    {
        $startTime = Carbon::parse($avaliable_time->start_time);
        $endTime = Carbon::parse($avaliable_time->end_time);

        while ($startTime->lt($endTime)) {
            $slotEndTime = $startTime->copy()->addMinutes($avaliable_time->duration);

            Time_Slots::create([
                'avaliable_time_id' => $avaliable_time->id,
                'start_time' => $startTime->toTimeString(),
                'end_time' => $slotEndTime->toTimeString(),
                'date' => $date->toDateString(),
                'status' => 'available',
            ]);

            $startTime->addMinutes($avaliable_time->duration);
        }
    }

    /**
     * Handle the Avaliable_time "deleted" event.
     */
    public function deleted(Avaliable_time $avaliable_time): void
    {
        //
        $avaliable_time->timeSlots()->delete();
    }

    /**
     * Handle the Avaliable_time "restored" event.
     */
    public function restored(Avaliable_time $avaliable_time): void
    {
        //
    }

    /**
     * Handle the Avaliable_time "force deleted" event.
     */
    public function forceDeleted(Avaliable_time $avaliable_time): void
    {
        //
    }
}
