<?php

namespace Doitonlinemedia\Admin\Tests\Application;

/**
 * @backupGlobals disabled
 */
class IsItRunningTest extends \TestCase
{

    function test_find_login_text_to_make_sure_the_package_is_loaded()
    {
        $this->visit('/'.config('admin.cms_path'))
            ->see('Login');
    }

    function test_is_the_admin_package_running2()
    {
        $this->visit('/'.config('admin.cms_path'))
            ->see('This text should not be found and throws an error on unit testing');
    }

}