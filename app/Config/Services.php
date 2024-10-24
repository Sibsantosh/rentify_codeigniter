<?php

namespace Config;

use App\APIS\Repositories\AuthenticationApis;
use App\APIS\Repositories\GetAuthenticationToken;
use App\APIS\Repositories\GetCouponsApis;
use App\APIS\Repositories\PropertiesApis;
use App\APIS\Repositories\BookPropertyApis;
use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
   /*
     * public static function example($getShared = true)
     * {
     *     if ($getShared) {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */

   public static function getAuthenticationTokenInstance()
   {
      return new GetAuthenticationToken();
   }
   public static function getAuthenticationApiInstance()
   {
      return new AuthenticationApis();
   }
   public static function getCouponApiInstance()
   {
      return new GetCouponsApis();
   }
   public static function getPropertiesApisInstance()
   {
      return new PropertiesApis();
   }
   public static function getBookPropertyApisInstance() {
      return new BookPropertyApis();
   }
}
