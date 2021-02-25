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
      tr, td {
        border: 1px solid #BDBDBD;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <?php
        include 'dbcon.php';
        $weather=$_POST["weather"];
        $age=$_POST["age"];
        $sex=$_POST["sex"];
        //echo "$weather $age  $sex";
        //echo nl2br("\n");
       $url_array = array(); // 이미지 URL배열
       $vote_value = array(); // 투표수 배열
       $dress_name_array= array(); //옷 이름 배열
       $query="SELECT IMG_URL,VOT_VALUE,DRE_NAME FROM IMAGE,VOTE WHERE WEATHER='$weather' AND DRESS_SEX = $sex AND IMAGE.IMG_IND=VOTE.IMG AND VOTE.AGE=$age";
       $result= mysqli_query($con,$query);

       while($row = mysqli_fetch_array($result)){
         array_push($url_array,$row[IMG_URL]);
         array_push($vote_value,$row[VOT_VALUE]);
         array_push($dress_name_array,$row[DRE_NAME]);
       }
      // for($i=0; $i<count($url_array); $i++){
      //   echo "URL=".$url_array[$i]."투표수=".$vote_value[$i]."옷이름=".$dress_name_array[$i];
      //   echo nl2br("\n");
       //}
    ?>
    <div>
      <div class="header">
        <h1>이성 패션 투표</h1>
      </div>
      <div class="img_center">
        <form onsubmit='return label_value();'>
          <hgroup>
            <label><img src="<?php echo $url_array[0]?>" border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[0]?>: <?php echo $vote_value[0]?></label>
            <label><img src="<?php echo $url_array[1]?>" border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[1]?>: <?php echo $vote_value[1]?></label>
            <label><img src="<?php echo $url_array[2]?>" border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[2]?>: <?php echo $vote_value[2]?></label>
            <label><img src="<?php echo $url_array[3]?>"border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[3]?>: <?php echo $vote_value[3]?></label>
          </hgroup>
          <hgroup>
            <label><img src="<?php echo $url_array[4]?>" border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[4]?>: <?php echo $vote_value[4]?></label>
            <label><img src="<?php echo $url_array[5]?>" border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[5]?>: <?php echo $vote_value[5]?></label>
            <label><img src="<?php echo $url_array[6]?>" border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[6]?>: <?php echo $vote_value[6]?></label>
            <label><img src="<?php echo $url_array[7]?>" border="0" width="221" height="306" style="display:block" />
              <?php echo $dress_name_array[7]?>: <?php echo $vote_value[7]?></label>
          </hgroup>
          <div id="center_box" class="entry-box">
            <p><a class="btn btn-primary btn-lg" href="./" role="button">메인 홈</a>
              <a class="btn btn-primary btn-lg" href="javascript:history.back()" role="button">뒤로가기</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
