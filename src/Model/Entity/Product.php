<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $description
 * @property int $quantityOnHand
 * @property int $reorderThreshold
 * @property int $reorderAmount
 * @property int $deliveryLeadTime
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'description' => true,
        'quantityOnHand' => true,
        'reorderThreshold' => true,
        'reorderAmount' => true,
        'deliveryLeadTime' => true,
        'created' => true,
        'modified' => true,
    ];
}
