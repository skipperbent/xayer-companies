<?php

namespace Xayer\Controller;

use Pecee\Controller;
use Xayer\Widget\WidgetHome;

class ControllerDefault extends  Controller {

    public function indexView() {
        echo new WidgetHome();
    }

}