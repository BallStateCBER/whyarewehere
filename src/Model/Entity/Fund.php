<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fund Entity
 *
 * @property int $id
 * @property string $name
 * @property string $organization
 * @property string $amount
 * @property string $description
 *
 * @property \App\Model\Entity\Project[] $projects
 */
class Fund extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $accessible = [
        '*' => true,
        'id' => false
    ];
}
