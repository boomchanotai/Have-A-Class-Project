<?php
    include_once "engine.php";
    include_once "datamanager.php";

    $datamanger = new datamanager($conn);
    if($_SESSION['role'] != 1 && $_SESSION['role'] != 2){
        header("location: ../index.php");
    } else {
        // Subject list
        $subjectList = "SELECT * FROM subjects";
        $subjectList = $conn->query($subjectList);
        $subjectList = $subjectList->fetch_all();      
?>

        <table class="postlist">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อวิชา</th>
                    <th>Subject</th>
                    <th>แก้ไข</th>
                </tr>
            </thead>
            <tbody>
<?php
                foreach ($subjectList as $key => $value){
?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value['1'];?></td>
                    <td><?php echo $value['2']; ?></td>
                    <td><button class="btn-view" id="btn-edit-subject-<?php echo $value['0']; ?>">Edit</button></td>
                    <input type="hidden" id="edit-subject" value="<?php echo $value['0']; ?>">
                </tr>
<?php
                }
?>
            </tbody>
        </table>
        
<?php
    }
?>