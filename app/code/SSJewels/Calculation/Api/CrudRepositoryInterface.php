<?php


namespace SSJewels\Calculation\Api;

use SSJewels\Calculation\Api\Data\CrudRepositoryDataInterface;

interface CrudRepositoryInterface
{

    /**
     * @param int $id
     * @return CrudRepositoryDataInterface
     */
    public function getById($id);

}
