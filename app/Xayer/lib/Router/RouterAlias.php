<?php

namespace Xayer\Router;

class RouterAlias extends \Pecee\Router\RouterAlias {
    // When the router lookup the page
    public function getPath($currentPath) {

        if(strtolower($currentPath) == 'companies') {

            return url('company', 'index', NULL, NULL, TRUE, FALSE);

        } elseif(strtolower($currentPath) == 'company-create') {

            return url('company', 'create', NULL, NULL, TRUE, FALSE);

        } elseif( preg_match('/company-delete-([0-9]?+)/i', $currentPath) ) {

            $id = preg_match('/company-delete-([0-9]?+)/i', $currentPath);
            return url('company', 'delete', array($id), NULL, TRUE, FALSE);

        } elseif( preg_match('/company-edit-([0-9]?+)/i', $currentPath) ) {

            $id = preg_match('/company-edit-([0-9]?+)/i', $currentPath);
            return url('company', 'edit', array($id), NULL, TRUE, FALSE);

        }
        return $currentPath;

    }

    // When url() function is called
    public function getUrl($currentUrl) {

        $path = explode('/', trim($currentUrl, '/'));

        if(strtolower($path[0]) == 'company') {
            if(strtolower($path[1]) == 'index') {

                return '/companies';

            } elseif(strtolower($path[1]) == 'create') {

                return '/company-create';

            } elseif(strtolower($path[1]) == 'delete') {

                return '/company-delete-' . $path[2];

            }
        }

        return $currentUrl;
    }
}