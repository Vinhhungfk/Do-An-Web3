<?php include('header.php'); ?>

<!-- bat dau cua MAIN BODY -->

<div id="main">
<div id="trai">

<div class="list21">
<div class="list1">
    
Chỉ Cập Nhật được Thông tin của chính bạn!
<hr>

<?php
if (count($_FILES) > 0 && isset($_SESSION['userindex'])) 
{
  $Ten= $_SESSION['userindex'];
   if (is_uploaded_file($_FILES['userImage']['tmp_name']))
   {
       $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
       $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

       mysqli_query($ketnoi, "UPDATE users SET ImgData='$imgData' where Username =N'$Ten'");
       echo '<div class="xah">Đổi avt thành công!</div>';           
   }
}
?>

  <form enctype="multipart/form-data" action="" method="post">
  <br><input name="userImage" type="file" style="width:70px" /> 
  <input type="submit" value="Thay avt" />
  <br></form> 

    <form style="" method="POST" action=""><br>
    <b> Ngày Tháng Năm Sinh</b><br>
    <input type="date" style="width:230px" name="NgaySinh" ><br><br>
    <b> Số Điện Thoại</b><br>
    <input type="tel" style="width:230px" name="Sdt"><br>
    <b> Giới Tính</b><br>
    <input name="GioiTinh" type="radio" value="Nam" checked="checked"/>Nam
    <input name="GioiTinh" type="radio" value="Nữ" />Nữ
    <input name="GioiTinh" type="radio" value="Khác" />Khác<br><br>
    <input type="submit" style="width:242px" name="CapNhat" value="Cập Nhật Thông Tin"><p></p>
    </form>
    
    <?php
if (isset($_POST["CapNhat"]) && isset($_SESSION['userindex'])) 
{ 
  echo'<div class="xah">';
  $Ten= $_SESSION['userindex'];
  $GioiTinh = $_POST["GioiTinh"];
  $NgaySinh = $_POST["NgaySinh"];
  $Sdt = $_POST["Sdt"];
  

  if ($NgaySinh == "" || $GioiTinh == "" || $Sdt == "" )
      {
          echo '* Vui Lòng Điền cho Đủ Thông Tin!<br>';
      }
  else
      {
        mysqli_query($ketnoi,"UPDATE users SET NgaySinh='$NgaySinh',GioiTinh=N'$GioiTinh',Sdt='$Sdt' WHERE Username =N'$Ten'"); 	
        echo 'Đã Cập Nhật Thông Tin Cho <b>'.$Ten.'</b> Thành Công';
      }
      echo'</div>';
  }
  ?>



</div>
</div>

<br>

<div class="list21">
<div class="list1">


<input class="toggle-box" id="identifier-1" type="checkbox" >
    <label for="identifier-1">Đổi mật Khẩu!</label>
    <div>
        <form style="" method="POST" action=""><br>
        <b>Mật Khẩu Cũ</b><br>
        <input type="text" style="width:230px"  name="pass1" ><br>
        <b>Mật Khẩu Mới</b><br>
        <input type="text" style="width:230px"  name="pass2" ><br>
        <input type="submit" style="width:242px" name="DoiMk" value="Đổi Mật Khẩu"><p></p>
        </form>
</div>



<?php
if (isset($_POST["DoiMk"]) && isset($_SESSION['userindex'])) 
{  
      echo'<div class="xah">';
      $Ten= $_SESSION['userindex'];
      //pass
      $pass1 = $_POST["pass1"];
      $pass2 = $_POST["pass2"];
      if($pass1 == "" || $pass2 == "")
      {
        echo'* Vui lòng nhập đủ mật khẩu cũ và mới<br>';
        
      }
      else
      {
        $result = mysqli_query($ketnoi,"select Password FROM users WHERE Username = '$Ten'"); 
        if ($result) 
            {  
              $row=mysqli_fetch_row($result);
                  {
                    $checkpass=$row[0];// lấy pass gán vô checkpass
                  }
                  
                if($checkpass!=$pass1)
                  {
                    echo'* Xin lỗi mật khẩu cũ chưa đúng!';
                  }
                else
                  {
                    $query = mysqli_query($ketnoi,"update users set Password = '$pass2' where Username = '$Ten' ");
                    echo " mật khẩu của bạn đã được đổi!";
                  }
            }
            
        }
       
        echo'</div>';
}
?>
</div>
</div>
</div>




<div id="phai">

<div class="list21" >
<div class="list1">

