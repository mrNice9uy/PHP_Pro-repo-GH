<?php


namespace app\interfaces;


interface UserSessionInterface
{
    public static function authById(int $userId): bool;

    public static function getCurrentUser(): ?array;
}