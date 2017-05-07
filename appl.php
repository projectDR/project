<?php
    require_once("classes/application_class.php");
    require_once("classes/DBWorking_class.php");
?>

<!DOCTYPE html>
<html lang="ru">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form class = "form-horizontal">
    <h1 class="h1">Форма заявки</h1>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Имя пользователя</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" placeholder="Dima pedar"
                   pattern="^[А-Яа-яЁё\s]+$" required>
        </div>
    </div>
    <div class="form-group">
        <label for="department" class="col-sm-3 control-label">Отдел</label>
        <div class="col-sm-5">
            <select class="form-control" id = "department">
                <option selected></option>
                <?php
                    $db = new DBWorking_class("project_bd", "Root123");
                    $depArray = $db->query("SELECT department_name, id FROM department");

                    foreach ($depArray as $item)
                    {
                        echo "<option value= $item[1] >".$item[0]."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="position" class="col-sm-3 control-label">Должность</label>
        <div class="col-sm-5">
            <select class="form-control" id = "position">
                <?php
                $department =
                $brArray = $db->query("SELECT position_name FROM position");

                foreach ($brArray as $item)
                {
                    echo "<option>".$item[0]."</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5"></div>
    </div>
    <div class="form-group">
        <label for="brtype" class="col-sm-3 control-label">Тип поломки ануса</label>
        <div class="col-sm-5">
            <select class="form-control" id = "brtype">
                <?php
                $brArray = $db->query("SELECT appl_type_name FROM application_type");

                foreach ($brArray as $item)
                {
                    echo "<option>".$item[0]."</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="urgency" class="col-sm-3 control-label">Срочность</label>
        <div class="col-sm-5">
            <select class="form-control" id = "urgency">
                <option>small</option>
                <option>hurry</option>
                <option>Zhopa-Gorit</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Опишите </label>
        <div class="col-sm-5">
            <textarea class="form-control" rows="10" id = "description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3">
            <button class="btn" type="submit">Отправить заявку</button>
        </div>
    </div>
</form>
</body>
</html>