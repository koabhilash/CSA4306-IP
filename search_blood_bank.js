function searchBloodBanks() {
    const location = document.getElementById('location').value;
    const bloodGroup = document.getElementById('blood_group').value;

    // Perform validation (you can enhance this based on requirements)
    if (location.trim() === '') {
        alert('Please enter a location.');
        return;
    }

    // Create an XMLHttpRequest to send data to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search_blood_bank.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById('results').innerHTML = this.responseText;
        }
    };

    xhr.send('location=' + location + '&blood_group=' + bloodGroup);
}
