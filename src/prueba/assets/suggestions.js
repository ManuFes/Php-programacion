document.addEventListener("DOMContentLoaded", () => {
    const teamInput = document.getElementById("team");
    const suggestionsBox = document.getElementById("suggestions");

    teamInput.addEventListener("input", () => {
        const query = teamInput.value;

        if (query.length < 2) {
            suggestionsBox.innerHTML = "";
            return;
        }

        fetch(`suggest.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                suggestionsBox.innerHTML = data
                    .map(team => `<li onclick="selectTeam('${team}')">${team}</li>`)
                    .join("");
            });
    });
});

function selectTeam(team) {
    document.getElementById("team").value = team;
    document.getElementById("suggestions").innerHTML = "";
}
