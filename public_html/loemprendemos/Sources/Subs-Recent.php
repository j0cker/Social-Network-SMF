<?php

/**
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines http://www.simplemachines.org
 * @copyright 2011 Simple Machines
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 2.0
 */

if (!defined('SMF'))
	die('Hacking attempt...');

/*	!!!

*/

// Get the latest posts of a forum.
function getLastPosts($latestPostOptions)
{
	global $scripturl, $txt, $user_info, $modSettings, $smcFunc, $context;

	// Find all the posts.  Newer ones will have higher IDs.  (assuming the last 20 * number are accessable...)
	// !!!SLOW This query is now slow, NEEDS to be fixed.  Maybe break into two?
	$request = $smcFunc['db_query']('substring', '
		SELECT
			m.poster_time, m.subject, m.id_topic, m.id_member, m.id_msg,
			IFNULL(mem.real_name, m.poster_name) AS poster_name, t.id_board, b.name AS board_name,
			m.body AS body, m.smileys_enabled, m.id_project, m.likes, m.likes_users
		FROM {db_prefix}messages AS m
			INNER JOIN {db_prefix}topics AS t ON (t.id_topic = m.id_topic)
			INNER JOIN {db_prefix}boards AS b ON (b.id_board = t.id_board)
			LEFT JOIN {db_prefix}members AS mem ON (mem.id_member = m.id_member)
		WHERE m.id_msg >= {int:likely_max_msg}' .
			(!empty($modSettings['recycle_enable']) && $modSettings['recycle_board'] > 0 ? '
			AND b.id_board != {int:recycle_board}' : '') . '
			AND {query_wanna_see_board}' . ($modSettings['postmod_active'] ? '
			AND t.approved = {int:is_approved}
			AND m.approved = {int:is_approved}' : '') . '
		ORDER BY m.id_msg DESC
		LIMIT ' . $latestPostOptions['number_posts'],
		array(
			'likely_max_msg' => max(0, $modSettings['maxMsgID'] - 50 * $latestPostOptions['number_posts']),
			'recycle_board' => $modSettings['recycle_board'],
			'is_approved' => 1,
		)
	);
	$posts = array();
	while ($row = $smcFunc['db_fetch_assoc']($request))
	{
		// Censor the subject and post for the preview ;).
		censorText($row['subject']);
		censorText($row['body']);

		$row['body'] = parse_bbc($row['body'], $row['smileys_enabled'], $row['id_msg']);
                $imagen = '';
                $imagen_2 = extraer_imagen20($row['body']);

                if(!empty($imagen_2)){
                  if(!empty($imagen_2[1][0])){
                    $imagen = ''.$imagen_2[1][0].'.'.$imagen_2[2][0].'';
                  } 
                } 

		// Build the array.
		$posts[] = array(
			'id' => $row['id_msg'],
			'board' => array(
				'id' => $row['id_board'],
				'name' => $row['board_name'],
				'href' => $scripturl . '?board=' . $row['id_board'] . '.0',
				'link' => '<a href="' . $scripturl . '?board=' . $row['id_board'] . '.0">' . $row['board_name'] . '</a>'
			),
			'topic' => $row['id_topic'],
			'poster' => array(
				'id' => $row['id_member'],
				'name' => $row['poster_name'],
				'href' => empty($row['id_member']) ? '' : $scripturl . '?action=profile;u=' . $row['id_member'],
				'link' => empty($row['id_member']) ? $row['poster_name'] : '<a href="' . $scripturl . '?action=profile;u=' . $row['id_member'] . '">' . $row['poster_name'] . '</a>'
			),
			'subject' => $row['subject'],
			'short_subject' => shorten_subject($row['subject'], 24),
			'preview' => csubstr(strip_tags($row['body'],"<strong><br>"),0,300),
                        'imagen' => $imagen,
			'time' => timeformat($row['poster_time']),
			'timestamp' => forum_time(true, $row['poster_time']),
			'raw_timestamp' => $row['poster_time'],
			'href' => $scripturl . '?topic=' . $row['id_topic'] . '.msg' . $row['id_msg'] . ';topicseen#msg' . $row['id_msg'],
			'link' => '<a href="' . $scripturl . '?topic=' . $row['id_topic'] . '.msg' . $row['id_msg'] . ';topicseen#msg' . $row['id_msg'] . '" rel="nofollow">' . $row['subject'] . '</a>',
                        'id_project' => $row['id_project'],
                        'likes' => $row['likes'],
                        'likes_users' => $row['likes_users'],
                        'profile' => 0,
		);
	}
	$smcFunc['db_free_result']($request);

        $posts = mixWallProject($posts);

        $posts = mixWallUsers($posts);

	return $posts;
}

function mixWallUsers($posts){
        //show potential users
        

        global $txt, $user_info, $scripturl, $modSettings, $board;
	global $context, $user_profile, $sourcedir, $smcFunc;

        //puedes matchear tanto lo que le interesa al usuario del feed principal tanto lo que busca  el otro usuario (beta)

        $request = $smcFunc['db_query']('', '
				SELECT m.tipo_profesion, m.tipo_busca, m.real_name, m.id_member, m.location, m.date_registered, m.descripcion
				FROM {db_prefix}members AS m
                                WHERE m.tipo_profesion<>"" AND m.tipo_busca<>"" AND m.tipo_profesion NOT LIKE "%OTRO%" AND m.tipo_busca NOT LIKE "%OTRO%"
				ORDER BY m.date_registered DESC
                                LIMIT 50'

	);
        $posts2 = array();
        

        while($row = $smcFunc['db_fetch_assoc']($request)){
        
            $request2 = $smcFunc['db_query']('', 'select file_hash from loemprendemos_attachments WHERE id_member = "'.$row["id_member"].'" order by id_attach desc limit 1');
          
            $row2 = $smcFunc['db_fetch_assoc']($request2);
        
          if(!empty($row2["file_hash"])){
        
        
           if(file_exists("".getcwd()."/../attachments/".$row2['file_hash']."")){
             $imagen = ''.$modSettings["pretty_root_url"].'/attachments/'.$row2["file_hash"].'';
           } else {
             $imagen = ''.$modSettings["pretty_root_url"].'/bibliotecaImages/'.$row2["file_hash"].'';
           }
        
            $body = "";
            $body = "".$body."Tipo de Emprendedor: ".$row["tipo_profesion"]."<br />";
            $body = "".$body."Busca: ".$row["tipo_busca"]."<br />";
            $body = "".$body."Ubicación: ".$row["location"]."<br />";
            if(!empty($row["descripcion"]))
              $body = "".$body."Descripción: ".$row["descripcion"]."<br />";
        
            // Censor the subject and post for the preview ;).
	    //censorText($body);


		// Build the array.
		$posts[] = array(
			'id' => $row['id_msg'],
			'board' => array(
				'id' => $row['id_board'],
				'name' => $row['board_name'],
				'href' => $scripturl . '?board=' . $row['id_board'] . '.0',
				'link' => '<a href="' . $scripturl . '?board=' . $row['id_board'] . '.0">' . $row['board_name'] . '</a>'
			),
			'topic' => $row['id_topic'],
			'poster' => array(
				'id' => $row['id_member'],
				'name' => $row['poster_name'],
				'href' => empty($row['id_member']) ? '' : $scripturl . '?action=profile;u=' . $row['id_member'],
				'link' => empty($row['id_member']) ? $row['poster_name'] : '<a href="' . $scripturl . '?action=profile;u=' . $row['id_member'] . '">' . $row['poster_name'] . '</a>'
			),
			'subject' => $row['subject'],
			'short_subject' => shorten_subject($row['subject'], 24),
			'preview' => $body,
                        'imagen' => $imagen,
			'time' => timeformat($row['date_registered']),
			'timestamp' => forum_time(true, $row['date_registered']),
			'raw_timestamp' => $row['date_registered'],
			'href' => $scripturl . '?topic=' . $row['id_topic'] . '.msg' . $row['id_msg'] . ';topicseen#msg' . $row['id_msg'],
			'link' => '<a href="' . $scripturl . '?action=profile;u=' . $row['id_member'] . '" rel="nofollow">Nuevo Usuario Recomendado: ' . $row['real_name'] . '</a>',
                        'id_project' => 0,
                        'profile' => 1,
		);
		  
          }

        }//fin while
     
        $total = count($posts2) + count($posts);

        $posts = array_merge($posts2, $posts);

        usort($posts, "cmp");
        
        return $posts;
}

function mixWallProject($posts){
        //add to wall the new projects

        global $txt, $user_info, $scripturl, $modSettings, $board;
	global $context, $user_profile, $sourcedir, $smcFunc;

        $request = $smcFunc['db_query']('', '
				SELECT  m.body, m.smileys_enabled, m.subject, m.poster_time, m.approved, 
                                        m.id_member_poster, m.member_name_poster, m.id_msg, m.likes, m.likes_users,
                                        m.id_project, m.id_topic, m.id_msg, m.poster_name, m.id_member
				FROM {db_prefix}messages AS m
				WHERE m.id_member = m.id_topic=0 AND m.id_board=0 AND m.id_project!=0
				ORDER BY m.id_msg DESC'
			);
        $posts2 = array();

        while($row = $smcFunc['db_fetch_assoc']($request)){
          // Censor the subject and post for the preview ;).
		censorText($row['subject']);
		censorText($row['body']);

		$row['body'] = parse_bbc($row['body'], $row['smileys_enabled'], $row['id_msg']);
                $imagen = '';
                $imagen_2 = extraer_imagen20($row['body']);

                if(!empty($imagen_2)){
                  if(!empty($imagen_2[1][0])){
                    $imagen = ''.$imagen_2[1][0].'.'.$imagen_2[2][0].'';
                  } 
                } 

		// Build the array.
		$posts[] = array(
			'id' => $row['id_msg'],
			'board' => array(
				'id' => $row['id_board'],
				'name' => $row['board_name'],
				'href' => $scripturl . '?board=' . $row['id_board'] . '.0',
				'link' => '<a href="' . $scripturl . '?board=' . $row['id_board'] . '.0">' . $row['board_name'] . '</a>'
			),
			'topic' => $row['id_topic'],
			'poster' => array(
				'id' => $row['id_member'],
				'name' => $row['poster_name'],
				'href' => empty($row['id_member']) ? '' : $scripturl . '?action=profile;u=' . $row['id_member'],
				'link' => empty($row['id_member']) ? $row['poster_name'] : '<a href="' . $scripturl . '?action=profile;u=' . $row['id_member'] . '">' . $row['poster_name'] . '</a>'
			),
			'subject' => $row['subject'],
			'short_subject' => shorten_subject($row['subject'], 24),
			'preview' => csubstr(strip_tags($row['body'],"<strong><br>"),0,300),
                        'imagen' => $imagen,
			'time' => timeformat($row['poster_time']),
			'timestamp' => forum_time(true, $row['poster_time']),
			'raw_timestamp' => $row['poster_time'],
			'href' => $scripturl . '?topic=' . $row['id_topic'] . '.msg' . $row['id_msg'] . ';topicseen#msg' . $row['id_msg'],
			'link' => '<a href="' . $scripturl . '?action=project;request=see;project='.$row['id_project'].'" rel="nofollow">Nuevo Proyecto: ' . $row['subject'] . '</a>',
                        'id_project' => $row['id_project'],
                        'likes' => $row['likes'],
                        'likes_users' => $row['likes_users'],
                        'profile' => 0,
		);

        }//fin while

        $total = count($posts2) + count($posts);

        $posts = array_merge($posts2, $posts);

        usort($posts, "cmp");
  
        return $posts;
}

function cmp($a, $b)
{ if($a['timestamp']==$b['timestamp']) return 0;
    return $a['timestamp'] < $b['timestamp']?1:-1;
}



//funciones fuera del template
function extraer_imagen20($texto){
  $matches = "";
  if(isset($texto)){
    $first_post_msg = $texto;
    if(isset($first_post_msg )){
      preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*).(jpg|png|gif)/i', $first_post_msg , $matches);
      foreach($matches[0] as $key => $image){
        if(strpos($image, "".$modSettings["pretty_root_url"]."/Smileys/")!==false){
          unset($matches[0][$key]);
          unset($matches[1][$key]);
          unset($matches[2][$key]);
        }
      }//fin foreach
      $matches[0] = array_values($matches[0]);
      $matches[1] = array_values($matches[1]);
      $matches[2] = array_values($matches[2]);
    }//finfirst post msg
  }//fin if texto 
  return $matches;
}

