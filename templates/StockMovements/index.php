<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StockMovement[]|\Cake\Collection\CollectionInterface $stockMovements
 */
?>
<div class="stockMovements index content">
    <?= $this->Html->link(__('New Stock Movement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stock Movements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('productId') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('details') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stockMovements as $stockMovement): ?>
                <tr>
                    <td><?= $this->Number->format($stockMovement->id) ?></td>
                    <td><?= $this->Number->format($stockMovement->productId) ?></td>
                    <td><?= $this->Number->format($stockMovement->quantity) ?></td>
                    <td><?= h($stockMovement->details) ?></td>
                    <td><?= h($stockMovement->created) ?></td>
                    <td><?= h($stockMovement->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stockMovement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stockMovement->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stockMovement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockMovement->id)]) ?>
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
