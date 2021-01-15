<?php

namespace App\Constants;

/**
 * Class that hold then constants of transaction types.
 */
class Transaction
{
    const TYPE_REQUEST = 'request';
    const TYPE_USAGE = 'usage';
    const TYPE_STOCK_OPNAME = 'stock-opname';
    const TYPE_PURCHASE = 'purchase';
    const TYPE_RETURN = 'return';

    /**
     * Get all transaction types available.
     * 
     * @return array
     */
    public static function getAll()
    {
        return [
            self::TYPE_REQUEST,
            self::TYPE_USAGE,
            self::TYPE_STOCK_OPNAME,
            self::TYPE_PURCHASE,
            self::TYPE_RETURN
        ];
    }

    /**
     * Get all transaction types available for specific user type.
     * 
     * @param string $userType
     * @return array
     */
    public static function getByUser(string $userType)
    {
        $transactionTypesAvailable = [];
        switch ($userType) {
            case User::TYPE_GOD:
                $transactionTypesAvailable = [
                    self::getAll()
                ];
                break;
            default:
                $transactionTypesAvailable = [
                    self::TYPE_REQUEST,
                    self::TYPE_USAGE,
                    self::TYPE_RETURN
                ];
                break;
        }

        return $transactionTypesAvailable;
    }
}
