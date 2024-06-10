<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdvisorConsultationsFixture
 */
class AdvisorConsultationsFixture extends TestFixture
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
                'advisor_consultations_id' => 1,
                'consultation_name' => 'Lorem ipsum dolor sit amet',
                'consultation_at' => '2024-06-07',
                'consultation_content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'customer_id' => 1,
                'lawyer_id' => 'Lorem ipsum dolor sit amet',
                'advisor_contract_id' => 1,
                'paralegal_id' => 'Lorem ipsum dolor sit amet',
                'creator_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-06-07',
                'updater_id' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1717740960,
            ],
        ];
        parent::init();
    }
}
