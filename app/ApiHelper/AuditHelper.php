<?php
namespace App\ApiHelper;
use Auth;
class AuditHelper
{
    public static function create($request): array
    {
        $currentDate = Carbon::now()->toDateTimeString();
        $userId = Auth::id();

        $audit = [
            'created_date' => $currentDate,
            'created_by' => $userId,
            'modified_date' => $currentDate,
            'modified_by' => $userId
        ];
        return array_merge($request, $audit);
    }

    public static function update($request): array
    {
        $currentDate = Carbon::now()->toDateTimeString();
        $userId = Auth::id();

        $audit = [
            'modified_date' => $currentDate,
            'modified_by' => $userId
        ];
        return array_merge($request, $audit);
    }

    public static function createWithUser($request): array
    {
        $userId = Auth::id();

        $audit = [
            'created_by' => $userId,
            'modified_by' => $userId
        ];
        return array_merge($request, $audit);
    }

}
