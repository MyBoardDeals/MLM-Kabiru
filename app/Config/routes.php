<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
 
		Router::connect('/', array('controller' => 'pages', 'action' => 'index')); 		
		Router::connect('/login', array('controller' => 'users', 'action' => 'login'));	  
		Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));	  
		
		Router::connect('/home', array('controller' => 'pages', 'action' => 'home')); 
		Router::connect('/index', array('controller' => 'pages', 'action' => 'index')); 		
		Router::connect('/aboutus', array('controller' => 'pages', 'action' => 'aboutus'));	
		Router::connect('/luxury_club', array('controller' => 'pages', 'action' => 'luxury_club')); 
		Router::connect('/business', array('controller' => 'pages', 'action' => 'business')); 
		Router::connect('/get_started', array('controller' => 'pages', 'action' => 'get_started')); 
		Router::connect('/private_label', array('controller' => 'pages', 'action' => 'private_label')); 
		Router::connect('/thankyou', array('controller' => 'users', 'action' => 'thankyou')); 		
		Router::connect('/privacy_policy', array('controller' => 'pages', 'action' => 'privacy_policy')); 
		Router::connect('/terms', array('controller' => 'pages', 'action' => 'terms'));			
		Router::connect('/contact_us', array('controller' => 'pages', 'action' => 'contact_us')); 	    
		Router::connect('/joinnow', array('controller' => 'users', 'action' => 'joinnow')); 	
		Router::connect('/forgot_password', array('controller' => 'users', 'action' => 'forgot_password')); 
		
	
	  /*Router::connect('/en', array('controller' => 'language', 'action' => 'set_current', 'en-us'));
	   Router::connect('/ar', array('controller' => 'language', 'action' => 'set_current', 'ar'));	 */
	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'index'));
    Router::connect('/r/*', array('controller' => 'r', 'action' => 'index'));
/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
