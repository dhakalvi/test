<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] == 0) {
        $filename = $_FILES['excelFile']['tmp_name'];
        $spreadsheet = IOFactory::load($filename);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $jsonFile = 'db/ojt.json';
        $jsonData = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

        $sn = count($jsonData) + 1;

        foreach ($sheetData as $row) {
            if ($sn == 1) { // Skip header row if present
                $sn++;
                continue;
            }

            $data = [
                'SN' => $sn++,
                'NAME' => $row['A'],
                'CLASS' => $row['B'],
                'PASSED' => $row['C'],
                'REG_NO' => $row['D'],
                'SYMBOL_NO' => $row['E'],
                'START' => $row['F'],
                'END' => $row['G'],
                'REF' => $row['H'],
            ];

            // Check for duplicate REG_NO before adding
            $duplicate = false;
            foreach ($jsonData as $entry) {
                if ($entry['REG_NO'] == $data['REG_NO']) {
                    $duplicate = true;
                    break;
                }
            }

            if (!$duplicate) {
                $jsonData[] = $data;
            }
        }

        file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));
        echo "<script>alert('Data successfully uploaded and added!'); window.location.href = 'upload.php';</script>";
    } else {
        echo "<script>alert('Failed to upload the file.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>
