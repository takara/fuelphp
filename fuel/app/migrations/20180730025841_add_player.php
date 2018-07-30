<?php

use Phpmig\Migration\Migration;

class AddPlayer extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        DB::query(
            "CREATE TABLE `player` (\n".
            "  `player_id` int(11) unsigned NOT NULL,\n".
            "  KEY `player_id` (`player_id`)\n".
            ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='プレイヤーデータ';\n"
        )->execute();
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        DB::query(
            "DROP TABLE `player`"
        )->execute();
    }
}
