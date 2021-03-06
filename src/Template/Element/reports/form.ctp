<?= $this->Form->create($report, [
    'templates' => [
        'select' => '<select class="form-control dates" name="{{name}}">{{content}}</select>'
    ]]) ?>
    <fieldset>
        <h1>
            <?= $titleForLayout ?>
        </h1>
        <div class="row">
            <div class="col-xl-2">
                <label class="form-control-label" for="supervisor-id">
                    Supervisor
                </label>
                <?= $this->Form->control('supervisor_id', [
                    'label' => false
                ]) ?>
            </div>
            <div class="col-xl-3">
                <label for="student-id">For student or employee</label>
                <?php if ($activeUser['is_admin'] == 1): ?>
                    <?= $this->Form->text('student_id', [
                        'class' => 'form-control dates',
                        'id' => 'student-id',
                        'style' => 'display:block;',
                        'value' => $activeUser['name']
                    ]) ?>
                <?php else: ?>
                    <?= $this->Form->text('student_id', [
                        'class' => 'form-control dates',
                        'disabled' => true,
                        'id' => 'student-id',
                        'style' => 'display:block;',
                        'value' => $activeUser['name'] ? $activeUser['name'] : "Employee #" . $activeUser['id']
                    ]) ?>
                <?php endif ?>
            </div>
            <div class="col-xl-3">
                <label class="form-control-label" for="project-name">
                    Project name
                </label>
                <?= $this->Form->control('project_name', [
                    'label' => false
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <label class="form-control-label" for="start-date">
                    Start date
                </label>
                <div>
                    <?= $this->Form->control('start_date', [
                        'hour' => false,
                        'label' => false,
                        'maxYear' => date('Y', strtotime('+2 years')),
                        'meridian' => false,
                        'minute' => false,
                        'minYear' => '2000',
                        'value' => !empty($report->start_date) ? $report->start_date->format('Y-m-d') : date('Y-m-d')
                    ]);?>
                </div>
            </div>
            <div class="col-lg-5">
                <label class="form-control-label" for="end-date">
                    End date
                </label>
                <div>
                    <?= $this->Form->control('end_date', [
                        'default' => null,
                        'empty' => 'n/a',
                        'hour' => false,
                        'label' => false,
                        'maxYear' => date('Y', strtotime('+2 years')),
                        'meridian' => false,
                        'minute' => false,
                        'minYear' => '2000',
                        'value' => !empty($report->end_date) ? $report->end_date->format('Y-m-d') : null
                    ]);?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <label class="form-control-label" for="work-performed">
                    What activities did you perform for this project?
                </label>
                <?= $this->CKEditor->loadJs() ?>
                <?= $this->Form->textarea('work_performed', ['class' => 'form-control']) ?>
                <?= $this->CKEditor->replace('work_performed') ?>
            </div>
            <div class="col-lg-5">
                <label class="form-control-label" for="learned">
                    What did you learn from this task?
                </label>
                <?= $this->Form->textarea('learned', ['class' => 'form-control']) ?>
                <?= $this->CKEditor->replace('learned') ?>
            </div>
            <div class="col-lg-2">
                <label class="form-control-label" for="routine">
                    Was this a routine activity?
                </label>
                <?= $this->Form->radio('routine',
                    [
                        ['value' => 1, 'text' => 'Yes'],
                        ['value' => 0, 'text' => 'No'],
                        ['value' => 2, 'text' => 'Not sure'],
                    ]
                ) ?>
            </div>
        </div>
    </fieldset>
    <div class="col-lg-6 center-button">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary btn-md']) ?>
        <?= $this->Form->end() ?>
    </div>
<?php if ($this->request->params['action'] == 'edit'): ?>
    <p class="float-right">
        <small>
            <?= $this->Html->link('Delete report?', ['controller' => 'Reports', 'action' => 'delete', $report->id], ['class' => 'text-danger']) ?>
        </small>
    </p>
<?php endif ?>