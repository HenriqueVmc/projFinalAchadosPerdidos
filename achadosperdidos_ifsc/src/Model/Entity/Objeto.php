<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Objeto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $cor
 * @property string|null $descricao
 * @property int $situacao
 * @property \Cake\I18n\FrozenDate $dtSituacao
 * @property string $localSituacao
 * @property string|null $recompensa
 * @property float|null $valRecompensa
 */
class Objeto extends Entity
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
    protected $_accessible = [
        'nome' => true,
        'cor' => true,
        'descricao' => true,
        'situacao' => true,
        'dtSituacao' => true,
        'localSituacao' => true,
        'recompensa' => true,
        'valRecompensa' => true
    ];
}
