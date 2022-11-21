<?php

use Freedom\Modules\DB\Migration\Master;
use Freedom\Modules\DB\Migration\Register;
use Freedom\Modules\DB\Migration\Schema;

class UsersMigration extends Register {

    public function up()
    {
        Schema::make('users', function (Master $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique_key();
        });
    }

    public function down()
    {
        // TODO: Implement down() method.
    }
}
