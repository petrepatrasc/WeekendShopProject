<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 1:26 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;


interface Serializable {

    /**
     * Create a new entity from array elements or update an existing one.
     * @param array $params The parameters that define an entity.
     * @param mixed $entity The entity that should be updated.
     * @return mixed The entity that was obtained.
     */
    public static function makeFromArray($params, $entity);

    /**
     * Transform an entity into an array.
     * @return array The array representing the fields of the entity.
     */
    public function toArray();
}