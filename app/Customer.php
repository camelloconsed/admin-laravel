<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    const LOGO_TEMP = 'logo.jpg';
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','description', 'logo', 'contact_name', 'contact_position', 'contact_phone', 'contact_email', 'db_host', 'db_port', 'db_name', 'db_user', 'db_password', 'status',
    ];

 
}
