<?php


namespace SSJewels\Calculation\Api;


interface CrudRepositoryInterface
{

    /**
     * @param int $id
     * @return string
     */
    public function getById($id);

}
