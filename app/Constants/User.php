<?php

namespace App\Constants;

/**
 * Class to provide user types available.
 */
class User
{
    const TYPE_GOD = 'god';
    const TYPE_APPROVER = 'approver';
    const TYPE_REQUESTER = 'requester';

    /**
     * Get all user types available.
     * 
     * @return array
     */
    public static function getAll()
    {
        return [
            self::TYPE_GOD,
            self::TYPE_APPROVER,
            self::TYPE_REQUESTER
        ];
    }
}
