<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Lookup_Inquiry</title>
    <style>
      body{
        margin: auto;
        width: 1000px;
      }
      h1{
        font-size:45px;
        text-align:center;
        margin: 10px;
        margin-bottom: 40px;
      }
      h2{
        text-align:center;
        margin-top: 20px;
        margin-bottom: 30px;
        margin-left: 40px;
        margin-right: 40px;
      }
      .container{
      display: grid;
      width: 1000px;
      grid-template-rows: 1fr 1fr;
      grid-template-columns: 1fr 1fr;
      grid-gap:10px;
      }
      .weather{
        grid-column:1;
        grid-row:1;
      }
      .sex{
        grid-row:1;
        grid-column:2;
      }
      .age{
        grid-row:2;
        grid-column:1;
      }
      .submit{
        grid-row: 2;
        grid-column: 2;
      }
      .position_radio{
        position: relative;
        left:140px;
      }
      .position_submit_button{
        width: 50px;
        position: relative;
        left:400px;
        top:170px;
      }
    </style>
  </head>
  <body>
    <br><br>
    <h1>조회시 필요한 정보를 입력해주세요</h1>
    <form action="Vote_lookup.php" method="post" onsubmit='return radio_chk();'>
      <div class="container">
        <div class="weather">
          <h2>계절을 선택해주세요</h2>
          <div class="position_radio">
            <input type="radio" name="weather" value="봄" /> 봄
            <p></p><input type="radio" name="weather" value="여름" /> 여름
            <p></p><input type="radio" name="weather" value="가을" /> 가을
            <p></p><input type="radio" name="weather" value="겨울" /> 겨울
          </div>
        </div>
        <div class="sex">
          <h2>성별을 선택해주세요</h2>
          <div class="position_radio">
            <input type="radio" name="sex" value=1 /> 남자
            <p></p><input type="radio" name="sex" value=0 /> 여자
          </div>
        </div>
        <div class="age">
          <h2>연령대를 선택해주세요</h2>
          <div class="position_radio">
            <input type="radio" name="age" value="1" /> 10대
            <p></p><input type="radio" name="age" value="2" /> 20대
            <p></p><input type="radio" name="age" value="3" /> 30대
          </div>
        </div>
        <script type="text/javascript">
          function radio_chk(){
            var weather_btn=document.getElementsByName('weather');
            var sex_btn=document.getElementsByName('sex');
            var age_btn=document.getElementsByName('age');

            var weather_btn_value=0;
            var sex_btn_value=2;
            var age_btn_value=0;

            for(var i=0; i<weather_btn.length; i++){
              if(weather_btn[i].checked == true){
                weather_btn_value=weather_btn[i].value;
              }
            }
            for(var i=0; i<sex_btn.length; i++){
              if(sex_btn[i].checked == true){
                sex_btn_value=sex_btn[i].value;
              }
            }
            for(var i=0; i<age_btn.length; i++){
              if(age_btn[i].checked == true){
                age_btn_value=age_btn[i].value;
              }
            }
            if(weather_btn_value == 0 || sex_btn_value == 2 || age_btn_value == 0){
              alert("나이와 성별 계절을 모두 선택해주세요");
              return false;
            }
            else{
              alert(weather_btn_value + sex_btn_value + age_btn_value);
            }
          }
        </script>
        <div class="submit">
          <div class=position_submit_button>
            <input type="submit" value="제출"/>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
