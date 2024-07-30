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

<div id="additional-info" style="display:none;">
    <h3>Additional Info</h3>
    <label for="pinfl">PINFL:</label>
    <input type="text" id="pinfl" name="pinfl" readonly>

    <!-- Ikkita yangi input maydoni -->
    <label for="input1">Input 1:</label>
    <input type="text" id="input1" name="input1">
    <label for="input2">Input 2:</label>
    <input type="text" id="input2" name="input2">

    <button type="button" onclick="fetchOtherInfo()">Fetch Other Info</button>
</div>

<div id="driver-info" style="display:none;">
    <!-- Bu yerda boshqa ma'lumotlar ko'rsatiladi -->
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
                showAdditionalInfo(data.pinfl);
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
                <p><strong>PNFL:</strong> ${data.pinfl}</p>
            `;
    }

    function showAdditionalInfo(pinfl) {
        const pinflInput = document.getElementById('pinfl');
        pinflInput.value = pinfl;
        document.getElementById('additional-info').style.display = 'block';
    }

    function fetchOtherInfo() {
        const pinfl = document.getElementById('pinfl').value;
        const input1 = document.getElementById('input1').value;
        const input2 = document.getElementById('input2').value;

        axios.post('/api/fetch-driver-summary', {
            pinfl: pinfl,
            passportSeries: input1,
            passportNumber: input2
        })
            .then(response => {
                const data = response.data.result;
                displayDriverInfo(data);
            })
            .catch(error => {
                console.error('There was an error fetching other info!', error);
            });
    }

    function displayDriverInfo(data) {
        const driverInfoDiv = document.getElementById('driver-info');
        const driverInfo = data.DriverInfo;
        const discountInfo = data.DiscountInfo;
        const coefficient = data.coefficient;

        driverInfoDiv.innerHTML = `
            <h2>Driver Info</h2>
            <p><strong>License Number:</strong> ${driverInfo.licenseNumber}</p>
            <p><strong>License Seria:</strong> ${driverInfo.licenseSeria}</p>
            <p><strong>Issue Date:</strong> ${driverInfo.issueDate}</p>
            <p><strong>Owner:</strong> ${driverInfo.pOwner}</p>
            <p><strong>Owner Date:</strong> ${driverInfo.pOwnerDate}</p>
            <h3>License Categories</h3>
            ${driverInfo.modelDLNew.map(category => `
                <p><strong>Category:</strong> ${category.pCategory}</p>
                <p><strong>Begin Date:</strong> ${category.pBegin}</p>
                <p><strong>End Date:</strong> ${category.pEnd}</p>
            `).join('')}
            <h3>Discount Info</h3>
            <p><strong>Is Pensioner:</strong> ${discountInfo.isPensioner}</p>
            <h3>Coefficient</h3>
            <p><strong>Coefficient:</strong> ${coefficient}</p>
        `;

        driverInfoDiv.style.display = 'block';
    }
</script>
</body>
</html>
