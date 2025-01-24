

    // Fetch and display the last listened songs
fetch('lastj.json')
.then(response => {
    if (!response.ok) {
        throw new Error("Failed to fetch last listened songs.");
    }
    return response.json();
})
.then(data => {
    const lastSongs = data.last_songs || []; // Get the last songs array
    const lastListeningDiv = document.getElementById('lastListening');

    // Clear the container before appending new data
    lastListeningDiv.innerHTML = "";

    // Loop through the last songs and generate HTML for each
    lastSongs.forEach(song => {
        const { poster, title, artist } = song;

        const songElement = document.createElement('div');
        songElement.classList.add('last-song');
        songElement.innerHTML = `
            <img src="${poster}" alt="${title}">
            <h2>${title}</h2>
            <h4>${artist}</h4>
        `;
        lastListeningDiv.appendChild(songElement);
    });
})
.catch(error => {
    console.error("Error fetching last listened songs JSON:", error);
    document.getElementById('lastListening').innerText = "Failed to load last listened songs.";
});

