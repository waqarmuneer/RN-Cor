<?php
/**
* @version		$Id: default_viewfrontend.php 96 2011-08-11 06:59:32Z michel $
* @package		Rednet
* @subpackage 	Views
* @copyright	Copyright (C) 2012, . All rights reserved.
* @license #
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

 
class RednetViewTestpages  extends JView 
{
	public function display($tpl = null)
	{
		
		$app = &JFactory::getApplication('site');
		$document	= &JFactory::getDocument();
		$uri 		= &JFactory::getURI();
		$user 		= &JFactory::getUser();
		$pagination	= &$this->get('pagination');
		$params		= $app ->getParams();				
		$menus	= &JSite::getMenu();
		
		$menu	= $menus->getActive();
		if (is_object( $menu )) {
			$menu_params = $menus->getParams($menu->id) ;
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title', 'Testpages');
			}
		}		


		$item = $this->get( 'Item' );
		$this->assignRef( 'item', $item );

		$this->assignRef('params', $params);
		$this->assignRef('pagination', $pagination);
		
                
                //=============================== 
                
                $all_dbdata = JRequest::getVar("allrecords");
                if(isset($all_dbdata)){
                    $this->assignRef("model_data", $all_dbdata);
                }
                $id = JRequest::getVar('id');
                
                if(isset($id))
                {
                    echo 'in view ==>'.$id;
                    $this->assignRef('my_id', $id);
                }
                
                
                $layout = JRequest::getVar('layout');
                
                if(isset($layout))
                {
                    $this->setLayout($layout);
                }
                
                
                
                
                //===============================
		parent::display($tpl);
	}
}
?>