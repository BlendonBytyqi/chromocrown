<?php
require_once __DIR__ . '/admin_guard.php';
require_once __DIR__ . '/db.php';

$db = new Database();
$conn = $db->connect();

$flash = "";


if (isset($_POST['add_product'])) {
    $name = trim($_POST['name'] ?? '');
    $desc = trim($_POST['description'] ?? '');

    if ($name === '' || $desc === '') {
        $flash = "❌ Mbushi emrin dhe pershkrimin.";
    } else {
    
        $imgPath = '';
        if (!empty($_FILES['image']['name'])) {
            $dir = __DIR__ . "/images/products";
            if (!is_dir($dir))
                mkdir($dir, 0777, true);

            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($ext, $allowed)) {
                $flash = "❌ Foto e pavlefshme. Lejohet: jpg, jpeg, png, webp";
            } else {
                $fileName = "p_" . time() . "_" . rand(1000, 9999) . "." . $ext;
                $full = $dir . "/" . $fileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $full)) {
                    $imgPath = "images/products/" . $fileName;
                } else {
                    $flash = "❌ Upload deshtoi.";
                }
            }
        } else {
            $flash = "❌ Zgjedh nje foto.";
        }

        if ($flash === "") {
            $stmt = $conn->prepare("INSERT INTO products (name, description, image, created_by) VALUES (:n,:d,:i,:c)");
            $ok = $stmt->execute([
                ':n' => $name,
                ':d' => $desc,
                ':i' => $imgPath,
                ':c' => $_SESSION['user_id'] ?? null
            ]);
            $flash = $ok ? "✅ Produkti u shtua." : "❌ Gabim ne DB.";
        }
    }
}


if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

  
    $get = $conn->prepare("SELECT image FROM products WHERE id=:id");
    $get->execute([':id' => $id]);
    $row = $get->fetch();

    $stmt = $conn->prepare("DELETE FROM products WHERE id=:id");
    $stmt->execute([':id' => $id]);

    if ($row && !empty($row['image'])) {
        $file = __DIR__ . "/" . $row['image'];
        if (is_file($file))
            @unlink($file);
    }

    header("Location: admin_products.php");
    exit;
}


$editProduct = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
    $stmt->execute([':id' => $id]);
    $editProduct = $stmt->fetch();
}

if (isset($_POST['update_product'])) {
    $id = (int) ($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $desc = trim($_POST['description'] ?? '');
    $currentImage = $_POST['current_image'] ?? '';

    if ($id <= 0 || $name === '' || $desc === '') {
        $flash = "❌ Mbushi te gjitha fushat.";
    } else {
        $imgPath = $currentImage;

    
        if (!empty($_FILES['image']['name'])) {
            $dir = __DIR__ . "/images/products";
            if (!is_dir($dir))
                mkdir($dir, 0777, true);

            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($ext, $allowed)) {
                $flash = "❌ Foto e pavlefshme. Lejohet: jpg, jpeg, png, webp";
            } else {
                $fileName = "p_" . time() . "_" . rand(1000, 9999) . "." . $ext;
                $full = $dir . "/" . $fileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $full)) {
                    $imgPath = "images/products/" . $fileName;

                 
                    $old = __DIR__ . "/" . $currentImage;
                    if (is_file($old))
                        @unlink($old);
                } else {
                    $flash = "❌ Upload deshtoi.";
                }
            }
        }

        if ($flash === "") {
            $stmt = $conn->prepare("UPDATE products SET name=:n, description=:d, image=:i WHERE id=:id");
            $ok = $stmt->execute([
                ':n' => $name,
                ':d' => $desc,
                ':i' => $imgPath,
                ':id' => $id
            ]);
            header("Location: admin_products.php");
            exit;
        }
    }
}

$stmt = $conn->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Products | CHROMOCROWN</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background: #000;
            color: #fff;
            padding: 15px 30px;
            font-weight: bold;
        }

        .wrap {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
            margin-bottom: 20px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 8px;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        button {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            background: #3498db;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            margin-top: 12px;
        }

        button:hover {
            background: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: left;
            vertical-align: top;
        }

        img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
        }

        .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .flash {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .ok {
            background: #e9f7ef;
            color: #1e8449;
        }

        .bad {
            background: #fdecea;
            color: #c0392b;
        }
    </style>
</head>

<body>


<header style="display:flex;justify-content:space-between;align-items:center;">
  <div>ADMIN - PRODUCTS</div>

  <a href="logout.php" style="
      color:#fff;
      text-decoration:none;
      font-weight:bold;
      background:rgba(255,255,255,0.15);
      padding:8px 12px;
      border-radius:8px;
  ">Logout</a>
</header>

    <div class="wrap">

        <?php if ($flash): ?>
            <div class="flash <?= str_starts_with($flash, '✅') ? 'ok' : 'bad' ?>">
                <?= htmlspecialchars($flash) ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <?php if ($editProduct): ?>
                <h2>Edit Product</h2>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= (int) $editProduct['id'] ?>">
                    <input type="hidden" name="current_image" value="<?= htmlspecialchars($editProduct['image']) ?>">

                    <label>Name</label>
                    <input name="name" value="<?= htmlspecialchars($editProduct['name']) ?>" required>

                    <label>Description</label>
                    <textarea name="description" required><?= htmlspecialchars($editProduct['description']) ?></textarea>

                    <label>New Image (optional)</label>
                    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">

                    <button type="submit" name="update_product">Update</button>
                    <a href="admin_products.php" style="margin-left:12px;">Cancel</a>
                </form>

            <?php else: ?>
                <h2>Add Product</h2>
                <form method="POST" enctype="multipart/form-data">
                    <label>Name</label>
                    <input name="name" placeholder="Casio G-Shock" required>

                    <label>Description</label>
                    <textarea name="description" placeholder="Shock-resistant..." required></textarea>

                    <label>Image</label>
                    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required>

                    <button type="submit" name="add_product">Add</button>
                </form>
            <?php endif; ?>
        </div>

        <div class="card">
            <h2>All Products</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $p): ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars($p['image']) ?>" alt=""></td>
                            <td><?= htmlspecialchars($p['name']) ?></td>
                            <td><?= htmlspecialchars($p['description']) ?></td>
                            <td class="actions">
                                <a href="admin_products.php?edit=<?= (int) $p['id'] ?>">Edit</a>
                                <a href="admin_products.php?delete=<?= (int) $p['id'] ?>"
                                    onclick="return confirm('Fshi produktin?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>