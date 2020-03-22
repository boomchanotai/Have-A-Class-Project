<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // provinceList
        $provinceList = "SELECT * FROM province";
        $provinceList = $conn->query($provinceList);
        $provinceList = $provinceList->fetch_all();
?>

        <table class="postlist browse" id="be-province">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th>name</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($provinceList as $key => $value){
?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value['1'];?></td>
                    <td><?php echo $value['2']; ?></td>
                </tr>
<?php
                }
?>
            </tbody>
        </table>
        
<?php
    }
?>