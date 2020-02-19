<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseOrderItems Model
 *
 * @method \App\Model\Entity\PurchaseOrderItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PurchaseOrderItemsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('purchase_order_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('purchaseOrderId')
            ->requirePresence('purchaseOrderId', 'create')
            ->notEmptyString('purchaseOrderId');

        $validator
            ->integer('productId')
            ->requirePresence('productId', 'create')
            ->notEmptyString('productId');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->decimal('costPerItem')
            ->requirePresence('costPerItem', 'create')
            ->notEmptyString('costPerItem');

        return $validator;
    }
}
