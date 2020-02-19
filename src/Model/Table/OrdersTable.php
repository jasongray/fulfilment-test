<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->hasMany('OrderItems', [
            'dependent' => true,
        ]);
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
            ->integer('customer_id')
            ->allowEmptyString('customer_id');

        $validator
            ->allowEmptyString('status');

        $validator
            ->allowEmptyString('morestuff');

        return $validator;
    }

    public function saveNewData($_data)
    {
        $orders = TableRegistry::getTableLocator()->get('Orders');
        foreach ($_data as $r) {
            $order = $orders->newEmptyEntity();
            $order->order_items = [];
            $order->id = $r->orderId;
            $order->status = $r->status;
            $order->morestuff = json_encode($r);
            foreach ($r->items as $i) {
                $item = $orders->OrderItems->newEmptyEntity();
                $item->order_id = $i->orderId;
                $item->product_id = $i->productId;
                $item->quantity = $i->quantity;
                $item->costPerItem = $i->costPerItem;
                $order->order_items[] = $item;
            }
            $order->setDirty('order_items', true);
            $orders->save($order);
        }
    }

    public function updateStatus($id, $status) 
    {
        $orders = TableRegistry::getTableLocator()->get('Orders');
        $order = $orders->get($id);
        $order->status = $status;
        $orders->save($order);

    }

}
