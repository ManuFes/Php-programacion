<?php
class FootballAPI {
    private $apiUrl = "https://api.football-data.org/v2/";
    private $apiKey = "TU_API_KEY"; // Sustituye por tu clave de API

    public function getTeams() {
        $url = $this->apiUrl . "teams";
        return $this->makeRequest($url);
    }

    private function makeRequest($url) {
        $headers = [
            "X-Auth-Token: $this->apiKey"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
?>
