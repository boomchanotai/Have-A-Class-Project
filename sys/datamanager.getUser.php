<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // UserList
        $userList = "SELECT * FROM user";
        $userList = $conn->query($userList);
        $userList = $userList->fetch_all();      
?>

        <table class="postlist browse" id="be-user">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>ชื่อ-สกุล</th>
                    <th>email</th>
                    <th>lastlogin</th>
                    <!--th>แก้ไข</th-->
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($userList as $key => $value){
?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value['2'];?></td>
                    <td><?php echo $value['6'] . " " . $value['7']; ?></td>
                    <td><?php echo $value['4']; ?></td>
                    <td><?php echo $value['24']; ?></td>
                    <!--td><button class="btn-view" id="btn-edit-user">Edit</button></td>
                    <input type="hidden" id="edit-user" value="<?php echo $value['0']; ?>"-->
                </tr>
<?php
                }
?>
            </tbody>
        </table>
        
<?php
    }
?>