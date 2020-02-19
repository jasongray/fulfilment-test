<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\NotFoundException;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Orders Controller
 *
 * Controls all relative functions to orders
 *
 */
class OrdersController extends AppController
{
	public function initialize(): void 
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}

	/**
	 * Order fulfilment 
	 *
	 * Check order items to ascertain if an order can be full fulfilled with stock on hand
	 * @return json Array of order ids that cannot be fulfilled
	 */
	public function fulfilment() 
	{
		$this->request->allowMethod(['post']);
		$response = [];
		/* read in the post data */
		$jsonData = $this->request->input('json_decode');
		if (empty($jsonData)) {
			throw new NotFoundException(__('No data found'));
		}

		/* get the data set */
		$results = $this->Orders->find('all')->where(['Orders.id IN' => $jsonData->orderIds, 'Orders.status' => 'Pending'])->contain(['OrderItems']);
		if ($results->isEmpty()) {
			throw new NotFoundException(__('No data found'));	
		}

		$this->loadModel('Products');
		$stockCheck = [];
		$reorder = [];
		$unfulfil = [];
		// lets process the orders found 
		foreach ($results as $_order) {
			// process each item in the order
			foreach ($_order->order_items as $item) {
				// get current stock level for this product
				if (!array_key_exists($item->product_id, $stockCheck)) {
					$_prd = $this->Products->get($item->product_id);
					$stockCheck[$item->product_id] = ['qoh' => $_prd->quantityOnHand, 'rot' => $_prd->reorderThreshold, 'org' => $_prd->quantityOnHand];
				}
				// check quantity required is available to fulfil this order item
				if ($stockCheck[$item->product_id]['qoh'] >= $item->quantity) {
					// update total on hand 
					$stockCheck[$item->product_id]['qoh'] = $stockCheck[$item->product_id]['qoh'] - $item->quantity;

					if ($stockCheck[$item->product_id]['qoh'] < $stockCheck[$item->product_id]['rot']) {
						if (!in_array($item->product_id, $reorder)) {
							$reorder[] = $item->product_id;
						}
					}
				} else {
					if (!in_array($item->product_id, $reorder)) {
						$reorder[] = $item->product_id;
					}
					if (!in_array($_order->id, $unfulfil)) {
						$unfulfil[] = $_order->id;
					}
				}
			}

			// reset the stock level of each item if order is not being processed
			if (in_array($_order->id, $unfulfil)) {
				foreach ($_order->order_items as $item) {
					if ($stockCheck[$item->product_id]['qoh'] != $stockCheck[$item->product_id]['org']) {
						$stockCheck[$item->product_id]['qoh'] = $stockCheck[$item->product_id]['org'];
					}
				}
			}

			// if order is not in the unfulfil array we can process this order 
			if (!in_array($_order->id, $unfulfil)) {
				// update the order status
				$this->Orders->updateStatus($_order->id, "FulFilled");

				// update the product quantity on hand
				foreach ($_order->order_items as $item) {
					if ($stockCheck[$item->product_id]['qoh'] != $stockCheck[$item->product_id]['org']) {
						$stockCheck[$item->product_id]['org'] = $stockCheck[$item->product_id]['qoh'];
					}
					$this->Products->updateStockMovement($item->product_id, $stockCheck[$item->product_id]['qoh'], $_order->id, $item->quantity);
				}
				
				// do we print out picking slips for the order we are fulfilling?
			}
			
		}
		
		/* do we need to reorder product?  
		foreach ($reorder as $_r) {
			// create po's for stock reordering
			$this->PurchaseOrders->createReorder($_r);
		}*/

		$response = ['unfulfilled' => $unfulfil];
		$this->set(compact('response'));
		$this->viewBuilder()->setOption('serialize', ['response'])->setOption('jsonOptions', JSON_FORCE_OBJECT);
	}

	/**
	 * Rebuild test data
	 *
	 * @return void
	 */
	public function reload()
	{
		$this->loadModel('Products');
		$this->loadModel('OrderItems');
		$dir = new Folder(WWW_ROOT);
		$files = $dir->find('.*\.json');
		foreach ($files as $file) {
			$file = new File($dir->pwd() . DS . $file);
			$contents = json_decode($file->read());
			foreach ($contents as $_table => $_data) {
				if ($_table === 'products') {
					$this->Products->deleteAll([]);
					$this->Products->saveNewData($_data);
				}
				if ($_table === 'orders') {
					$this->Orders->deleteAll([]);
					$this->OrderItems->deleteAll([]);
					$this->Orders->saveNewData($_data);
				}
			}
		}
	}
    
}
