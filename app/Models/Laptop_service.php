<?php

namespace App\Models;

use CodeIgniter\Model;

class Laptop_service extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'service_id';

    protected $allowedFields    = [
        'customer_id', 'device_type', 'brand', 'model', 'serial_number',
        'screws', 'scratches', 'damages', 'screen', 'keyboard_touchpad',
        'speaker', 'charger_adapter', 'solutions', 'technician_id',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $useSoftDeletes = true;
    protected $deletedField   = 'deleted_at';


}
