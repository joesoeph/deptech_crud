<?php

namespace App\Rules;

use App\Models\LeaveRequest;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxLeaveDays implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = auth()->user();
        
        $totalLeaveDays = LeaveRequest::where('user_id', $user->id)
            ->whereYear('start_date', Carbon::now()->year)
            ->sum(function ($query) {
                dd($query->end_date);
                return Carbon::parse($query->end_date)->diffInDays(Carbon::parse($query->start_date)) + 1;
            });

            dd($totalLeaveDays);

        $newLeaveDays = Carbon::parse($value)->diffInDays(Carbon::parse(request()->input('start_date'))) + 1;

        $canCreateLeaveRequests = ($totalLeaveDays + $newLeaveDays) <= 5;

        if (!$canCreateLeaveRequests) {
            $fail('You have exceeded the maximum allowed leave days in a year.');
        }
    }
}
