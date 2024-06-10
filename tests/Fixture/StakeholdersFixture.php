<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StakeholdersFixture
 */
class StakeholdersFixture extends TestFixture
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
                'stakeholder_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'post_cd' => 1,
                'prefectures' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'kuchouson' => 'Lorem ipsum dolor sit amet',
                'adress_below' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'stakeholder_kbn' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'client' => 1,
                'opponent' => 1,
                'lawyer_id' => 'Lorem ipsum dolor sit amet',
                'stakeholder_remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'creator_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-06-07',
                'updater_id' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1717740545,
            ],
        ];
        parent::init();
    }
}
