<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 9:04 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;
use Doctrine\ORM\EntityRepository;


class CrudRepository extends EntityRepository {

    /**
     * Create a new element.
     * @param mixed $entity Stores entity into database.
     * @return int ID of the entity that was inserted.
     */
    public function create($entity) {
        $this->_em->persist($entity);
        $this->_em->flush();

        return $entity;
    }

    /**
     * Update an existing element.
     * @param mixed $entity The entity that needs to be updated.
     * @param array $params Params with which to update the element.
     * @return bool Whether the operation was successful or not.
     */
    public function update($entity, $params) {
        $entity->makeFromArray($params, $entity);
        $this->_em->flush();

        return true;
    }

    /**
     * Delete an element.
     * @param mixed $entity The entity that needs to be deleted.
     * @return bool Whether the operation was successful or not.
     */
    public function delete($entity) {
        $this->_em->remove($entity);
        $this->_em->flush();

        return true;
    }

}