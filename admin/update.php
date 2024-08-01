<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = 'db/ojt.json';
    $sn = $_POST['sn']; // Get the Serial Number (SN) from the hidden input field
    $updatedData = $_POST['data']; // Get the updated data from the form

    if (file_exists($filename)) {
        $fileData = json_decode(file_get_contents($filename), true);
        $recordFound = false;

        // Update the record with the matching SN
        foreach ($fileData as &$entry) {
            if ($entry['SN'] == $sn) {
                $entry = array_merge($entry, $updatedData);
                $recordFound = true;
                break;
            }
        }

        if ($recordFound) {
            file_put_contents($filename, json_encode($fileData, JSON_PRETTY_PRINT));
            echo "<script>alert('Record updated successfully!'); window.location.href = 'view.php';</script>";
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
