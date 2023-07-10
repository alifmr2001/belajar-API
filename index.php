<?php

$url = "https://disease.sh/v3/covid-19/all";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

//Memastikan respon berhasil diambil
if ($response) {
    $data = json_decode($response, true);
} else {
    $data = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Covid-19</title>
</head>

<body>
    <h1>Data covid-19</h1>
    <br>
    <hr>


    <?php if (!empty($data)) : ?>
        <table border="1px">
            <thead>
                <tr>
                    <th>Jumlah kasus</th>
                    <th>Total Meninggal</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo number_format($data['cases'], 0, ',', '.'); ?></td>
                    <td><?php echo number_format($data['deaths'], 0, ',', '.'); ?></td>

                </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p>Gagal terhubung dengan API</p>
    <?php endif; ?>
</body>

</html>