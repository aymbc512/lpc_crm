<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceStatement Entity
 *
 * @property int $invoice_statement_id
 * @property string|null $invoice_statement_item
 * @property int|null $invoice_statement_amount
 * @property int|null $invoice_statement_tax
 * @property int|null $invoice_id
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\User $user
 */
class InvoiceStatement extends Entity
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
        'invoice_statement_item' => true,
        'invoice_statement_amount' => true,
        'invoice_statement_tax' => true,
        'invoice_id' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'invoice' => true,
        'user' => true,
    ];
}
