<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publicaco Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $imagem
 * @property \Cake\I18n\FrozenDate $dtPublicacao
 * @property int $usuarioId
 * @property int $objetoId
 */
class Publicaco extends Entity
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
        'titulo' => true,
        'imagem' => true,
        'dtPublicacao' => true,
        'descricao' => true,
        'usuarioId' => true,
        'objetoId' => true
    ];
}
