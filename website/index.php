<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $results = file_get_contents("http://node-container:8091/products");
     $products = json_decode($results);
    ?>

    <table>
        <thead>
            <tr>
                <th>produto</th>
                <th>preco</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
                <tr>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo $product->price; ?></td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
</body>
</html>