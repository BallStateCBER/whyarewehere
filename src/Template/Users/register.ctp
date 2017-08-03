<?php
$this->Form->setTemplates([
    'select' => '<select class="form-control dates">{{content}}</select>'
]);
 ?>
<?= $this->Form->create($user) ?>
<h1 class="page_title">
    <?= $titleForLayout; ?>
</h1>
<fieldset>
    <div class="col-lg-4">
        <label>
            Ball State ID number
        </label>
        <?= $this->Form->input('id', [
            'class' => 'form-control',
            'label' => false,
            'type' => 'number'
        ]); ?>
        <i class="text-muted">
            Pssst, don't know where to get your BSU ID number? Go to Ball State's
            <?= $this->Html->link('Self-Service Banner', "https://prodssb.bsu.edu"); ?>
            and log in!
        </i>
    </div>
    <div class="col-lg-4">
        <?= $this->Form->control('name', ['class' => 'form-control']); ?>
    </div>
    <div class="col-lg-4">
        <?= $this->Form->control('password', ['class' => 'form-control']); ?>
    </div>
</fieldset>
<div class="col-lg-6">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary btn-md']); ?>
</div>
<?= $this->Form->end() ?>
