<?php
    include_once "include/header.php";
?>
</section>
<?php  

    $getList = "SELECT MAX(ID) FROM tutorpublish";
    $getList = $conn->query($getList);
    $getList = $getList->fetch_all();
    $getList = $getList[0][0];
    // for next/pre btn i checking how many page is
    $pageList = $getList /8 +1;
    $pageList = (int) $pageList;

    if(!isset($_GET['post'])){ 
        if(!isset($_GET['page'])){
            $_GET['page'] = 1;
        }
        if($_GET['page'] > $pageList){
            include "include/404.php";
        } elseif($_GET['page'] < 1){
            include "include/404.php";
        } else { ?>
        <!-- area -- see all -->
<section class="main-list">
    <h3 class="title-text"><span>Tutor</span></h3>
        <div class="item">
            <?php 

                $per = 8;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $start = ($page - 1) * $per;
                $publishtutor = $datamanager->callpublishtutor($start, $per);

                foreach ($publishtutor as $key => $value){ ?>


        <div class="card">
                <?php
                    $post = $datamanager->getData($value['4']);
                    if($post['image'] == null){ ?>
                        <img src="img/profile_pic.png" alt="" class="postimg">
                <?php    } else { ?>
                        <img src="img/profile/<?php echo $post['image']; ?>" alt="" class="postimg shadow">
                <?php } ?>
                <div>วิชา <?php $datamanager->subjectdata($value['1']); ?></div>
                <div>เรื่อง <?php echo $value['2']; ?></div>
                <div>สอนโดย <?php $datamanager->getName($value['4']); ?></div>
                <div id="description-<?php echo $value['0']; ?>">
                    <?php 
                        echo $value['9'];
                    ?>
                </div>
                <div>
                    <div class="price"><?php echo $value['6']; ?></div>
                    <div class="price"><?php echo $value['8']; ?></div>
                </div>
                <div>
                    <a href="post.php?post=<?php echo $value['0']; ?>"><button class="btn btn-dark"><i class="fa fa-info-circle iconfont" aria-hidden="true"></i> <p class="btn-moredetail">รายละเอียด</p></button></a>
                </div>
            </div>


            <?php    }
            ?>
            
        </div>
        <div class="next-pre-btn">
            <?php 
                if($page != 1){ ?>
                    <a href="post.php?page=<?php echo $page - 1 ?>" class="previous round">&#8249;</a>
            <?php    }
            ?>
            <?php
                if($page != $pageList){ ?>
                    <a href="post.php?page=<?php echo $page + 1 ?>" class="next round">&#8250;</a>
            <?php    }
            ?>
        </div>


</section>

<?php        }
    } elseif($_GET['post'] > $getList){
        include "include/404.php";
    } elseif($_GET['post'] < 1){
        include "include/404.php";
    } elseif(isset($_GET['post'])){ 
        $id = $_GET['post'];
        $data = "SELECT * FROM tutorpublish WHERE ID='$id'";
        $data = $conn->query($data);
        $data = $data->fetch_assoc();
        $user = $datamanager->getData($data['user']);
        
?>


        <!-- area -->
<section class="post">
                <?php
                    if($user['image'] == null){ ?>
                        <img src="img/profile_pic.png" alt="" class="postimgpage">
                <?php    } else { ?>
                        <img src="img/profile/<?php echo $user['image']; ?>" alt="" class="postimgpage shadow">
                <?php } ?>
    <table>
        <tbody>
            <tr>
                <th>วิชา</th>
                <td><?php $datamanager->subjectdata($data['subject']); ?></td>
            </tr>
            <tr>
                <th>หัวข้อ</th>
                <td><?php echo $data['topic']; ?></td>
            </tr>
            <tr>
                <th>ราคา</th>
                <td><?php echo $data['price']; ?> / คน / ชั่วโมง</td>
            </tr>
            <tr>
                <th>รูปแบบการสอน</th>
                <td><?php $datamanager->studiestypedata($data['type']); ?></td>
            </tr>
            <tr>
                <th>สถานที่ (บริเวณ)</th>
                <td><?php echo $data['place']; ?></td>
            </tr>
            <tr>
                <th>อายุผู้เรียน</th>
                <td><?php echo $data['agestu']; ?></td>
            </tr>
            <tr>
                <th>รายละเอียดเพิ่มเติม</th>
                <td><?php echo $data['description']; ?></td>
            </tr>
            <tr>
                <th>รายละเอียดผู้สอน</th>
                <td></td>
            </tr>
            <tr>
                <th>ผู้สอน</th>
                <td><?php $datamanager->prefixdata($user['prefix']); echo " " . $user['thaifirstname'] . " " . $user['thailastname'] . " (" . $user['thainickname'] . ")"; ?></td>
            </tr>
                        <tr>
                <th>ระดับการศึกษา</th>
                <td><?php $datamanager->educationdata($user['education']); ?></td>
            </tr>
            <tr>
                <th>อายุ</th>
                <td><?php echo $user['age'] . " ปี"; ?></td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td><a href="<?php echo $user['urlfacebook'] ?>" target="_blank" rel="noopener noreferrer"><?php echo $user['facebook']; ?></a></td>
            </tr>
            <tr>
                <th>Line ID</th>
                <td><?php echo $user['lineid']; ?></td>
            </tr>
            <tr>
                <th>Tel. (เบอร์โทรศัพท์)</th>
                <td><?php echo $user['tel'] ?></td>
            </tr>
        </tbody>
    </table>
</section>




<?php    } else {
            header("location: index.php");
        }
?>
<?php
    include_once "include/footer.php";
?>