<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Info</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<form id="vehicle-form">
    <label for="techPassportSeria">Tech Passport Seria:</label>
    <input type="text" id="techPassportSeria" name="techPassportSeria">
    <label for="techPassportNumber">Tech Passport Number:</label>
    <input type="text" id="techPassportNumber" name="techPassportNumber">
    <label for="govNumber">State Number:</label>
    <input type="text" id="govNumber" name="govNumber">
    <button type="button" onclick="fetchVehicleInfo()">Fetch Info</button>
</form>

<div id="vehicle-info">
    <!-- Bu yerga natijalar ko'rsatiladi -->
</div>

<script>
    function fetchVehicleInfo() {
        const techPassportSeria = document.getElementById('techPassportSeria').value;
        const techPassportNumber = document.getElementById('techPassportNumber').value;
        const govNumber = document.getElementById('govNumber').value;

        axios.post('/api/fetch-vehicle-info', {
            techPassportSeria: techPassportSeria,
            techPassportNumber: techPassportNumber,
            govNumber: govNumber
        })
            .then(response => {
                const data = response.data.result;
                displayVehicleInfo(data);
            })
            .catch(error => {
                console.error('There was an error!', error);
            });
    }

    function displayVehicleInfo(data) {
        const vehicleInfoDiv = document.getElementById('vehicle-info');
        vehicleInfoDiv.innerHTML = `
                <h2>Vehicle Info</h2>
                <p><strong>Owner:</strong> ${data.owner}</p>
                <p><strong>Model Name:</strong> ${data.modelName}</p>
                <p><strong>Gov Number:</strong> ${data.govNumber}</p>
                <p><strong>Vehicle Color:</strong> ${data.vehicleColor}</p>
                <p><strong>Engine Number:</strong> ${data.engineNumber}</p>
                <p><strong>Body Number:</strong> ${data.bodyNumber}</p>
                <p><strong>Issue Year:</strong> ${data.issueYear}</p>
                <p><strong>Tech Passport Issue Date:</strong> ${data.techPassportIssueDate}</p>
                <p><strong>Division:</strong> ${data.division}</p>
                <p><strong>Full Weight:</strong> ${data.fullWeight}</p>
                <p><strong>Empty Weight:</strong> ${data.emptyWeight}</p>
                <p><strong>Fuel Type:</strong> ${data.fuelType}</p>
                <p><strong>Seats:</strong> ${data.seats}</p>
                <p><strong>Stands:</strong> ${data.stands}</p>
                <p><strong>PNFL</strong> ${data.pnfl}</p>
            `;
    }
</script>
</body>
</html>
