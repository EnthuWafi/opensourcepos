<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddService extends Migration
{
    public function up()
    {
        //
        error_log('Attempting to migrate');

        $this->forge->addField([
        'service_id'        => ['type' => 'INT','constraint' => 11,'auto_increment' => true],
        'customer_id'       => ['type' => 'INT','constraint' => 11,'null' => false],
        'device_type'       => ['type' => 'VARCHAR','constraint' => 100],
        'brand'             => ['type' => 'VARCHAR','constraint' => 100],
        'model'             => ['type' => 'VARCHAR','constraint' => 100],
        'serial_number'     => ['type' => 'VARCHAR','constraint' => 100], 
        
        'screws'            => ['type' => 'VARCHAR','constraint' => 255],
        'scratches'         => ['type' => 'VARCHAR','constraint' => 255],
        'damages'           => ['type' => 'VARCHAR','constraint' => 255],
        'screen'            => ['type' => 'VARCHAR','constraint' => 255],
        'keyboard_touchpad' => ['type' => 'VARCHAR','constraint' => 255],
        'speaker'           => ['type' => 'VARCHAR','constraint' => 255],
        'charger_adapter'   => ['type' => 'VARCHAR','constraint' => 255],

        'solutions'         => ['type' => 'TEXT','null' => true],

        'technician_id'     => ['type' => 'INT','constraint' => 11,'null' => true],

        'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        'deleted_at DATETIME DEFAULT NULL',
        ]);
        $this->forge->addKey('service_id', true);
        
        $this->forge->addForeignKey('customer_id', 'customers', 'person_id');
        $this->forge->addForeignKey('technician_id', 'employees', 'person_id');
        $this->forge->createTable('services');


        error_log('Migrating Service table');
    }

    public function down()
    {
        //
        $this->forge->dropTable('ospos_services');
    }
}
