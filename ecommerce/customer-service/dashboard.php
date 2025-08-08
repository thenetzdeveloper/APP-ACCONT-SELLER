<?php
include 'db.php';
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Dashboard</title>
  <link rel="icon" href="../home/logo/logome.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="../home/logo/logome.png">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f9f9f9;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
      opacity: 0;
      transform: translateY(-20px);
      transition: all 0.5s ease-out;
    }

    h2.visible {
      opacity: 1;
      transform: translateY(0);
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      border-radius: 8px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 12px 15px;
      text-align: left;
      transition: all 0.3s ease;
    }

    th {
      background-color: #4CAF50;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s ease-out;
    }

    tr.visible {
      opacity: 1;
      transform: translateY(0);
    }

    tr:hover td {
      background-color: #e6f7ff;
      transform: scale(1.01);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .delete-btn {
      background-color: #f44336;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .delete-btn:hover {
      background-color: #d32f2f;
    }

    @media screen and (max-width: 600px) {
      table {
        display: block;
        overflow-x: auto;
      }
    }
  </style>
</head>

<body>
  <a href="../admin/index.php" style="
    display:inline-block;
    margin-top:20px;
    padding:10px 24px;
    background:#4f8cff;
    color:#fff;
    border-radius:6px;
    text-decoration:none;
    font-size:16px;
    font-weight:600;
    transition:background 0.2s;
" onmouseover="this.style.background='#f11414ff'" onmouseout="this.style.background='#4f8cff'">
    ថយក្រោយ</a>
  <h2>សាររបស់អតិថិជន</h2>
  <table>
    <tr>
      <th>ល.រ</th>
      <th>ឈ្មោះ</th>
      <th>អ៊ីម៉ែល</th>
      <th>សាររបស់អតិថិជន</th>
      <th>កាលបរិច្ឆេទ</th>
      <th>សកម្មភាព</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= $row['created_at'] ?></td>
        <td>
          <form action="delete-message.php" method="POST" style="display:inline;">
            <input type="hidden" name="message_id" value="<?= $row['id'] ?>">
            <button type="submit" class="delete-btn" onclick="return confirm('តើអ្នកពិតជាចង់លុបសារនេះមែនទេ?')">លុប</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const heading = document.querySelector('h2');
      setTimeout(() => {
        heading.classList.add('visible');
      }, 100);

      const rows = document.querySelectorAll('tr');

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
    });
  </script>
</body>

</html>