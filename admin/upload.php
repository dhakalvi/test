<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container mt-5">
    <h2>Upload Excel File</h2>
    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="excelFile" class="form-label">Choose Excel file:</label>
            <input type="file" name="excelFile" id="excelFile" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
</body>
<?php include 'footer.php'; ?>
</html>
