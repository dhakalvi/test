<!DOCTYPE html>
<html>
<head>
    <title>OJT Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container mt-5">
    <h2>Class (10/12) OJT Records</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Class</th>
                <th>Passed</th>
                <th>Registration Number</th>
                <th>Symbol Number</th>
                <th>Start</th>
                <th>End</th>
                <th>Reference</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $filename = 'db/ojt.json';
            if (file_exists($filename)) {
                $fileData = json_decode(file_get_contents($filename), true);
                foreach ($fileData as $entry) {
                    echo "<tr>";
                    echo "<td>{$entry['SN']}</td>";
                    echo "<td>{$entry['NAME']}</td>";
                    echo "<td>{$entry['CLASS']}</td>";
                    echo "<td>{$entry['PASSED']}</td>";
                    echo "<td>{$entry['REG_NO']}</td>";
                    echo "<td>{$entry['SYMBOL_NO']}</td>";
                    echo "<td>{$entry['START']}</td>";
                    echo "<td>{$entry['END']}</td>";
                    echo "<td>{$entry['REF']}</td>";
                     echo "<td>
                            <a href='edit.php?sn={$entry['SN']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete.php?sn={$entry['SN']}' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>
