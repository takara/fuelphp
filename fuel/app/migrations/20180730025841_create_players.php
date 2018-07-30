<?php

use Phpmig\Migration\Migration;

class CreatePlayers extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        DB::query(
            "CREATE TABLE `players` (\n".
            "  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\n".
            "  `hp` int(11) unsigned NOT NULL,\n".
            "  `exp` int(11) unsigned NOT NULL,\n".
            "  `created_at` int(11) unsigned DEFAULT NULL,\n".
            "  `updated_at` int(11) unsigned DEFAULT NULL,\n".
            "  PRIMARY KEY (`id`)\n".
            ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='プレイヤーデータ';\n"
        )->execute();
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        DB::query(
            "DROP TABLE `players`"
        )->execute();
    }
}
