<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/scripts.php'); 
?>

<!-- admin/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CodeIgniter 4</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
<!-- Display Total Number of Users -->
<div>Total Pengguna: <?= $totalUsers; ?></div>
        <!-- Grafik Jumlah Pengguna -->
        <canvas id="userChart" width="400" height="200"></canvas>

        <script>
       var userData = <?= !empty($userData) ? $userData : '[]'; ?>;
    var ctx = document.getElementById('userChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: userData.labels,
                    datasets: [{
                        label: 'ID Pengguna',
                        data: userData.data,
                        borderColor: 'rgba(255, 99, 132, 1)', // Change the line color
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Change the background color
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)', // Change the point color
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Nama Pengguna'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'ID Pengguna'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    animation: {
                        duration: 1000
                    }
                }
            });
        </script>

    </div>
</body>
</html>

<?php
include('includes/footer.php'); 
?>
