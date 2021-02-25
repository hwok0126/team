<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Fashion_Vote_Inquiry</title>
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <style>
      .header {
        background-position:center 43px;
        background-repeat:no-repeat;
        text-align: center;
      }
      .img_center{
        background-position:center 43px;
        background-repeat:no-repeat;
        text-align: center;
        border: 1px solid #BDBDBD;
        margin: auto;
        width: 906px;
      }
      table {
        width: 350px;
      }
      tr, td {
        border: 1px solid #BDBDBD;
        text-align: left;
      }
    </style>
    <script>
    function count_ck(te){
      var chkbox = document.getElementsByName("img[]");
      var chkCnt = 0;
      for (var i = 0; i < chkbox.length; i++) {
        if (chkbox[i].checked){
          chkCnt++;
        }
      }
      if (chkCnt>2) {
        alert("2개를 초과하였습니다.");
        te.checked = false;
        checked -= 1;
      }
    }
    function label_value(){
      var label = document.getElementsByName("img[]");
      for (var i = 0; i < label.length; i++) {
        if (label[i].checked){
            return true;
        }
      }
        alert("투표할 이미지를 선택해주세요");
        return false;

    }
    </script>
  </head>
  <body>
    <?php
        include 'dbcon.php';
        $weather=$_POST["weather"];
        $age=$_POST["age"];
        if($_POST["sex"] == 0){
         $sex = 1;
        }
        else{
         $sex = 0;
        }
       $img_index_array = array(); //이미지 pk배열
       $url_array = array(); // 이미지 URL배열
       $dress_name_array= array(); //이미지 name 배열
       $query="select * from IMAGE where WEATHER='$weather' AND DRESS_SEX='$sex'";
       $result= mysqli_query($con,$query);

       while($row = mysqli_fetch_array($result)){
         array_push($img_index_array,$row[IMG_IND]);
         array_push($url_array,$row[IMG_URL]);
         array_push($dress_name_array,$row[DRE_NAME]);
       }
       //echo count($url_array);
       //for($i=0; $i<count($url_array); $i++){
        // echo $url_array[$i].$img_index_array[$i];
       //}
       mysqli_close($con);
    ?>
    <div>
      <div class="header">
        <h1>이성 패션 투표</h1>
      </div>
      <div class="img_center">
        <form action="update.php" method="post" onsubmit='return label_value();'>
          <input type="hidden" name="age" value=<?php echo $age?>>
          <hgroup>
            <label for="check0"><img src="<?php echo $url_array[0]?>" border="0" width="221" height="306" style="display:block" />
              <input id="check0" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[0]?>><?php echo $dress_name_array[0]?></label>
            <label for="check1"><img src="<?php echo $url_array[1]?>" border="0" width="221" height="306" style="display:block" />
              <input id="check1" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[1]?>><?php echo $dress_name_array[1]?></label>
            <label for="check2"><img src="<?php echo $url_array[2]?>" border="0" width="221" height="306" style="display:block" />
              <input id="check2" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[2]?>><?php echo $dress_name_array[2]?></label>
            <label for="check3"><img src="<?php echo $url_array[3]?>"border="0" width="221" height="306" style="display:block" />
              <input id="check3" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[3]?>><?php echo $dress_name_array[3]?></label>
          </hgroup>
          <hgroup>
            <label for="check4"><img src="<?php echo $url_array[4]?>" border="0" width="221" height="306" style="display:block" />
              <input id="check4" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[4]?>><?php echo $dress_name_array[4]?></label>
            <label for="check5"><img src="<?php echo $url_array[5]?>"border="0" width="221" height="306" style="display:block" />
              <input id="check5" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[5]?>><?php echo $dress_name_array[5]?>
            </label>
            <label for="check6"><img src="<?php echo $url_array[6]?>"border="0" width="221" height="306" style="display:block" />
              <input id="check6" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[6]?>><?php echo $dress_name_array[6]?>
            </label>
            <label for="check7"><img src="<?php echo $url_array[7]?>"border="0" width="221" height="306" style="display:block" />
              <input id="check7" Type="checkbox" name="img[]" onclick="count_ck(this);" value=<?php echo $img_index_array[7]?>><?php echo $dress_name_array[7]?>
            </label>
          </hgroup>
          <div id="center_box" class="entry-box">
            <p><a class="btn btn-primary btn-lg" href="./" role="button">확인</a>
              <a class="btn btn-primary btn-lg" href="javascript:history.back()" role="button">취소</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
