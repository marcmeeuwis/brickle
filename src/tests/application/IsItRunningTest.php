<?php

namespace Doitonlinemedia\Admin\Tests\Application;

use Doitonlinemedia\Admin\Tests\TestCase;

/**
 * @backupGlobals disabled
 */
class IsItRunningTest extends TestCase
{

    function test_find_login_text_to_make_sure_the_package_is_loaded()
    {
        $this->visit('/'.config('admin.cms_path'))
            ->see('Login');
    }

    function test_is_the_login_working()
    {
        $this->visit('/'.config('admin.cms_path').'/login');
        $this->see('Login');
        $this->type('admin', 'username');
        $this->type('admin', 'password');
        $this->type('_token', csrf_token());
        $this->press('Login');
        $this->seePageIs(config('admin.cms_path').'/');
    }

}