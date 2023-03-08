<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCompany extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'     => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => false],
            'street'   => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => false],
            'postcode' => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => false],
            'state'    => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => false],
            'city'     => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => false],
            'country'  => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('company');
    }

    public function down()
    {
        $this->forge->dropTable('company');
    }
}