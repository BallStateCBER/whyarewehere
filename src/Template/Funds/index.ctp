<div class="row">
    <div class="col-lg-12">
        <h3><?= __('Funds') ?></h3>
        <?= $this->Html->link(__('New Funding Source'), ['action' => 'add']) ?>
        <div class="row">
            <?php $x = 1; ?>
            <?php foreach ($funds as $fund): ?>
                <?php if ($x == 1): ?>
                    <div class="col-lg-6">
                        <table cellpadding="10" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('name', 'Fund Number') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('organization') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                <?php elseif ($x == $halfCount + 1): ?>
                    <div class="col-lg-6">
                        <table cellpadding="10" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                <?php endif ?>
                <?php if ($x == $halfCount + 1 || $x == 1): ?>
                    </thead>
                    <tbody>
                <?php endif ?>
                            <tr class="table-index">
                                <td><?= h($fund->name) ?></td>
                                <td><?= h($fund->organization) ?></td>
                                <td><?= h($fund->amount) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fund->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fund->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fund->id)]) ?>
                                </td>
                            </tr>
                        <?php if ($x == $halfCount || $x == $count): ?>
                        </tbody>
                    </table>
                </div>
                        <?php endif ?>
            <?php $x = $x + 1 ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->hasPrev() ? $this->Paginator->prev('< ' . __('previous')) : '' ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->hasNext() ? $this->Paginator->next(__('next') . ' >') : '' ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
