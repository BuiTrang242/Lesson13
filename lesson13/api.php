<?php
require_once('./dbconnect.php');
// nhan api

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


if(isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add':
            add_product($_POST['product'], $conn);
            break;
        case 'delete':
            delete_product($_POST['id'], $conn);
            break;
        case 'edit':
            edit_product($_POST['id'], $conn);
            break;
        case 'update':
            update_product($_POST['product'], $conn);
            break;
        case 'search':
            search_product($_POST['name'], $conn);
            break;
    }
}
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'view':
            view_product($conn);
            break;
    }
}
// hanle add product
function add_product($product, $conn) {
    $sql = "INSERT INTO products (name, price, description, manufacturer) VALUES (:name, :price, :description, :manufacturer)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name' => $product['name'],
        'price' => $product['price'],
        'description' => $product['description'],
        'manufacturer' => $product['manufacturer']
    ]);
    // tra ve ket qua
    echo json_encode([
        'status' => true,
        'message' => 'Them thanh cong'
    ]);
}

function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function view_product($conn) {
    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $html = '';
    foreach($result as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $row['name'] . '</td>';
        $html .= '<td>' . $row['price'] . '</td>';
        $html .= '<td>' . $row['description'] . '</td>';
        $html .= '<td>' . $row['manufacturer'] . '</td>';
        $html .= '<td><button type="button" onclick="editProduct(' . $row['id'] . ')" class="btn btn-primary btn-warning">Sửa</button> <button type="button" onclick="deleteProduct(' . $row['id'] . ')" class="btn btn-danger delete-btn">Xóa</button></td>';
        $html .= '</tr>';
    }
    echo $html;
}

function delete_product($id, $conn) {
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);

    echo json_encode([
        'status' => true,
        'message' => 'Xoa thanh cong'
    ]);
 
}

function edit_product($id, $conn) {
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
   

}
function update_product($product, $conn) {

    $sql = "UPDATE products SET name = :name, price = :price, description = :description, manufacturer = :manufacturer WHERE id = :id";
 
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name' => $product['name'],
        'price' => $product['price'],
        'description' => $product['description'],
        'manufacturer' => $product['manufacturer'],
        'id' => $product['id']
    ]);
    echo json_encode([
        'status' => true,
        'message' => 'Cap nhat thanh cong'
    ]);
}
function search_product($name, $conn){
    $name = "%$name%";
    $sql = "SELECT * from products where name like :name";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name' => $name,
     
    ]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $html = '';
    foreach($result as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $row['name'] . '</td>';
        $html .= '<td>' . $row['price'] . '</td>';
        $html .= '<td>' . $row['description'] . '</td>';
        $html .= '<td>' . $row['manufacturer'] . '</td>';
        $html .= '<td><button type="button" onclick="editProduct(' . $row['id'] . ')" class="btn btn-primary btn-warning">Sửa</button> <button type="button" onclick="deleteProduct(' . $row['id'] . ')" class="btn btn-danger delete-btn">Xóa</button></td>';
        $html .= '</tr>';
    }
    echo $html;
}