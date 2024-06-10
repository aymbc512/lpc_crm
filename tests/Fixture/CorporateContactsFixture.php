<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CorporateContactsFixture
 */
class CorporateContactsFixture extends TestFixture
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
                'corporate_contact_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 1,
                'corporate_contact_position_kbn' => 'Lorem ipsum dolor sit amet',
                'corporate_contact_remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'stakeholder_id' => 1,
                'case_id' => 1,
                'creator_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-06-07',
                'updater_id' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1717740583,
            ],
        ];
        parent::init();
    }
}
