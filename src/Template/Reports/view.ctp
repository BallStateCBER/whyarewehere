<fieldset>
    <h1>
        <?= $titleForLayout; ?>
    </h1>
    <div class="row">
        <div class="col-lg-4">
            <h6>
                Supervisor
            </h6>
            <?= $report->supervisor_id ?>
        </div>
        <div class="col-lg-2">
            <h6>For student or employee</h6>
            <?= $report->student_id ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <h6>
                Project type
            </h6>
            <?= $report->project_type ?>
        </div>
        <div class="col-lg-3">
            <h6>
                Project name
            </h6>
            <?= $report->project_name ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h6>
                Start date
            </h6>
            <div>
                <?= date('F j, Y', strtotime($report->start_date)) ?>
            </div>
        </div>
        <div class="col-lg-6">
            <h6>
                End date
            </h6>
            <div>
                <?= date('F j, Y', strtotime($report->end_date)) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h6>
                What activities did you perform for this project?
            </h6>
            <?= $report->work_performed ?>
        </div>
        <div class="col-lg-3">
            <h6>
                Was this a routine activity?
            </h6>
            <?= $report->routine ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h6>
                What did you learn from this task?
            </h6>
            <?= $report->learned ?>
        </div>
    </div>
</fieldset>