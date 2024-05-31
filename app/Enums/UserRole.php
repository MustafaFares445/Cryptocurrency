<?php

declare(strict_types=1);

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

/**
 * @method static static SUPER_ADMIN()
 * @method static static ADMIN()
 * @method static static STAFF()
 * @method static static STUDENT()
 */
final class UserRole extends Enum
{
    const SUPER_ADMIN = "SUPER_ADMIN";
    const ADMIN = "ADMIN";
    const STAFF = "STAFF";
    const STUDENT = "STUDENT";
}
