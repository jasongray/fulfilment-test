<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseOrderItem $purchaseOrderItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Purchase Order Item'), ['action' => 'edit', $purchaseOrderItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Purchase Order Item'), ['action' => 'delete', $purchaseOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Purchase Order Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Purchase Order Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseOrderItems view content">
            <h3><?= h($purchaseOrderItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseOrderItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('PurchaseOrderId') ?></th>
                    <td><?= $this->Number->format($purchaseOrderItem->purchaseOrderId) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProductId') ?></th>
                    <td><?= $this->Number->format($purchaseOrderItem->productId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($purchaseOrderItem->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('CostPerItem') ?></th>
                    <td><?= $this->Number->format($purchaseOrderItem->costPerItem) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($purchaseOrderItem->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($purchaseOrderItem->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
