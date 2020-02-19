<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseOrderItem Entity
 *
 * @property int $id
 * @property int $purchaseOrderId
 * @property int $productId
 * @property int $quantity
 * @property string $costPerItem
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class PurchaseOrderItem extends Entity
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
        'purchaseOrderId' => true,
        'productId' => true,
        'quantity' => true,
        'costPerItem' => true,
        'created' => true,
        'modified' => true,
    ];
}
