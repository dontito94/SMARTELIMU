<?php

use Illuminate\Database\Seeder;
use Database\TruncateTable;
use Database\DisableForeignKeys;

class CodeValuesTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $this->disableForeignKeys("code_values");
        $condition = 'where isactive = 1';
        $this->deleteWithCondition('code_values', $condition);

        \DB::table('code_values')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'code_id' => 1,
                    'values' => 'Male',
                    'reference' => 'PACA',
                    'isactive' => 1,
                ),

            1 =>
                array (
                    'id' => 2,
                    'code_id' => 1,
                    'values' => 'Female',
                    'reference' => 'UASPR',
                    'isactive' => 1,
                ),
            2 =>
                array (
                    'id' => 3,
                    'code_id' => 2,
                    'values' => 'Teacher',
                    'reference' => 'TECH',
                    'isactive' => 1,
                ),
            3 =>
                array (
                    'id' => 4,
                    'code_id' => 2,
                    'values' => 'Self Candidate',
                    'reference' => 'SECA',
                    'isactive' => 1,
                ),
            4 =>
                array (
                    'id' => 5,
                    'code_id' => 3,
                    'values' => 'Primary School',
                    'reference' => 'PRSC',
                    'isactive' => 1,
                ),
            5 =>
                array (
                    'id' => 6,
                    'code_id' => 3,
                    'values' => 'Secondary Schools',
                    'reference' => 'SECO',
                    'isactive' => 1,
                ),
            6 =>
                array (
                    'id' => 7,
                    'code_id' => 3,
                    'values' => 'Extra Primary Schools',
                    'reference' => 'EXPR',
                    'isactive' => 1,
                ),
            7 =>
                array (
                    'id' => 8,
                    'code_id' => 3,
                    'values' => 'Extra Secondary Schools',
                    'reference' => 'EXTS',
                    'isactive' => 1,
                ),

        ));
        $this->enableForeignKeys("code_values");

    }
}