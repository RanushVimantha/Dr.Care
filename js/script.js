const searchField = document.querySelector('.search-field input');
const suggestionsList = document.querySelector('.suggestions');

searchField.addEventListener('input', function() {
    const query = this.value.trim();

    if (query.length > 0) {
        // Make AJAX request to fetch suggestions
        fetch(`search_patients.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                displaySuggestions(data);
            })
            .catch(error => console.error('Error fetching suggestions:', error));
    } else {
        // Clear suggestions if search field is empty
        suggestionsList.innerHTML = '';
    }
});

// Define the click event for suggestions
suggestionsList.addEventListener('click', function(event) {
    const clickedItem = event.target;
    if (clickedItem.tagName === 'LI') {
        const patientName = clickedItem.textContent;
        const patientID = patientName.match(/\b\d+\b/)[0]; // Extracting patient ID from the suggestion text
        window.location.href = `PatientView.php?id=${patientID}`;
    }
});

function displaySuggestions(suggestions) {
    suggestionsList.innerHTML = '';
    if (suggestions.length > 0) {
        suggestions.forEach(patient => {
            const li = document.createElement('li');
            li.textContent = patient;
            suggestionsList.appendChild(li);
        });
    } else {
        const li = document.createElement('li');
        li.textContent = 'No matching patients found';
        suggestionsList.appendChild(li);
    }
}
