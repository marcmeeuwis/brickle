<?php
if (! function_exists('admin_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function admin_asset($path, $secure = null)
    {
        return app('url')->asset(config('admin.publish_path').'/'.$path, $secure);
    }
}