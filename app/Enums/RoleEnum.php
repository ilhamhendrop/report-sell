<?php

namespace App\Enums;

enum RoleEnum:string {
    case ADMIN = 'Admin';

    public function label() : string {
        return match ($this) {
            self::ADMIN => 'Admin',
        };
    }
}
