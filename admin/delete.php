<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sn'])) {
    $filename = 'db/ojt.json';
    $sn = $_GET['sn']; // Get the Serial Number (SN) from the query string

    if (file_exists($filename)) {
        $fileData = json_decode(file_get_contents($filename), true);
        $newData = [];
        $recordFound = false;

        // Iterate over the data and exclude the record with the matching SN
        foreach ($fileData as $entry) {
            if ($entry['SN'] == $sn) {
                $recordFound = true;
            } else {
                $newData[] = $entry;
            }
        }

        if ($recordFound) {
            file_put_contents($filename, json_encode($newData, JSON_PRETTY_PRINT));
            echo "<script>alert('Record deleted successfully!'); window.location.href = 'view.php';</script>";
        } else {
            echo "<script>alert('Record not found.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Data file not found.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>
