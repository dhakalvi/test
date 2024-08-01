<?php
// Include header and navigation
include 'nav.php';

// Check if form data has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg_no'])) {
    $filename = 'db/ojt.json';
    $reg_no = $_POST['reg_no'];
    $updatedData = $_POST['data'];
    $updated = false;

    if (file_exists($filename)) {
        $fileData = json_decode(file_get_contents($filename), true);
        
        // Loop through the data to find the record to update
        foreach ($fileData as &$entry) {
            if ($entry['REG_NO'] == $reg_no) {
                $entry = array_merge($entry, $updatedData);
                $updated = true;
                break;
            }
        }
        
        if ($updated) {
            file_put_contents($filename, json_encode($fileData, JSON_PRETTY_PRINT));
            $message = "Record updated successfully!";
            $alertType = "success";
            $icon = "fa-check-circle";
        } else {
            $message = "Record not found!";
            $alertType = "danger";
            $icon = "fa-exclamation-circle";
        }
    } else {
        $message = "Database file not found!";
        $alertType = "danger";
        $icon = "fa-exclamation-circle";
    }
} else {
    $message = "Invalid request!";
    $alertType = "danger";
    $icon = "fa-exclamation-circle";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update OJT Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="alert alert-<?php echo $alertType; ?>">
        <i class="fa <?php echo $icon; ?>"></i> <?php echo $message; ?>
    </div>
    <a href="edit2.php?reg_no=<?php echo $reg_no; ?>" class="btn btn-primary">Back to Edit</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-5Xizw/9tnfG9bNOGJfovvKX4gExAvmM61h1f/VGmk3jNVZRR5c1Xz3bX9jX5NRX" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Include footer
include 'footer.php';
?>
