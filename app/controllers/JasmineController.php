<?php

class JasmineController extends BaseController
{

    public function getDefaultPage()
    {
        return View::make('pages.jasmine', array());
    }
}
