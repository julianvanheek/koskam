<?php
/**
 * Dasboard - Implements a simple Administration Dashboard.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\System\Controllers\Admin;

use App\Modules\System\Controllers\BaseController;

use View;


class Dashboard extends BaseController
{

    public function index()
    {
        return $this->getView()
            ->shares('title', __d('system', 'Dashboard'));
    }

}
