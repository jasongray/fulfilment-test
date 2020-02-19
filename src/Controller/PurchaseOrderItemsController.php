<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PurchaseOrderItems Controller
 *
 * @property \App\Model\Table\PurchaseOrderItemsTable $PurchaseOrderItems
 *
 * @method \App\Model\Entity\PurchaseOrderItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseOrderItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $purchaseOrderItems = $this->paginate($this->PurchaseOrderItems);

        $this->set(compact('purchaseOrderItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchase Order Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseOrderItem = $this->PurchaseOrderItems->get($id, [
            'contain' => [],
        ]);

        $this->set('purchaseOrderItem', $purchaseOrderItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseOrderItem = $this->PurchaseOrderItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchaseOrderItem = $this->PurchaseOrderItems->patchEntity($purchaseOrderItem, $this->request->getData());
            if ($this->PurchaseOrderItems->save($purchaseOrderItem)) {
                $this->Flash->success(__('The purchase order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order item could not be saved. Please, try again.'));
        }
        $this->set(compact('purchaseOrderItem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Order Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseOrderItem = $this->PurchaseOrderItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseOrderItem = $this->PurchaseOrderItems->patchEntity($purchaseOrderItem, $this->request->getData());
            if ($this->PurchaseOrderItems->save($purchaseOrderItem)) {
                $this->Flash->success(__('The purchase order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase order item could not be saved. Please, try again.'));
        }
        $this->set(compact('purchaseOrderItem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Order Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseOrderItem = $this->PurchaseOrderItems->get($id);
        if ($this->PurchaseOrderItems->delete($purchaseOrderItem)) {
            $this->Flash->success(__('The purchase order item has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase order item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
