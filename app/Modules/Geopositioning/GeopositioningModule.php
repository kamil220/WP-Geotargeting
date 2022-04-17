<?php

namespace Geotargeting\Modules\Geopositioning;

use Geotargeting\Common\Modules\Module;

class GeopositioningModule extends Module
{
    protected string $version = '1.0.1';

    public function scripts() {
        wp_enqueue_script( 'geopositioning', GEOTARGET_PLUGIN_URL . '/public/js/geopositioning.js', [], $this->version, false );
    }

    public function services() {

    }
}
