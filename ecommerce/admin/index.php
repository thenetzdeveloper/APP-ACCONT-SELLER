<?php
include '../api/db.php';
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="km">

<head>
    <meta charset="UTF-8">
    <title>គ្រប់គ្រងព័ត៏មានកម្មវិធី</title>
    <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../home/logo/logome.png">
    <style>
        :root {
            --primary-color: #4f8cff;
            --success-color: #0ad114;
            --warning-color: #ce6007;
            --danger-color: #ff0000;
            --text-color: #333;
            --light-bg: rgba(255, 255, 255, 0.9);
        }

        body {
            background-image: url('../home/logo/logome.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: var(--text-color);
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.5s ease-out forwards;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.5s ease-out 0.2s forwards;
        }

        .btn {
            display: inline-block;
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            color: white;
            text-align: center;
            border: 2px solid transparent;
        }

        .btn-add {
            background-color: var(--success-color);
        }

        .btn-messages {
            background-color: var(--warning-color);
        }

        .btn-back {
            background-color: var(--danger-color);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: var(--light-bg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-out 0.4s forwards;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            position: sticky;
            top: 0;
        }

        tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.02);
        }

        tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .app-icon-img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .app-icon-img:hover {
            transform: scale(1.5);
        }

        .action-cell {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background-color: orange;
            padding: 6px 12px;
            font-size: 14px;
        }

        .btn-delete {
            background-color: var(--danger-color);
            padding: 6px 12px;
            font-size: 14px;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #666;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        tbody tr {
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.4s ease-out;
        }

        tbody tr.visible {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>

<body>
    <h1>គ្រប់គ្រងព័ត៏មានកម្មវិធី</h1>

    <div class="action-buttons">
        <a class="btn btn-add" href="add-product.php">+ បន្ថែមកម្មវិធី</a>
        <a class="btn btn-messages" href="../customer-service/dashboard.php">មើលសាររបស់អតិថិជន</a>
        <a class="btn btn-back" href="../admin-login/logout.php">ចាក់ចេញ</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ល.រ</th>
                <th>ឈ្មោះកម្មវិធី</th>
                <th>ព័ត៏មាន</th>
                <th>តម្លៃ</th>
                <th>កម្មវិធី</th>
                <th>កែប្រែ</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td>$<?= number_format($row['price'], 2) ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="../<?= htmlspecialchars($row['image']) ?>" class="app-icon-img" alt="<?= htmlspecialchars($row['name']) ?>">
                            <?php else: ?>
                                <div style="width:40px; height:40px; background:#eee; border-radius:8px;"></div>
                            <?php endif; ?>
                        </td>
                        <td class="action-cell">
                            <a class="btn btn-edit" href="edit-product.php?id=<?= $row['id'] ?>">កែសម្រួល</a>
                            <a class="btn btn-delete" href="delete-product.php?id=<?= $row['id'] ?>" onclick="return confirm('តើអ្នកចង់លុបកម្មវីធីនេះមែនឬ?')">លុប</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="no-data">No products found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');

            function checkVisibility() {
                rows.forEach((row, index) => {
                    const rowTop = row.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;

                    if (rowTop < windowHeight * 0.8) {
                        setTimeout(() => {
                            row.classList.add('visible');
                        }, index * 100);
                    }
                });
            }
            checkVisibility();
            window.addEventListener('scroll', checkVisibility);
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    btn.style.transform = 'translateY(-3px)';
                    btn.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
                });

                btn.addEventListener('mouseleave', () => {
                    btn.style.transform = 'translateY(0)';
                    btn.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>

</html>