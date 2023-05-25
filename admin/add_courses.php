<?
include "nav.php";
?>
<?

$req = "SELECT * FROM `courses`";
$result = mysqli_query($link, $req);
$courses = array();
while ($row = mysqli_fetch_assoc($result))
    $courses[] = $row;
?>

    <form method="POST" enctype = "multipart/form-data">
        <div class="label-float">
            <input type="text" name="month" autocomplete="off" placeholder=" "/>
            <label>Продолжительность</label>
        </div>
        <div class="label-float">
            <input type="text" name="name" autocomplete="off" placeholder=" "/>
            <label>Название</label>
        </div>
        <div class="label-float">
            <input type="text" name="text" autocomplete="off" placeholder=" "/>
            <label>Информация</label>
        </div>
        <div class="label-float">
            <input type="text" name="vacancies" autocomplete="off" placeholder=" "/>
            <label>Вакансии</label>
        </div>
        <div class="label-float">
            <input type="text" name="salary" autocomplete="off" placeholder=" "/>
            <label>Зарплата</label>
        </div>

        <p>Изображение <input type="file" name="img"></p>

        
        <p><input type="submit" name="ok" value="Добавить" class="btn1"></p>
    </form>


<?
if ($_POST['ok']) {
    $month = $_POST['month'];
    $name = $_POST['name'];
    $text = $_POST['text'];

    $vacancies = $_POST['vacancies'];
    $salary = $_POST['salary'];

    $img_name = $_FILES['img']['name'];
    copy($_FILES['img']['tmp_name'], '../img/'.$img_name);
    $req = "INSERT INTO `courses`(`month`, `name`, `text`, `vacancies`, `salary`, `img`) VALUES ($month,'$name','$text','$vacancies','$salary','$img_name')";
    mysqli_query($link,$req) or die(mysqli_error($link));
}
?>

<?
include "footer.php";
?>