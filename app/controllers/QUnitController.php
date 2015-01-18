<?php

class QUnitController extends BaseController
{

    public function getDefaultPage()
    {
        return View::make('pages.qunit', array());
    }
}
