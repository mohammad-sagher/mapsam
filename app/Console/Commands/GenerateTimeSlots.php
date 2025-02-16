<?php

namespace App\Console\Commands;

use App\Models\Time_Slots;
use App\Models\Avaliable_time;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateTimeSlots extends Command
{
    /**
     * اسم الأمر الذي سيتم تشغيله في Artisan.
     */
    protected $signature = 'generate:time-slots';

    /**
     * وصف الأمر عند تشغيله في Artisan.
     */
    protected $description = 'Delete unbooked slots for the previous day and generate slots for the same day in the third week';

    /**
     * تنفيذ الأمر.
     */
    public function handle()
    {
        // حذف الأوقات غير المحجوزة لليوم المنتهي
        $this->deleteUnbookedSlots();

        // إنشاء أوقات جديدة لليوم في الأسبوع الثالث
        $this->generateNewSlots();

        $this->info('Time slots updated successfully.');
    }

    /**
     * حذف الأوقات غير المحجوزة لليوم السابق.
     */
    private function deleteUnbookedSlots()
    {
        $yesterday = Carbon::now()->subDay()->toDateString();

        Time_Slots::where('date', $yesterday)
                ->where('status', 'available')
                ->delete();
    }

    /**
     * إنشاء أوقات جديدة لنفس اليوم بعد أسبوعين.
     */
    private function generateNewSlots()
    {
        $avaliable_times = Avaliable_time::all();
        $today = Carbon::now();
        $thirdWeekDate = $today->copy()->addWeeks(2);

        foreach ($avaliable_times as $avaliable_time) {
            // تحويل يوم الأسبوع إلى رقم (0 = الأحد، 6 = السبت)
            $avaliableTimeDay = Carbon::parse("last " . ucfirst($avaliable_time->day))->dayOfWeek;

            // التحقق من أن اليوم الحالي يطابق اليوم المحدد في available_time
            if ($today->dayOfWeek === $avaliableTimeDay) {
                $this->createTimeSlots($avaliable_time, $thirdWeekDate);
            }
        }
    }

    /**
     * إنشاء الـ time slots لليوم المحدد.
     */
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
}
