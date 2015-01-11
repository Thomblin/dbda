<?php

class AjaxController extends BaseController
{
    public function getTableDetails($tableName)
    {
        $repository = new DatabaseRepository();

        return json_encode($repository->getTableDetails($tableName));
    }

}
