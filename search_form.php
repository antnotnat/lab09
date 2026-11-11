<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Cars</title>
</head>
<body>
    <h1>Search Used Cars</h1>
    <!-- take data via query string -->
    <form action="search_result.php" method="get">
        <label for="model">Car Model:</label>
        <input type="text" name="model" id="model" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>