<?php
// Redirect legacy php redirects to Laravel clean routes
$queryString = $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '';
header("Location: /dashboard" . $queryString);
exit;
