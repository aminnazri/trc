

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>

    <form method="post" id="upload_receipt" enctype="multipart/form-data" action = "php/upload_receipt.php">

    <!-- <form method="post" id="upload_receipt" enctype="multipart/form-data" > -->
    <div id="errs" class="errcontainer"></div>
        <label for="tittle">Title</label>
        <input type="text" name="tittle" >
        <label for="tax_type">Choose receipt type:</label>
        <select name="tax_type" id="tax_type">
            <option value="edu_fees">Education Fees</option>
            <option value="s_e">Supporting equipment</option>
            <option value="lifestyle">Lifestyle</option>
            <option value="lifestyle_addition">Lifestyle addtion</option>
        </select>
        <label for="description">Descriptions</label>
        <input type="text" name="description">
        <label for="amount">Amount</label>
        <input type="number" name="amount">
        <label for="receipt_date">Date</label>
        <input type="date" name="receipt_date">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
        <!-- <button type="submit" onclick="upload_receipt();" name="submit">UPLOAD</button> -->
    </form>

    <script src="script.js"></script>
</body>
</html>