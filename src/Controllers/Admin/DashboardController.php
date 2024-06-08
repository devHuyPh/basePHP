<?php

namespace Admin\Base\Controllers\Admin;
use Admin\Base\Commons\Controller;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->renderViewAdmin(__FUNCTION__);
    }
}
