<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $invoice_id
 * @property string|null $invoice_adress
 * @property \Cake\I18n\Date|null $invoice_at
 * @property \Cake\I18n\Date|null $invoice_deadline_at
 * @property int|null $invoice_amount
 * @property string|null $invoice_status_kbn
 * @property \Cake\I18n\Date|null $invoice_creation_at
 * @property \Cake\I18n\Date|null $invoice_updated_at
 * @property \Cake\I18n\Date|null $invoice_payment_at
 * @property int|null $case_id
 * @property int|null $stakeholder_id
 * @property int|null $advisor_contracts_id
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\Case $case
 * @property \App\Model\Entity\Stakeholder $stakeholder
 * @property \App\Model\Entity\AdvisorContract $advisor_contract
 * @property \App\Model\Entity\User $user
 */
class Invoice extends Entity
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
        'invoice_adress' => true,
        'invoice_at' => true,
        'invoice_deadline_at' => true,
        'invoice_amount' => true,
        'invoice_status_kbn' => true,
        'invoice_creation_at' => true,
        'invoice_updated_at' => true,
        'invoice_payment_at' => true,
        'case_id' => true,
        'stakeholder_id' => true,
        'advisor_contracts_id' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'case' => true,
        'stakeholder' => true,
        'advisor_contract' => true,
        'user' => true,
    ];
}
