<?php

/*
 * This file is part of Solder.
 *
 * (c) Kyle Klaus <kklaus@indemnity83.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Make changes to the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('solder_full')->default(0);
            $table->boolean('solder_users')->default(0);
            $table->boolean('solder_modpacks')->default(0);
            $table->boolean('solder_mods')->default(0);
            $table->boolean('solder_create')->default(0);
            $table->boolean('mods_create')->default(0);
            $table->boolean('mods_manage')->default(0);
            $table->boolean('mods_delete')->default(0);
            $table->string('modpacks')->nullable();
            $table->timestamps();
        });

        $perm = new UserPermission();
        $perm->user_id = 1;
        $perm->solder_full = true;
        $perm->save();
    }

    /**
     * Revert the changes to the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_permissions');
    }
}
