<?php

namespace App\Models;

class AccountModel extends BaseModel
{
    protected $tableName = 'users';
    protected  $primaryKey = 'id_user';
    protected  $email = 'email';
}
