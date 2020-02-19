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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchaseOrderItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrderItem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Purchase Order Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseOrderItems form content">
            <?= $this->Form->create($purchaseOrderItem) ?>
            <fieldset>
                <legend><?= __('Edit Purchase Order Item') ?></legend>
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
