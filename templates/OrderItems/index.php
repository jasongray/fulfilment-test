<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItem[]|\Cake\Collection\CollectionInterface $orderItems
 */
?>
<div class="orderItems index content">
    <?= $this->Html->link(__('New Order Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Order Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('orderId') ?></th>
                    <th><?= $this->Paginator->sort('productId') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('costPerItem') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderItems as $orderItem): ?>
                <tr>
                    <td><?= $this->Number->format($orderItem->id) ?></td>
                    <td><?= $this->Number->format($orderItem->orderId) ?></td>
                    <td><?= $this->Number->format($orderItem->productId) ?></td>
                    <td><?= $this->Number->format($orderItem->quantity) ?></td>
                    <td><?= $this->Number->format($orderItem->costPerItem) ?></td>
                    <td><?= h($orderItem->created) ?></td>
                    <td><?= h($orderItem->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $orderItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id)]) ?>
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
