<div class="row">
    <div class="col-lg-9">
        <h1><?= __('Reports') ?></h1>
        <table cellpadding="15" cellspacing="0" class="whole-table">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('project_name') ?></th>
                    <th scope="col" class="non-mobile"><?= $this->Paginator->sort('student_id') ?></th>
                    <th scope="col" class="non-mobile"><?= $this->Paginator->sort('supervisor_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                    <th scope="col" class="non-mobile"><?= $this->Paginator->sort('end_date') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report): ?>
                <tr class="table-index">
                    <td><?= h($report->project['name']) ?></td>
                    <td class="non-mobile"><?= h($report->student_id) ?></td>
                    <td class="non-mobile"><?= h($report->supervisor_id) ?></td>
                    <td><?= h(date('F j, Y', strtotime($report->start_date))) ?></td>
                    <td class="non-mobile <?= strtotime($report->end_date) > strtotime(date('Y-m-d')) || strtotime($report->end_date) == null ? 'alert alert-danger' : 'alert alert-success' ?>"><?= !$report->end_date ? 'No end date' : h(date('F j, Y', strtotime($report->end_date))) ?></u></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $report->id]) ?>
                        <?php if ($activeUser['is_admin'] || $report['student_id'] == $activeUser['name'] || $report['supervisor_id'] == $activeUser['name']): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $report->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
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
    </div>
    <div class="col-lg-3">
        <h1>Actions</h1>
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h2 class="mb-0">
                        <?= $this->Html->link(__('New Report'), ['action' => 'add']) ?>
                    </h2>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h2 class="mb-0">
                        <?= $this->Html->link(__('All Reports'), ['action' => 'index']) ?>
                    </h2>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h2 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Reports by project status
                        </a>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block">
                        <?= $this->Html->link(__("Current Projects"), ['action' => 'current']) ?><br />
                        <?= $this->Html->link(__("Past Projects"), ['action' => 'past']) ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h2 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Reports by project name
                        </a>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block">
                        <?php foreach ($projects as $key => $project): ?>
                            <?= $this->Html->link(__($project), ['action' => 'project', $key]) ?><br />
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingThree">
                    <h2 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Reports by student
                        </a>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="card-block">
                        <?php foreach ($students as $key => $name): ?>
                            <?= $this->Html->link(__($name), ['action' => 'student', $key]) ?><br />
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingFour">
                    <h2 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Reports by supervisor
                        </a>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="card-block">
                        <?php foreach ($supervisors as $key => $name): ?>
                            <?= $this->Html->link(__($name), ['action' => 'supervisor', $key]) ?><br />
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
