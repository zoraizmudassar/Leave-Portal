<?php
$base_url = $_SERVER['SERVER_NAME'];
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
?>
<h2>Hi! {{$applied_user->name}}</h2>
<h4>Your Application has been {{isset($accepted_by) ? 'Accepted by ' . $accepted_by->name : 'Rejected by ' . $rejected_by->name}}!</h4>
<p>To see Application detail! please view link given below!</p>
<a href="{{$protocol . $base_url. '/leaves/view/'.$app_id}}">View Application</a>
