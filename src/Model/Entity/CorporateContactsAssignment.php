<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CorporateContactsAssignment Entity
 *
 * @property int $corporate_contact_assignment_id
 * @property string|null $assignment_kbn
 * @property int|null $corporate_contact_id
 * @property int|null $case_id
 * @property int|null $consultation_id
 * @property int|null $advisor_consultation_id
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\CorporateContact $corporate_contact
 * @property \App\Model\Entity\Case $case
 * @property \App\Model\Entity\Consultation $consultation
 * @property \App\Model\Entity\AdvisorConsultation $advisor_consultation
 * @property \App\Model\Entity\User $user
 */
class CorporateContactsAssignment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'assignment_kbn' => true,
        'corporate_contact_id' => true,
        'case_id' => true,
        'consultation_id' => true,
        'advisor_consultation_id' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'corporate_contact' => true,
        'case' => true,
        'consultation' => true,
        'advisor_consultation' => true,
        'user' => true,
    ];
}
