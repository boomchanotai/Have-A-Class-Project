<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // PostList
        $postList = "SELECT * FROM tutorpublish";
        $postList = $conn->query($postList);
        $postList = $postList->fetch_all();      
?>

        <table class="postlist browse" id="be-post">
            <thead>
                <tr>
                    <th>#</th>
                    <th>วิชา : เรื่อง</th>
                    <th>ผู้โพสต์</th>
                    <th>สถานที่</th>
                    <!--th>แก้ไข</th-->
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($postList as $key => $value){
?>
                <tr>
                    <td><?php echo $key +1; ?></td>
                    <td><?php echo $datamanger->subjectdata($value['1']) . " : " . $value['2'] ;?></td>
                    <td><?php echo $datamanger->getName($value['4']); ?></td>
                    <td><?php echo $value['8']; ?></td>
                    <!--td><button class="btn-view" id="btn-edit-post">Edit</button></td>
                    <input type="hidden" id="edit-post" value="<?php // echo $value['0']; ?>"-->
                </tr>
<?php
                }
?>
            </tbody>
        </table>
<?php
    }
?>