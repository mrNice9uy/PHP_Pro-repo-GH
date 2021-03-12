<?php


namespace app\services;

use app\models\records\User;

class UserSession extends User
{
    public static function authById(int $userId): bool
    {
        $_SESSION['user_id'] = $userId;
        return true;
    }

    public static function getCurrentUser(): ?array
    {
        if($userId = $_SESSION['user_id']) {
            return static::getById($userId);
        }
        return null;
    }
}