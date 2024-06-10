<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Case Entity
 *
 * @property int $case_id
 * @property string|null $case_name
 * @property string|null $case_kbn
 * @property int|null $customer_id
 * @property int|null $opponent_id
 * @property string|null $case_content
 * @property string|null $memo
 * @property \Cake\I18n\Date|null $start_at
 * @property \Cake\I18n\Date|null $expected_end_at
 * @property \Cake\I18n\Date|null $end_at
 * @property string|null $resolution_result
 * @property int|null $consultations_id
 * @property string|null $case_goal
 * @property int|null $case_amount
 * @property \Cake\I18n\Date|null $goal_achievement_deadline_at
 * @property int|null $advisor_consultation_id
 * @property string|null $case_status_kbn
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\Stakeholder $stakeholder
 * @property \App\Model\Entity\Consultation $consultation
 * @property \App\Model\Entity\AdvisorConsultation $advisor_consultation
 */
class CaseModel extends Entity
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
        'case_name' => true,
        'case_kbn' => true,
        'customer_id' => true,
        'opponent_id' => true,
        'case_content' => true,
        'memo' => true,
        'start_at' => true,
        'expected_end_at' => true,
        'end_at' => true,
        'resolution_result' => true,
        'consultations_id' => true,
        'case_goal' => true,
        'case_amount' => true,
        'goal_achievement_deadline_at' => true,
        'advisor_consultation_id' => true,
        'case_status_kbn' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'stakeholder' => true,
        'consultation' => true,
        'advisor_consultation' => true,
    ];
}
