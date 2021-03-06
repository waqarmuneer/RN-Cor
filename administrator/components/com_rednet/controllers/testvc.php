<?php
/**
* @version		$Id: #name#.php 111 2012-02-24 18:37:06Z michel $
* @package		Rednet
* @subpackage 	Controllers
* @copyright	Copyright (C) 2012, . All rights reserved.
* @license #
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

/**
 * RednetTestvc Controller
 *
 * @package    Rednet
 * @subpackage Controllers
 */
class RednetControllerTestvc extends RednetController
{
	/**
	 * Constructor
	 */
	protected $_viewname = 'testvc'; 
	 
	public function __construct($config = array ()) 
	{
		parent :: __construct($config);
		JRequest :: setVar('view', $this->_viewname);

	}
	
	function cancel()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_rednet&view=testvc' );
		
		$model = $this->getModel('testvc');

		$model ->checkin();
	}	
	
	function edit() 
	{
		$document =& JFactory::getDocument();

		$viewType	= $document->getType();
		$viewType	= $document->getType();
		$viewName	= JRequest::getCmd( 'view', $this->_viewname);
				
		$view = & $this->getView( $viewName, $viewType);
		
		//Some Code here
		
		$view->setLayout('form');
		JRequest::setVar( 'hidemainmenu', 1 );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar( 'view', $this->_viewname);
		JRequest::setVar( 'edit', true );
				
		$view->display();
	}
	

	/**
	 * stores the item
	 */
	function save() 
	{
		// Check for request forgeries
		JRequest :: checkToken() or jexit('Invalid Token');
		
		//Do something
		
		
		switch ($this->getTask())
		{
			case 'apply':
				$link = 'index.php?option=com_rednet&view=testvc.&task=edit&cid[]=1' ;
				break;

			case 'save':
			default:
				$link = 'index.php?option=com_rednet&view=testvc';
				break;
		}
        
		$this->setRedirect($link, $msg);
	}
		
	
}// class
?>