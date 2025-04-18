<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Lab5</title>
</head>
<body>
    <div id="form">
        <form action="save.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="category">Категория</label>
            <select name="category" required>
                <?php
                $categories = [];
                if (file_exists('Категории') && is_dir('Категории')) {
                    $dirs = scandir('Категории');
                    foreach ($dirs as $dir) {
                        if ($dir !== '.' && $dir !== '..' && is_dir("Категории/{$dir}")) {
                            $categories[] = $dir;
                        }
                    }
                }
                foreach ($categories as $ctg) {
                    echo "<option value=\"{$ctg}\">{$ctg}</option>";
                }
                ?>
            </select>

            <label for="title">Объявление</label>
            <input type="text" name="title" required>
            
            <label for="description">Описание:</label>
            <textarea name="description" rows ="3" placeholder="Введите описание объявления:"></textarea>

            <button type="submit">Сохранить объявление</button>
        </form>
    </div>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th>Категория</th>
                    <th>Email</th>
                    <th>Объявление</th>
                    <th>Описание объявления</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $table = [];
                foreach ($categories as $category) {
                    $emails = scandir("Категории/{$category}");
                    foreach ($emails as $email) {
                        if ($email === '.' || $email === '..') continue;
                        $files = scandir("Категории/{$category}/{$email}");
                        foreach ($files as $file) {
                            if ($file === '.' || $file === '..') continue;
                            $title = str_replace('.txt', '', $file);
                            $description = file_get_contents("Категории/{$category}/{$email}/{$file}");

                            $table[] = [
                                'category' => $category,
                                'email' => $email,
                                'title' => $title,
                                'description' => $description
                            ];
                        }
                    }
                }
                if (!empty($table)) {
                    foreach ($table as $row) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['category']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>