<?php

/**
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines http://www.simplemachines.org
 * @copyright 2011 Simple Machines
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 2.0.14
 */

if (!defined('SMF'))
	die('Hacking attempt...');

/*	The job of this file is to handle everything related to posting replies,
	new topics, quotes, and modifications to existing posts.  It also handles
	quoting posts by way of javascript.

	void Project()
		- Create projects, mod projects, delete projects and consult projects
*/

function Project()
{
	global $txt, $scripturl, $topic, $modSettings, $board;
	global $user_info, $sc, $board_info, $context, $settings;
	global $sourcedir, $options, $smcFunc, $language;

        // Second, give ourselves access to all the global variables we will need for this action
	global $context, $scripturl, $txt, $smcFunc;

        if(empty($_GET["request"])){

	  // Create Project
	  loadTemplate('Project');

          //Fourth, Come up with a page title for the main page
	  $context['page_title'] = $txt['Project_PageTitle'];
	  $context['page_title_html_safe'] = $smcFunc['htmlspecialchars'](un_htmlspecialchars($context['page_title']));

	  //Fifth, define the navigational link tree to be shown at the top of the page.
	  $context['linktree'][] = array(
  		'url' => $scripturl. '?action=project;request=list',
 		'name' => $txt['ProjectsList'],
	  );

	  //Fifth, define the navigational link tree to be shown at the top of the page.
	  $context['linktree'][] = array(
  		'url' => $scripturl. '?action=project',
 		'name' => $txt['Project'],
	  );
        
        } else if($_GET["request"]=="list"){

          // List Projects
	  loadTemplate('ProjectsList');

          //Fourth, Come up with a page title for the main page
	  $context['page_title'] = $txt['ProjectsList_PageTitle'];
	  $context['page_title_html_safe'] = $smcFunc['htmlspecialchars'](un_htmlspecialchars($context['page_title']));


	  //Fifth, define the navigational link tree to be shown at the top of the page.
	  $context['linktree'][] = array(
  		'url' => $scripturl. '?action=project;request=list',
 		'name' => $txt['ProjectsList'],
	  );

        } else if($_GET["request"]=="modify" && is_numeric($_GET["project"])){

          //los permisos de modificación se mandan por JSON y PHP


          //Fourth, Come up with a page title for the main page
	  $context['page_title'] = $txt['ProjectsListMod'];
	  $context['page_title_html_safe'] = $smcFunc['htmlspecialchars'](un_htmlspecialchars($context['page_title']));

	  //Fifth, define the navigational link tree to be shown at the top of the page.
	  $context['linktree'][] = array(
  		'url' => $scripturl. '?action=project;request=list',
 		'name' => $txt['ProjectsList'],
	  );  

	  //Fifth, define the navigational link tree to be shown at the top of the page.
	  $context['linktree'][] = array(
  		'url' => '',
 		'name' => $txt['ProjectsListMod'],
	  );      

	  // Create Project
	  loadTemplate('Project');  

        } else if($_GET["request"]=="see" && is_numeric($_GET["project"])) {

	  // Create Project
	  loadTemplate('ProjectSee');

          //Fourth, Come up with a page title for the main page
	  $context['page_title'] = $txt['ProjectSee_PageTitle'];
	  $context['page_title_html_safe'] = $smcFunc['htmlspecialchars'](un_htmlspecialchars($context['page_title']));

	  //Fifth, define the navigational link tree to be shown at the top of the page.
	  $context['linktree'][] = array(
  		'url' => $scripturl. '?action=project;request=list',
 		'name' => $txt['ProjectsList'],
	  );

        } else {
          
	  // Create Project
	  loadTemplate('Project');

          //Fourth, Come up with a page title for the main page
	  $context['page_title'] = $txt['Project_PageTitle'];
	  $context['page_title_html_safe'] = $smcFunc['htmlspecialchars'](un_htmlspecialchars($context['page_title']));


	  //Fifth, define the navigational link tree to be shown at the top of the page.
	  $context['linktree'][] = array(
  		'url' => $scripturl. '?action=project',
 		'name' => $txt['Project'],
	  );
        }

	

}
?>