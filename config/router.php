<?php
/**
 * route
 */
$route = array();
$route['^(login.*)$']                   = 'Users/login';
$route['^(singup.*)$']                    = 'Users/singup';
$route['^(logout.*)$']                    = 'Users/logout';
$route['^(forgot.*)$']                    = 'Users/forgot';
$route['^(myaccount)$']                 = 'Users/myaccount';
$route['^(settings)$']					= 'Users/settings';
$route['^(Dashboard)$']                 = 'Dashboard/index';
$route['^(Admin)$']						= 'Admin/index';
$route['^(Facebook)$']                  = 'Dashboard/facebook';
$route['^(Twitter)$']                   = 'Twitter/index';
$route['^(payment)$']                   = 'Users/payment';