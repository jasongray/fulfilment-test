<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
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
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('quantityOnHand')
            ->requirePresence('quantityOnHand', 'create')
            ->notEmptyString('quantityOnHand');

        $validator
            ->integer('reorderThreshold')
            ->requirePresence('reorderThreshold', 'create')
            ->notEmptyString('reorderThreshold');

        $validator
            ->integer('reorderAmount')
            ->requirePresence('reorderAmount', 'create')
            ->notEmptyString('reorderAmount');

        $validator
            ->integer('deliveryLeadTime')
            ->requirePresence('deliveryLeadTime', 'create')
            ->notEmptyString('deliveryLeadTime');

        return $validator;
    }

    public function saveNewData($_data)
    {
        $products = TableRegistry::getTableLocator()->get('Products');
        foreach ($_data as $r) {
            $product = $products->newEmptyEntity();
            $product->id = $r->productId;
            $product->description = $r->description;
            $product->quantityOnHand = $r->quantityOnHand;
            $product->reorderThreshold = $r->reorderThreshold;
            $product->reorderAmount = $r->reorderAmount;
            $product->deliveryLeadTime = $r->deliveryLeadTime;
            $products->save($product);
        }
    }

    public function updateStockMovement($id, $newOnHand, $orderId, $orderQty) 
    {
        $products = TableRegistry::getTableLocator()->get('Products');
        $product = $products->get($id);
        $product->quantityOnHand = $newOnHand;
        $products->save($product);

    }

    public function afterSave($event, $entity, $options)
    {
        
    }
}
