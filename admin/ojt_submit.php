<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $data = array_merge(['SN' => 1], $data); // Default SN at the start of the array

    $filename = 'db/ojt.json';
    if (file_exists($filename)) {
        $fileData = json_decode(file_get_contents($filename), true);

        // Check for duplicate REG NO.
        foreach ($fileData as $entry) {
            if ($entry['REG_NO'] == $data['REG_NO']) {
                echo "<script>
                    alert('Error: Registration Number already exists.');
                    window.history.back();
                </script>";
                exit;
            }
        }

        // Set SN to next available number
        $data['SN'] = count($fileData) + 1;
        array_push($fileData, $data);
    } else {
        $fileData = array($data);
    }

    file_put_contents($filename, json_encode($fileData, JSON_PRETTY_PRINT));
    echo "<script>
        alert('Data saved successfully!');
        window.location.href = 'form.php';
    </script>";
}
?>
