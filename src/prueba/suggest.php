<?php
require_once 'clases/FootballAPI.php';

$api = new FootballAPI();
$query = isset($_GET['query']) ? strtolower($_GET['query']) : '';
$teams = $api->getTeams();

$suggestions = [];
foreach ($teams as $team) {
    if (strpos(strtolower($team['name']), $query) !== false) {
        $suggestions[] = $team['name'];
    }
}

header('Content-Type: application/json');
echo json_encode($suggestions);
?>
