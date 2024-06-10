<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdvisorContractsFixture
 */
class AdvisorContractsFixture extends TestFixture
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
                'advisor_contracts_id' => 1,
                'customer_id' => 1,
                'advisor_start_at' => '2024-06-07',
                'advisor_end_at' => '2024-06-07',
                'advisor_fee' => 1,
                'advisor_content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'consultation_id' => 1,
                'initial_contract_at' => '2024-06-07',
                'initial_consultation_at' => '2024-06-07',
                'payment_at' => '2024-06-07',
                'payment_method_kbn' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'lawyer_id' => 'Lorem ipsum dolor sit amet',
                'paralegal_id' => 'Lorem ipsum dolor sit amet',
                'creator_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-06-07',
                'updater_id' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1717740653,
            ],
        ];
        parent::init();
    }
}
