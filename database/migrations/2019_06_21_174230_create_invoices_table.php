<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Database\TableComment;

class CreateInvoicesTable extends Migration {
    use TableComment;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function(Blueprint $table)
        {
            $table->bigInteger('id', true);
            $table->integer('user_id')->index();  

            $table->decimal('amount', 14);
            //$table->smallInteger('currency_id')->nullable();
            $table->smallInteger('package_id')->nullable();
            $table->string('uuid', 100);
            $table->smallInteger('iscancelled')->default(0)->comment('specify whether the invoice is cancelled');
            $table->text('cancel_reason')->nullable()->comment('Reason for cancelling the invoice if cancelled.');
            $table->smallInteger('ispaid')->default(0)->comment('Flag for analytical purposes, detect whether the invoice has been paid or not. Payment status will depend whether invoice_id appears in payment table.');
            $table->dateTime('mature_date')->comment('date which the invoice payment will mature or validity end.');
            $table->smallInteger('isvalid')->default(1)->comment('For analytical purposes, shows whether invoice is valid or not i.e. 1. Yes 0. No (Invalid if matured, expired, cancelled)');
            $table->timestamps();
            $table->smallInteger('isupgrade')->default(0)->comment('show whether this is for upgrade payment i.e. 1. Yes 0. No');
            $table->softDeletes();
            $table->bigInteger('parent_id')->nullable()->comment('In case of someone upgrading, store the link to the parent unexpired invoice.');
            //$table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('RESTRICT');
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
            //$table->foreign('package_id')->references('id')->on('package')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }

}
