<?php

namespace Examples\Routes\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExampleRoutesTableMigration extends Migration
{
    protected $DBGroup = 'default';

    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT',     'constraint' => 11, ' null' => false, 'unsigned' => true, 'auto_increment' => true],
            'vorname'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'nachname' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
         ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('example_routes', true);
    }

    public function down()
    {
        $this->forge->dropTable('example_routes', true);
    }
}
