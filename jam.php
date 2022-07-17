
<?php
$q = strval($_GET['q']);
$o = strval($_GET['o']);

include "conn.php";

$sql1 = "SELECT * FROM Data_Booking WHERE Tgl_service = '$q' AND Id_petugas = '$o'";
$result1 = mysqli_query($conn, $sql1);

$jam = ["11:00", "11:20", "11:40", "12:00", "12:20", "12:40", "13:00", "13:20", "13:40", "14:00", "14:20", "14:40", "15:00", "15:20", "15:40", "16:00", "16:20", "16:40", "17:00", "17:20", "17:40", "18:00", "18:20", "18:40", "19:00", "19:20", "19:40", "20:00", "20:20", "20:40"];
$jamsaved = [];
while ($row = mysqli_fetch_assoc($result1)) {
    $new = array_push($jamsaved, $row['Jam']);
}


echo "<option selected>Pilih Jam Yang Tersedia</option>";

if(count($jamsaved) == null){
    for ($i = 0; $i < count($jam); $i++) {
        echo "<option value='$jam[$i]'>$jam[$i]</option>";
    }
}

$jamResult = array_diff($jam, $jamsaved);
for ($i = 0; $i < count($jamResult); $i++) {
    if ($jamResult[$i] == "") continue;
    echo "<option value='$jamResult[$i]'>$jamResult[$i]</option>";
}

mysqli_close($conn);
?>
