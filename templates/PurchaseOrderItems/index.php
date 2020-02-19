<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseOrderItem[]|\Cake\Collection\CollectionInterface $purchaseOrderItems
 */
?>
<div class="purchaseOrderItems index content">
    <?= $this->Html->link(__('New Purchase Order Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchase Order Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('purchaseOrderId') ?></th>
                    <th><?= $this->Paginator->sort('productId') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('costPerItem') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseOrderItems as $purchaseOrderItem): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseOrderItem->id) ?></td>
                    <td><?= $this->Number->format($purchaseOrderItem->purchaseOrderId) ?></td>
                    <td><?= $this->Number->format($purchaseOrderItem->productId) ?></td>
                    <td><?= $this->Number->format($purchaseOrderItem->quantity) ?></td>
                    <td><?= $this->Number->format($purchaseOrderItem->costPerItem) ?></td>
                    <td><?= h($purchaseOrderItem->created) ?></td>
                    <td><?= h($purchaseOrderItem->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseOrderItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseOrderItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseOrderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
