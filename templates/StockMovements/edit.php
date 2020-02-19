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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stockMovement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stockMovement->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stock Movements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stockMovements form content">
            <?= $this->Form->create($stockMovement) ?>
            <fieldset>
                <legend><?= __('Edit Stock Movement') ?></legend>
                <?php
                    echo $this->Form->control('productId');
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('details');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
