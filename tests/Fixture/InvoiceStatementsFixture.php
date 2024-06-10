<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoiceStatementsFixture
 */
class InvoiceStatementsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'invoice_statement_id' => 1,
                'invoice_statement_item' => 'Lorem ipsum dolor sit amet',
                'invoice_statement_amount' => 1,
                'invoice_statement_tax' => 1,
                'invoice_id' => 1,
                'creator_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-06-04',
                'updater_id' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1717492447,
            ],
        ];
        parent::init();
    }
}
