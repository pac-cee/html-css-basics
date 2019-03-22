<?php
require_once __DIR__ . '/../controllers/auth.php';
require_role(ROLE_ORGANIZER);
require_once __DIR__ . '/../config/db.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $date = $_POST['date'] ?? '';
    $location = trim($_POST['location'] ?? '');
    $seats = intval($_POST['seats'] ?? 0);
    $desc = $_POST['description'] ?? '';
    $image = $_FILES['image'] ?? null;
    $org_id = $_SESSION['user_id'];
    if ($title && $date && $location && $seats > 0 && $desc && $image && $image['tmp_name']) {
        $img_name = uniqid('event_') . '_' . basename($image['name']);
        $img_path = '../assets/images/' . $img_name;
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            $db = new Database();
            $conn = $db->getConnection();
            $stmt = $conn->prepare("INSERT INTO events (organizer_id, title, description, image, location, date, seats_total, seats_available, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')");
            $stmt->bind_param("isssssii", $org_id, $title, $desc, $img_name, $location, $date, $seats, $seats);
            if ($stmt->execute()) {
                $msg = "<span style='color:green'><i class='fas fa-check-circle'></i> Event created! Awaiting admin approval.</span>";
            } else {
                $msg = "<span style='color:red'><i class='fas fa-exclamation-circle'></i> Error: " . htmlspecialchars($stmt->error) . "</span>";
            }
            $stmt->close();
        } else {
            $msg = "<span style='color:red'><i class='fas fa-exclamation-circle'></i> Image upload failed.</span>";
        }
    } else {
        $msg = "<span style='color:red'><i class='fas fa-exclamation-circle'></i> Please fill all fields and upload an image.</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
