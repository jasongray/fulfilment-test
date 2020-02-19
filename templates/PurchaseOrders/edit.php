<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseOrder $purchaseOrder
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchaseOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseOrder->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Purchase Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="purchaseOrders form content">
            <?= $this->Form->create($purchaseOrder) ?>
            <fieldset>
                <legend><?= __('Edit Purchase Order') ?></legend>
                <?php
                    echo $this->Form->control('status');
                    echo $this->Form->control('vendorId');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
