<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Reports Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Supervisors
 * @property \Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Report
 */
class ReportsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('reports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'supervisor_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);

        $this->Projects = TableRegistry::get('Projects');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->allowEmpty('work_performed');

        $validator
            ->integer('routine')
            ->allowEmpty('routine');

        $validator
            ->allowEmpty('learned');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }

    /**
     * returns all a student's current work reports
     *
     * @param int|null $id Student ID
     * @return array
     */
    public function getStudentCurrentReports($id = null)
    {
        $reports = $this->find()
            ->where(['end_date >=' => date('Y-m-d')])
            ->orWhere(['end_date IS' => null])
            ->andWhere(['student_id' => $id])
            ->toArray();

        return $reports;
    }

    /**
     * returns all a student's current work reports
     * by name
     *
     * @param int|null $id Student ID
     * @param string|null $project Project ID
     * @return array
     */
    public function getStudentCurrentReportsByProject($id = null, $project = null)
    {
        $reports = $this->find()
            ->where(['end_date >=' => date('Y-m-d')])
            ->orWhere(['end_date IS' => null])
            ->andWhere(['student_id' => $id])
            ->andWhere(['project_id' => $project])
            ->toArray();

        return $reports;
    }
}
