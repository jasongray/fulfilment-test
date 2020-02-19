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
            <?= $this->Html->link(__('List Purchase Order Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseOrderItems form content">
            <?= $this->Form->create($purchaseOrderItem) ?>
            <fieldset>
                <legend><?= __('Add Purchase Order Item') ?></legend>
                <?php
                    echo $this->Form->control('purchaseOrderId');
                    echo $this->Form->control('productId');
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('costPerItem');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
