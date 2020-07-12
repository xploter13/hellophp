<?php

class controller extends system {
    protected function view($name, $vars = NULL) {
        if (is_array($vars) && count($vars) > 0) {
            extract($vars,EXTR_PREFIX_ALL,'view');
        }
        require_once(VIEWS.$name.'.php');
    }
}

