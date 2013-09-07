<?php
/**
 * Created by JetBrains PhpStorm.
 * User: petre
 * Date: 9/7/13
 * Time: 9:04 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Api\RemoteBundle\Entity;


interface CrudInterface {

    /**
     * Create a new element.
     * @param array $params Params required to create a new element.
     * @return bool Whether the operation was successful or not.
     */
    public function create($params);

    /**
     * Update an existing element.
     * @param int $id The ID of the element that needs to be updated.
     * @param array $params Params with which to update the element.
     * @return bool Whether the operation was successful or not.
     */
    public function update($id, $params);

    /**
     * Delete an element.
     * @param int $id The ID of the element that should be deleted.
     * @return bool Whether the operation was successful or not.
     */
    public function delete($id);

}