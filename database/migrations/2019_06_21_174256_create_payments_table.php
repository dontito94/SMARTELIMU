<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Database\TableComment;

class CreatePaymentsTable extends Migration {
    use TableComment;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function(Blueprint $table)
        {
            $table->bigInteger('id', true);
            $table->string('msisdn', 30)->nullable()->comment('phone number of the payer ');
            $table->string('reference', 100)->comment('transaction code generated from nflip system i.e. Receipt number ');
            $table->decimal('amount', 16);
            $table->bigInteger('invoice_id')->index();
            $table->string('uuid', 100);
            $table->smallInteger('currency_id');
            $table->text('result')->nullable()->comment('Show the result of the payment, whether is success, message, response message returned from the third parties etc ...');
            $table->text('pay_notes')->nullable()->comment('Specify whether there are any associated notes with the payment ');
            $table->smallInteger('isreversed')->default(0)->comment('Specify whether the payment has been reversed or not, 1 => Reversed, 0 => Not Reversed ');
            $table->smallInteger('islocked')->default(0)->comment('Specify whether the payment has been locked or not, 1 => Locked/Not active, 0 => Not Locked ');
            $table->text('lock_reason')->nullable();
            $table->string('operator', 50)->nullable()->comment('Source MNO, Bank, Credit Cards; type STRING; length 4-12 e.g. Tigo, Mpesa, Airtel ');
            $table->string('transid', 100)->nullable()->comment('MNO unique transaction ID or reference number; type STRING; length 1-20');
            $table->string('utility_ref', 100)->nullable()->comment('3rd Party system’s reference that customer pays against; type STRING; length varies ');
            $table->string('external_reference', 100)->nullable()->comment('Unique transaction reference number generated by the Payment gateway: type STRING; length 10-12 ');
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('CASCADE')->onDelete('RESTRICT');
            //$table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
        $this->comment("payments", "record all portal user payments");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }

}