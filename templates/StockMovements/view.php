<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StockMovement $stockMovement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stock Movement'), ['action' => 'edit', $stockMovement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stock Movement'), ['action' => 'delete', $stockMovement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockMovement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stock Movements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stock Movement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stockMovements view content">
            <h3><?= h($stockMovement->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Details') ?></th>
                    <td><?= h($stockMovement->details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stockMovement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProductId') ?></th>
                    <td><?= $this->Number->format($stockMovement->productId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($stockMovement->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($stockMovement->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($stockMovement->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
