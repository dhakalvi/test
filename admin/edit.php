<!DOCTYPE html>
<html>
<head>
    <title>Edit OJT Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container mt-5">
    <h2>Edit OJT Record</h2>
    <?php
    $filename = 'db/ojt.json';
    $sn = $_GET['sn']; // Get the Serial Number from the URL
    $record = null;

    if (file_exists($filename)) {
        $fileData = json_decode(file_get_contents($filename), true);
        foreach ($fileData as $entry) {
            if ($entry['SN'] == $sn) {
                $record = $entry;
                break;
            }
        }
    }

    if (!$record) {
        echo "<div class='alert alert-danger'>Record not found!</div>";
    } else {
        ?>
        <form action="update.php" method="post">
            <input type="hidden" name="sn" value="<?php echo $record['SN']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="data[NAME]" value="<?php echo $record['NAME']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="number" class="form-control" id="class" name="data[CLASS]" value="<?php echo $record['CLASS']; ?>" min="10" max="12" required>
            </div>
            <div class="mb-3">
                <label for="passed" class="form-label">Passed Year</label>
                <input type="number" class="form-control" id="passed" name="data[PASSED]" value="<?php echo $record['PASSED']; ?>" min="2071" max="2090" required>
            </div>
            <div class="mb-3">
                <label for="reg_no" class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="reg_no" name="data[REG_NO]" value="<?php echo $record['REG_NO']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="symbol_no" class="form-label">Symbol Number</label>
                <input type="text" class="form-control" id="symbol_no" name="data[SYMBOL_NO]" value="<?php echo $record['SYMBOL_NO']; ?>">
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Start Date (YYYY.MM.DD)</label>
                <input type="text" class="form-control" id="start" name="data[START]" value="<?php echo $record['START']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="end" class="form-label">End Date (YYYY.MM.DD)</label>
                <input type="text" class="form-control" id="end" name="data[END]" value="<?php echo $record['END']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ref" class="form-label">Reference</label>
                <select class="form-control" id="ref" name="data[REF]" required>
                    <option value="" <?php echo $record['REF'] == "" ? 'selected' : ''; ?>>Duration</option>
                    <option value="Absent" <?php echo $record['REF'] == "Absent" ? 'selected' : ''; ?>>Absent</option>
                    <option value="1 Mon" <?php echo $record['REF'] == "1 Mon" ? 'selected' : ''; ?>>1 Mon</option>
                    <option value="2 Mon" <?php echo $record['REF'] == "2 Mon" ? 'selected' : ''; ?>>2 Mon</option>
                    <option value="3 Mon" <?php echo $record['REF'] == "3 Mon" ? 'selected' : ''; ?>>3 Mon</option>
                    <option value="4 Mon" <?php echo $record['REF'] == "4 Mon" ? 'selected' : ''; ?>>4 Mon</option>
                    <option value="5 Mon" <?php echo $record['REF'] == "5 Mon" ? 'selected' : ''; ?>>5 Mon</option>
                    <option value="6 Mon" <?php echo $record['REF'] == "6 Mon" ? 'selected' : ''; ?>>6 Mon</option>
                    <option value="7 Mon" <?php echo $record['REF'] == "7 Mon" ? 'selected' : ''; ?>>7 Mon</option>
                    <option value="8 Mon" <?php echo $record['REF'] == "8 Mon" ? 'selected' : ''; ?>>8 Mon</option>
                    <option value="9 Mon" <?php echo $record['REF'] == "9 Mon" ? 'selected' : ''; ?>>9 Mon</option>
                    <option value="10 Mon" <?php echo $record['REF'] == "10 Mon" ? 'selected' : ''; ?>>10 Mon</option>
                    <option value="11 Mon" <?php echo $record['REF'] == "11 Mon" ? 'selected' : ''; ?>>11 Mon</option>
                    <option value="12 Mon" <?php echo $record['REF'] == "12 Mon" ? 'selected' : ''; ?>>12 Mon</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    <?php
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-5Xizw/9tnfG9bNOGJfovvKX4gExAvmM61h1f/VGmk3jNVZRR5c1Xz3bX9jX5NRX" crossorigin="anonymous"></script>
</body>
<?php include 'footer.php'; ?>
</html>
