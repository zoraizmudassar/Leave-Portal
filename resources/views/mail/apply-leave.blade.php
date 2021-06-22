<?php
$base_url = $_SERVER['SERVER_NAME'];
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
?>
<h2>Hi! {{$team_lead->name}}</h2>
<h4>A new Application applied from your team member!</h4>
<p>To see Application detail! please view link given below!</p>
<a href="{{$protocol . $base_url. '/applications/view/'.$app_id}}">View Application</a>
