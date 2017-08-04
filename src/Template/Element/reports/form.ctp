<?= $this->Form->create($report, [
    'templates' => [
        'select' => '<select class="form-control dates" name="{{name}}">{{content}}</select>'
    ]]); ?>
<fieldset>
    <h1>
        <?= $titleForLayout; ?>
    </h1>
    <div class="row">
        <div class="col-lg-4">
            <label class="form-control-label">
                Supervisor
            </label>
            <?= $this->Form->control('supervisor_id', [
                'label' => false
            ]); ?>
        </div>
        <div class="col-lg-2">
            <label>For student or employee</label>
            <?= $this->Form->text('student_id', [
                'class' => 'form-control',
                'disabled' => true,
                'value' => $activeUser
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <label class="form-control-label">
                Project type
            </label>
            <?= $this->Form->control('project_type', [
                'label' => false
            ]); ?>
        </div>
        <div class="col-lg-3">
            <label class="form-control-label">
                Project name
            </label>
            <?= $this->Form->control('project_name', [
                'label' => false
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-control-label">
                Start date
            </label>
            <div>
                <?= $this->Form->control('start_date', [
                    'hour' => false,
                    'label' => false,
                    'maxYear' => date('Y'),
                    'meridian' => false,
                    'minute' => false,
                    'minYear' => '2000',
                    'value' => !empty($report->start_date) ? $report->start_date->format('Y-m-d') : date('Y-m-d')
                ]);?>
            </div>
        </div>
        <div class="col-lg-6">
            <label class="form-control-label">
                End date
            </label>
            <div>
                <?= $this->Form->control('end_date', [
                    'hour' => false,
                    'label' => false,
                    'maxYear' => date('Y'),
                    'meridian' => false,
                    'minute' => false,
                    'minYear' => '2000',
                    'value' => !empty($report->end_date) ? $report->end_date->format('Y-m-d') : date('Y-m-d')
                ]);?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-control-label">
                What activities did you perform for this project?
            </label>
            <?= $this->Form->textarea('work_performed', ['class' => 'form-control']); ?>
        </div>
        <div class="col-lg-3">
            <label class="form-control-label">
                Was this a routine activity?
            </label>
            <?= $this->Form->radio('routine',
            [
                ['value' => 1, 'text' => 'Yes'],
                ['value' => 0, 'text' => 'No'],
                ['value' => 2, 'text' => 'Not sure'],
            ]
            ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-control-label">
                What did you learn from this task?
            </label>
            <?= $this->Form->textarea('learned', ['class' => 'form-control']); ?>
        </div>
    </div>
</fieldset>
<div class="col-lg-6">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-secondary btn-md']); ?>
    <?= $this->Form->end() ?>
</div>
<?php if ($this->request->params['action'] == 'edit'): ?>
    <p class="float-right">
        <small>
            <?= $this->Html->link('Delete report?', ['controller' => 'Reports', 'action' => 'delete', $report->id], ['class' => 'text-danger']) ?>
        </small>
    </p>
<?php endif; ?>