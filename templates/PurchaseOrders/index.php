<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseOrder[]|\Cake\Collection\CollectionInterface $purchaseOrders
 */
?>
<div class="purchaseOrders index content">
    <?= $this->Html->link(__('New Purchase Order'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Purchase Orders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('vendorId') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseOrders as $purchaseOrder): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseOrder->id) ?></td>
                    <td><?= h($purchaseOrder->status) ?></td>
                    <td><?= $this->Number->format($purchaseOrder->vendorId) ?></td>
                    <td><?= h($purchaseOrder->created) ?></td>
                    <td><?= h($purchaseOrder->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseOrder->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseOrder->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrder->id)]) ?>
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
