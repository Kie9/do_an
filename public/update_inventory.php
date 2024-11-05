<?php
header('Content-Type: application/json');

// Mock inventory database (in a real application, this would be a database call)
$inventory = [
    1 => ['name' => 'Example Product', 'quantity' => 10, 'price' => 10.00]
];

// Check if the request is POST and contains the necessary data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // Check if the product exists and update the quantity
    if (array_key_exists($productId, $inventory)) {
        $availableQuantity = $inventory[$productId]['quantity'];

        if ($quantity >= 0 && $quantity <= $availableQuantity) {
            // Calculate the total price
            $totalPrice = $quantity * $inventory[$productId]['price'];

            // Simulate updating the inventory
            $newAvailableQuantity = $availableQuantity - $quantity;

            echo json_encode([
                'success' => true,
                'new_quantity' => $newAvailableQuantity,
                'total_price' => $totalPrice
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid quantity. The quantity must be between 0 and ' . $availableQuantity . '.'
            ]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Product not found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>