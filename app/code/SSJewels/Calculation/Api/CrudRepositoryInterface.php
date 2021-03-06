<?php


namespace SSJewels\Calculation\Api;

interface CrudRepositoryInterface
{

    /**
     * @param int $id
     * @return SSJewels\Calculation\Api\Data\CrudRepositoryDataInterface
     */
    public function getById($id);

}
