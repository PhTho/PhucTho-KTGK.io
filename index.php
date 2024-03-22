<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
</head>
<body>
    <h1>Danh sách nhân viên</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Mã NV</th>
                <th>Tên NV</th>
                <th>Giới tính</th>
                <th>Nơi sinh</th>
                <th>Mã phòng</th>
                <th>Lương</th>
            </tr>
        </thead>
        <tbody>
            <?php

            require_once "query_db.php";

            $totalEmployees = count($employees);
            $employeesPerPage = 5;
            $totalPages = ceil($totalEmployees / $employeesPerPage);
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $startIndex = ($currentPage - 1) * $employeesPerPage;
            $endIndex = $startIndex + $employeesPerPage;
            $currentEmployees = array_slice($employees, $startIndex, $employeesPerPage);

            foreach ($currentEmployees as $employee) {
                echo "<tr>";
                echo "<td>" . $employee["Ma_NV"] . "</td>";
                echo "<td>" . $employee["Ten_NV"] . "</td>";
                echo "<td>";

                if ($employee["Phai"] == "NU") {
                    echo '<img src="img/women.jpg" alt="Woman" width="50">';
                } else {
                    echo '<img src="img/man.jpg" alt="Man" width="50">';
                }
                echo "</td>";
                echo "<td>" . $employee["Noi_Sinh"] . "</td>";
                echo "<td>" . $employee["Ma_Phong"] . "</td>";
                echo "<td>" . $employee["Luong"] . "</td>";
                echo "</tr>";
            }
            
            ?>


            
        </tbody>
    </table>
    <div>
        Trang:
        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
            <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
        <?php endfor; ?>
    </div>


</body>
</html>