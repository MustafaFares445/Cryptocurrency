<?php

declare(strict_types=1);

namespace App\Enums;


use Illuminate\Validation\Rules\Enum;

final class UserPermission extends Enum
{
    const CREATE_USERS = 'CREATE_USERS';
    const SHOW_USERS = 'SHOW_USERS';
    const DELETE_USERS = 'DELETE_USERS';
    const CHANGE_PASSWORD_OF_ADMIN = 'CHANGE_PASSWORD_OF_ADMIN';
    const CHANGE_PASSWORD_OF_STUDENT = 'CHANGE_PASSWORD_OF_STUDENT';
    const CHANGE_PASSWORD_OF_STAFF = 'CHANGE_PASSWORD_OF_STAFF';
    const UPLOAD_FILES = 'UPLOAD_FILES';
    const DOWNLOAD_FILES = 'DOWNLOAD_FILES';

}
