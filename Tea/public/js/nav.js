
        var btnCnt = 0;

        $("#myButton").on("click", function () {
            if (btnCnt % 2 == 0) {
                // $("#bgHeader").css("height", "300px");
                $("#bgHeader").animate({
                    height: '350px',
                })
                btnCnt++;
            }
            else {
                $("#bgHeader").animate({
                    height: '85px',
                })
                btnCnt++;
            }
        })
 