function csubstr($string, $start, $length=false) { 
    $pattern = '/(\[\w+[^\]]*?\]|\[\/\w+\]|<\w+[^>]*?>|<\/\w+>)/i'; 
    $clean = preg_replace($pattern, chr(1), $string); 
    if(!$length) 
        $str = substr($clean, $start); 
    else { 
        $str = substr($clean, $start, $length); 
        $str = substr($clean, $start, $length + substr_count($str, chr(1))); 
    } 
    $pattern = str_replace(chr(1),'(.*?)',preg_quote($str)); 
    if(preg_match('/'.$pattern.'/is', $string, $matched)) 
        return $matched[0]; 
    return $string; 
} 
function strip_tags_content($text) {
    //quita el texto de los tags html
    $text = str_replace("<br /><br /><br />","<br>",$text);
    $text = preg_replace("/<img[^>]+\>/i", "", $text); 
    $text = preg_replace("/<div[^>]+>.*<\/div>/","",$text);
    $text = str_replace('<strong>','',$text);
    $text = str_replace('</strong>','',$text);
    $text = preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
   return $text;
}

// Callback-function for the cache for getLastPosts().
function cache_getLastPosts($latestPostOptions)
{
	return array(
		'data' => getLastPosts($latestPostOptions),
		'expires' => time() + 60,
		'post_retri_eval' => '
			foreach ($cache_block[\'data\'] as $k => $post)
			{
				$cache_block[\'data\'][$k][\'time\'] = timeformat($post[\'raw_timestamp\']);
				$cache_block[\'data\'][$k][\'timestamp\'] = forum_time(true, $post[\'raw_timestamp\']);
			}',
	);
}

?>