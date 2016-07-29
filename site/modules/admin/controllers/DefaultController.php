<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $rightMenuItems = [
        'admin'             => ['label' => 'Admin', 'url' => ['default/index']],
        'users'              => ['label' => 'Users', 'url' => ['users/index']],
        'point_materials'    => ['label' => 'Point Materials', 'url' => ['point-materials/index']],
        'organizations'      => ['label' => 'Organizations', 'url' => ['organizations/index']],
        'points'             => ['label' => 'Points', 'url' => ['points/index']],
    ];

    public function init() {
        parent::init();
        $this->layout = 'main';
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
