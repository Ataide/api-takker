<?php

namespace App\Enums;

/**
 * @OA\Schema()
 */
enum OrderStatusEnum: string {
    case Pending = 'pending';
    case Active = 'active';
    case Inactive = 'inactive';
    case Rejected = 'rejected';
}
