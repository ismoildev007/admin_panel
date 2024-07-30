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
    <label for="stateNumber">State Number:</label>
    <input type="text" id="stateNumber" name="stateNumber">
    <button type="button" onclick="fetchVehicleInfo()">Fetch Info</button>
</form>

<script>
    function fetchVehicleInfo() {
        const techPassportSeria = document.getElementById('techPassportSeria').value;
        const techPassportNumber = document.getElementById('techPassportNumber').value;
        const stateNumber = document.getElementById('stateNumber').value;

        axios.get('/fetch-vehicle-info', {
            params: {
                techPassportSeria: techPassportSeria,
                techPassportNumber: techPassportNumber,
                stateNumber: stateNumber
            },
            headers: {
                'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Agar API token talab qilsa
            }
        })
            .then(response => {
                console.log(response.data);
                // Natijalarni ko'rsatish uchun qo'shimcha kod kiriting
            })
            .catch(error => {
                console.error('There was an error!', error);
            });
    }

</script>
</body>
</html>
