<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // prefixList
        $prefixList = "SELECT * FROM prefix";
        $prefixList = $conn->query($prefixList);
        $prefixList = $prefixList->fetch_all();
?>

        <table class="postlist browse" id="be-prefix">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th>name</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($prefixList as $key => $value){
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