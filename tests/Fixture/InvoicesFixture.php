<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 */
class InvoicesFixture extends TestFixture
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
                'invoice_id' => 1,
                'invoice_adress' => 'Lorem ipsum dolor sit amet',
                'invoice_at' => '2024-06-07',
                'invoice_deadline_at' => '2024-06-07',
                'invoice_amount' => 1,
                'invoice_status_kbn' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'invoice_creation_at' => '2024-06-07',
                'invoice_updated_at' => '2024-06-07',
                'invoice_payment_at' => '2024-06-07',
                'case_id' => 1,
                'stakeholder_id' => 1,
                'advisor_contracts_id' => 1,
                'creator_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-06-07',
                'updater_id' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1717740566,
            ],
        ];
        parent::init();
    }
}
