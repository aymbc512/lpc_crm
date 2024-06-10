<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stakeholder Entity
 *
 * @property int $stakeholder_id
 * @property string|null $name
 * @property int|null $post_cd
 * @property string|null $prefectures
 * @property string|null $city
 * @property string|null $kuchouson
 * @property string|null $adress_below
 * @property int|null $phone_number
 * @property string|null $email
 * @property string|null $stakeholder_kbn
 * @property bool|null $client
 * @property bool|null $opponent
 * @property string|null $lawyer_id
 * @property string|null $stakeholder_remarks
 * @property string|null $creator_id
 * @property \Cake\I18n\Date|null $created_at
 * @property string|null $updater_id
 * @property \Cake\I18n\DateTime $updated_at
 *
 * @property \App\Model\Entity\User $user
 */
class Stakeholder extends Entity
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
        'name' => true,
        'post_cd' => true,
        'prefectures' => true,
        'city' => true,
        'kuchouson' => true,
        'adress_below' => true,
        'phone_number' => true,
        'email' => true,
        'stakeholder_kbn' => true,
        'client' => true,
        'opponent' => true,
        'lawyer_id' => true,
        'stakeholder_remarks' => true,
        'creator_id' => true,
        'created_at' => true,
        'updater_id' => true,
        'updated_at' => true,
        'user' => true,
    ];
}
