<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CorporateContactsAssignmentFixture
 */
class CorporateContactsAssignmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'corporate_contacts_assignment';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'corporate_contact_assignment_id' => 1,
                'assignment_kbn' => 'Lorem ipsum dolor sit amet',
                'corporate_contact_id' => 1,
                'case_id' => 1,
                'consultation_id' => 1,
                'advisor_consultation_id' => 1,
                'creator_id' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-06-11',
                'updater_id' => 'Lorem ipsum dolor sit amet',
                'updated_at' => 1718086572,
            ],
        ];
        parent::init();
    }
}