<?php
   if(isset($_GET['user']))
   {
     $Ten=($_GET['user']);
     $result = mysqli_query($ketnoi, "SELECT * FROM users  where Username =N'$Ten' ");        
        if ($result) 
            {
                while ($row=mysqli_fetch_row($result)) 
                {
?>
                  <div class="list1" style="background:url('http://thuvienanhdep.net/wp-content/uploads/2015/10/nhung-anh-bia-facebook-dep-y-nghia-va-an-tuong-ve-on-nghia-cha-me-2.jpg');" > 
                  <br><br><br><br><br><br><br><br><br><br><br><br><br><br> </div>



<?php                           
                  echo' <table style="margin:-90px 0px 0px 30px"><td>';
                  if($row[9] != null)// nếu user có ảnh thì xuất ảnh ra
                  {
                    $resultAVT = mysqli_query($ketnoi, "SELECT ImgData FROM users where Username =N'$Ten' ");
                    $AVT = mysqli_fetch_array($resultAVT);
                    echo ' <img id="x" style="border:1px solid #ccc;border-radius:100px;padding:2px" src="data:image/jpeg;base64,'.base64_encode( $AVT['ImgData'] ).'"   height="120px" width="120px"/>';
                  }
                  else// ko có ảnh thì no images
                  {
                    echo ' <img id="zoom" src="https://ataxavi.vn/theme/admin/images/noimage.png" style="border-radius:100px" height="120px" width="120px" />';
                  }                 


                    echo'</td><td>
                    <a style="color:white;font-weight:bold;font-size:20px;margin-left:10px" href="Profile.php?user='.$Ten.'">'.$row[1].'</a>
                            </td></table> ';

                    echo'<div class="#list1" style=""><table><td>• Tên tài khoản: <a href="Profile.php?user='.$Ten.'">'.$row[1].'</a><br><br>
                    • Email: '.$row[3].'<br><br>
                    • Ngày Sinh: '.$row[6].'<br></td><td>
                    • Giới Tính: '.$row[7].'<br><br>
                    • Số Điện Thoại: '.$row[8].'<br><br>
                    • Thành Viên Thứ: #'.$row[0].'   </td></table></div></div>';
                  }
                 mysqli_free_result($result);
            }
    }
?>





<?php // hiển thị sTT trong sql
  if(isset($_GET['user']))
  {
    $Ten = ($_GET['user']);
    $result = mysqli_query($ketnoi, "SELECT * FROM tinmoi where Username=N'$Ten' ORDER BY ID DESC ");
                    
           if ($result) 
                {
                    while ($row=mysqli_fetch_row($result)) 
                    {
                      echo '<div class="list1" style ="margin-bottom:4px">';
                        echo' <table><td>';

                        // lấy ảnh từ table users nên bắt buộc phải tạo reuslt avt
                        $resultAVT = mysqli_query($ketnoi, "SELECT ImgData FROM users where Username =N'$row[1]' ");
                        $AVT = mysqli_fetch_array($resultAVT);
                        echo ' <img src="data:image/jpeg;base64,'.base64_encode( $AVT['ImgData'] ).'" height="25px" width="25px" style="border-radius:100px;boder:1px solid #ddd;"/>';
                        echo '</td><td>';
                        
                        if($row[1]=='admin')// nếu là admin thì nick màu #
                          {
                            echo'<a  class="font" style="color:#f00" href="Profile.php?user='.$row[1].'">Hung Vinh</a><img src="http://aichat.wap.sh/lv/admin.gif" width="30px"><br>';
                          }
                        else  // ko phải admin thì..
                          {
                            echo'<b><a href="Profile.php?user='.$row[1].'">'.$row[1].'</a></b>   <br>';
                          }
                        echo'<small>Đăng lúc '.$row[3]. '';

                        //  Nút Xóa Bài
                        echo '<a title="bài ai người nấy xóa nha!!!!" style="background:#f9f9f9;padding:1px;border-radius:4px" href="XuLy.php?get_id_xoa='.$row[0].'"> Xóa bài #'.$row[0].'</a></small>';
                       
       

                        echo'</td></table><p>'.$row[2].'</p>';   
                        if($row[4] != null)// nếu mục ảnh ko trống thì hiển thị
                          {
                            echo '<img id="zoom" src="data:image/jpeg;base64,'.base64_encode( $row[4] ).'"width="300px"/>';
                          }
                          
                          // hiển thị like
                          echo '<p> <a class="list5" style="padding:1px" href="XuLy.php?get_id='.$row[0].'">'.$row[5].' like</a>';
                        
                         echo'</div>';
                    }
                    mysqli_free_result($result);
                }
}
?>












<div class="list1">
  alo 123 test
</div></div>
















</div></div>


<?php
include('footer.php');
?>