<?php
namespace App\Model\Entity;

use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\ORM\Entity;

/**
 * Tournament Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $start
 * @property \Cake\I18n\FrozenDate|null $end
 * @property \Cake\I18n\FrozenDate|null $deadline
 * @property string|null $announcement_path
 * @property string|null $info_url
 * @property string|null $results_url
 * @property int|null $host
 * @property int|null $discipline
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Tournament extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setStart($start) {
        return implode('-', array_reverse(explode('.', $start)));
    }

    protected function _setEnd($end) {
        return implode('-', array_reverse(explode('.', $end)));
    }

    protected function _setDeadline($deadline) {
        return implode('-', array_reverse(explode('.', $deadline)));
    }
}
