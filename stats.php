<?php

    $now = date("Y-m-d");

    echo "<h3>Lehe külastajate statistika</h3>";
    echo "<table border=1 width=60%><tr><td colspan=4><t>Lehe külastajate statistika: </t> ";

    $sql = "SELECT thedate_visited FROM stattracker ORDER BY id LIMIT 1";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $temp_date = $row["thedate_visited"];
        $date = substr($temp_date, 8, 4)."-".substr($temp_date, 5, 2)."-".substr($temp_date, 0, 4);
        echo $temp_date;
    }}
    echo " <b>kuni:</b> $now</td></tr>";

    $result1 = $mysqli->query ("SELECT COUNT(*) AS total FROM stattracker;");
    $row1 = mysqli_fetch_assoc($result1);
    $overall_total = $row1 ["total"];
    echo "<tr><td colspan=4><b>Mitu korda on lehte külastatud: </b>$overall_total</td></tr>";

    echo "<tr><td><b>Kuupäev</b></td><td><b>Aeg</b></td><td><b>IP aadress</b></td><td><b>Veebilehitseja</b></td></tr>";

    $sql = "SELECT * FROM stattracker";
    $result2 = $mysqli->query ($sql);
    while ($row2 = $result2->fetch_assoc()){
        $ip = $row2["ip"];
        $browser = $row2["browser"];
        $date = $row2["thedate_visited"];
        $ontime = $row2["time_visited"];

        echo "<tr><td>$date</td><td>$ontime</td><td>$ip</td><td>$browser</td></tr>";
    }

    echo "</table>";
