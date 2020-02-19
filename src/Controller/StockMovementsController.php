<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StockMovements Controller
 *
 * @property \App\Model\Table\StockMovementsTable $StockMovements
 *
 * @method \App\Model\Entity\StockMovement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockMovementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $stockMovements = $this->paginate($this->StockMovements);

        $this->set(compact('stockMovements'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock Movement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockMovement = $this->StockMovements->get($id, [
            'contain' => [],
        ]);

        $this->set('stockMovement', $stockMovement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockMovement = $this->StockMovements->newEmptyEntity();
        if ($this->request->is('post')) {
            $stockMovement = $this->StockMovements->patchEntity($stockMovement, $this->request->getData());
            if ($this->StockMovements->save($stockMovement)) {
                $this->Flash->success(__('The stock movement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock movement could not be saved. Please, try again.'));
        }
        $this->set(compact('stockMovement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock Movement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockMovement = $this->StockMovements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockMovement = $this->StockMovements->patchEntity($stockMovement, $this->request->getData());
            if ($this->StockMovements->save($stockMovement)) {
                $this->Flash->success(__('The stock movement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock movement could not be saved. Please, try again.'));
        }
        $this->set(compact('stockMovement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock Movement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockMovement = $this->StockMovements->get($id);
        if ($this->StockMovements->delete($stockMovement)) {
            $this->Flash->success(__('The stock movement has been deleted.'));
        } else {
            $this->Flash->error(__('The stock movement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
