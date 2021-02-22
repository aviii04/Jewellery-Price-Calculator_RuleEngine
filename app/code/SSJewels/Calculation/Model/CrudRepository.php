<?php


namespace SSJewels\Calculation\Model;


class CrudRepository implements \SSJewels\Calculation\Api\CrudRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getById($id)
    {
        return "Your Test Id: ".$id;
    }

}
