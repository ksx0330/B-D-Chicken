  <div class="col-lg-3" style="padding-right: 3%; padding-left: 2%">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="../../assets/images/Text_Logo.svg" height=100 class="img_top" style="width: 5rem;" />
                    <img src="../../assets/images/Chicken_Logo.svg" height=150 style="width: 7rem;" />
                </div>
                <h5 class="card-title">로그인</h5>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="이메일" id="staticEmail" >
                        <input type="password" class="form-control" placeholder="패스워드" id="inputPassword">
                    </div>
                    <button type="submit" class="btn btn-primary form-control">로그인</button>
                </form>
              </div>
            </div>

        <div class="card" onclick="location.href='../chicken/baedal.php'">
            <div class="card-body">
                <div class="btn btn-lg btn-red full_button text-left">
                    <span class="large_font">배달조회</span>
                    <div style="float: right;"><img src="../../assets/images/box.svg" style="width: 6rem; height: 7rem" /></div>
                </div>
            </div>
        </div>

        <div class="card" onclick="location.href='../community/notice.php'">
            <div class="card-body">
                <div class="btn btn-lg btn-yellow full_button text-left">
                    <span class="large_font">
                        커뮤니티
                        <div style="float: right; padding-top: 10px;">
                            <img src="../../assets/images/Q&A.svg" style="width: 4rem; height: 4rem;" />
                        </div>
                        <br>& 자유게시판
                    </span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="btn btn-lg btn-gray full_button text-center">
                    <span class="one_line_height large_font">
                        스포츠 중계
                        <br>
                        사이트 연결
                        <br>
                    </span>
                    <img src="../../assets/images/sports.png" style="height: 11.5rem" onclick="window.open('../../popup/sports.php', '_blank', 'width=523, height=530, toolbar=no, scrollbars=no, resizable=yes');">

                </div>
            </div>
        </div>

    </div>
