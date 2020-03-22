<?php
    include_once "include/header.php";
    include_once "sys/datamanager.php";

    $datamanager = new datamanager($conn);
?>
</section>
<section>
    <div class="container shadow">
        <form>
            <div class="image-upload">
            <label for="profile-input">
                <svg width="150px" viewBox="0 0 698 698" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.5">
                    <path opacity="0.5" d="M349 698C541.747 698 698 541.747 698 349C698 156.253 541.747 0 349 0C156.253 0 0 156.253 0 349C0 541.747 156.253 698 349 698Z" fill="url(#paint0_linear)"/>
                    </g>
                    <path d="M349.68 688.41C538.363 688.41 691.32 535.453 691.32 346.77C691.32 158.087 538.363 5.13 349.68 5.13C160.997 5.13 8.04001 158.087 8.04001 346.77C8.04001 535.453 160.997 688.41 349.68 688.41Z" fill="#F5F5F5"/>
                    <path d="M350 689.76C416.757 689.869 482.068 670.323 537.79 633.56C525.2 564.76 477.29 560.84 477.29 560.84H213.09C213.09 560.84 167.88 564.55 153.76 627.84C211.209 668.251 279.762 689.881 350 689.76V689.76Z" fill="#343458"/>
                    <path d="M346.37 504.47C437.442 504.47 511.27 430.642 511.27 339.57C511.27 248.498 437.442 174.67 346.37 174.67C255.298 174.67 181.47 248.498 181.47 339.57C181.47 430.642 255.298 504.47 346.37 504.47Z" fill="#333333"/>
                    <path opacity="0.1" d="M293.15 476.92H398.81V561.45C398.81 575.458 393.247 588.892 383.344 598.799C373.44 608.706 360.008 614.275 346 614.28V614.28C331.989 614.28 318.551 608.714 308.644 598.806C298.736 588.899 293.17 575.461 293.17 561.45V476.92H293.15Z" fill="black"/>
                    <path d="M296.5 473H395.5C396.388 473 397.241 473.353 397.869 473.981C398.497 474.609 398.85 475.462 398.85 476.35V557.53C398.851 564.47 397.485 571.343 394.83 577.755C392.174 584.167 388.281 589.993 383.373 594.9C378.465 599.807 372.638 603.699 366.226 606.353C359.813 609.008 352.94 610.373 346 610.37V610.37C331.989 610.37 318.551 604.804 308.644 594.896C298.736 584.989 293.17 571.551 293.17 557.54V476.35C293.17 475.465 293.52 474.616 294.144 473.988C294.768 473.361 295.615 473.005 296.5 473V473Z" fill="#FDB797"/>
                    <path opacity="0.1" d="M293.34 516.82C327.393 529.543 364.877 529.645 399 517.11V504.11H293.34V516.82Z" fill="black"/>
                    <path d="M346.37 523.89C430.014 523.89 497.82 456.084 497.82 372.44C497.82 288.796 430.014 220.99 346.37 220.99C262.726 220.99 194.92 288.796 194.92 372.44C194.92 456.084 262.726 523.89 346.37 523.89Z" fill="#FDB797"/>
                    <path opacity="0.1" d="M238.49 234.68C238.49 234.68 302.32 364.24 482.37 289L440.45 223.27L366.14 196.6L238.49 234.68Z" fill="black"/>
                    <path d="M238.49 232.78C238.49 232.78 302.32 362.34 482.37 287.08L440.45 221.35L366.14 194.68L238.49 232.78Z" fill="#333333"/>
                    <path d="M237.93 224C242.234 210.677 249.672 198.582 259.62 188.73C289.41 159.28 338.25 153.07 363.3 119.49C369.3 128.81 364.66 143.14 354.3 147.14C378.3 146.98 406.11 144.88 419.68 125.14C423.034 132.947 424.103 141.546 422.763 149.937C421.423 158.328 417.729 166.166 412.11 172.54C433.38 173.54 456.11 187.94 457.45 209.19C458.37 223.35 449.45 236.75 437.86 244.87C426.27 252.99 412.15 256.72 398.3 259.77C357.86 268.7 211.54 306.07 237.93 224Z" fill="#333333"/>
                    <path d="M194.86 398.72C202.642 398.72 208.95 386.891 208.95 372.3C208.95 357.709 202.642 345.88 194.86 345.88C187.078 345.88 180.77 357.709 180.77 372.3C180.77 386.891 187.078 398.72 194.86 398.72Z" fill="#FDB797"/>
                    <path d="M497.8 398.72C505.582 398.72 511.89 386.891 511.89 372.3C511.89 357.709 505.582 345.88 497.8 345.88C490.018 345.88 483.71 357.709 483.71 372.3C483.71 386.891 490.018 398.72 497.8 398.72Z" fill="#FDB797"/>
                    <defs>
                    <linearGradient id="paint0_linear" x1="349" y1="698" x2="349" y2="0" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#808080" stop-opacity="0.25"/>
                    <stop offset="0.54" stop-color="#808080" stop-opacity="0.12"/>
                    <stop offset="1" stop-color="#808080" stop-opacity="0.1"/>
                    </linearGradient>
                    </defs>
                </svg>
            </label>
            </div>
        <div class="reg">
            <div>
                <label for="Username">Username</label></td>
                <input type="text" placeholder="Username" id="reg-username"></td>
            </div>
            <div>
                <label for="Password">Password</label></td>
                <input type="password" placeholder="Password" id="reg-pass"></td>
            </div>
            <div>
                <label for="confirmPassword">Confirm Password</label></td>
                <input type="password" placeholder="Confirm Password" id="reg-confirmpass"></td>
            </div>
            <div>
                <label for="email">Email</label></td>
                <input type="email" placeholder="Email" id="reg-email"></td>
            </div>
            <div>
                <label for="prefix">คำนำหน้า</label></td>
                <select id="reg-prefix">
                    <option value="0" disabled selected>เลือกคำนำหน้า (Prefix)..</option>
                    <?php
                    $sql = $datamanager->callprefix();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="thai-firstname">ชื่อ</label></td>
                <input type="text" placeholder="ชื่อ (ภาษาไทย)" id="reg-thai-firstname" maxlength="60"></td>
            </div>
            <div>
                <label for="thai-lastname">นามสกุล</label></td>
                <input type="text" placeholder="นามสกุล (ภาษาไทย)" id="reg-thai-lastname" maxlength="60"></td>
            </div>
            <div>
                <label for="thai-nickname">ชื่อเล่น</label></td>
                <input type="text" placeholder="ชื่อเล่น" id="reg-thai-nickname" maxlength="60"></td>
            </div>
            <div>
                <label for="eng-firstname">Firstname</label></td>
                <input type="text" placeholder="Firstname" id="reg-eng-firstname" maxlength="60"></td>
            </div>
            <div>
                <label for="eng-lastname">Lastname</label></td>
                <input type="text" placeholder="Lastname" id="reg-eng-lastname" maxlength="60"></td>
            </div>
            <div>
                <label for="eng-nickname">Nickname</label></td>
                <input type="text" placeholder="Lastname" id="reg-eng-nickname" maxlength="60"></td>
            </div>
            <div>
                <label for="age">อายุ (Age)</label></td>
                <input type="number" placeholder="อายุ" id="reg-age" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2"></td>
            </div>
            <div>
                <label for="sex">เพศ</label></td>
                <select id="reg-sex">
                    <option value="0" disabled selected>เลือกเพศ..</option>
                    <?php
                    $sql = $datamanager->callgender();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="educate"></label>Education</td>
                <select id="reg-educate">
                    <option value="0" disabled selected>เลือกระดับการศึกษา..</option>
                    <?php
                    $sql = $datamanager->calledu();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="district">District</label></td>
                <input type="text" placeholder="แขวง / อำเภอ / บริเวณ ที่อยู่" id="reg-district"></td>
            </div>
            <div>
                <label for="province">Province</label></td>
                <select id="reg-province">
                    <option value="0" disabled selected>เลือกจังหวัด..</option>
                    <?php
                    $sql = $datamanager->callprovince();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +1 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="facebook">Facebook</label></td>
                <input type="text" placeholder="Facebook name" id="reg-facebook" maxlength="255"></td>
            </div>
            <div>
                <label for="facebooklink">URL FaceBook</label></td>
                <input type="text" placeholder="https://www.facebook.com/" id="reg-facebooklink" maxlength="255"></td>
            </div>
            <div>
                <label for="lineid">Line ID</label></td>
                <input type="text" placeholder="Line ID" id="reg-lineid" maxlength="60"></td>
            </div>
            <div>
                <label for="tel"></label>เบอร์ (Tel.)</td>
                <input type="number" placeholder="เบอร์โทรศัพท์" id="reg-tel" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10"></td>
            </div>
            <div>
                <label for="reg-role">ตำแหน่ง</label></td>
                <select id="reg-role">
                    <option value="0" disabled selected>เลือกตำแหน่ง..</option>
                    <?php
                    $sql = $datamanager->callrole();

                    foreach ($sql as $key => $value) { ?>

                    <option value="<?php echo $key +3 ; ?>"><?php echo $value[1]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="agreement">
            <input type="checkbox" name="agreement" id="agreement">
            <label for="agreement">ยอมรับ<a href="#">ข้อตกลงในการใช้บริการ HaveAClass.com</a></label>
        </div>
            <div class="extension">Aready have account? <a href="login.php">Sign in,</a></div>
            <button class="btn btn-submit" type="button" id="btn-signup">Sign up</button>
        </form>
    </div>
</section>
<?php
    include_once "include/footer.php";
?>