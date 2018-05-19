    window.onload = function f() {

        var imgsm1 = document.getElementById("sm1");
        var imgsm2 = document.getElementById("sm2");
        var imgsm3 = document.getElementById("sm3");

        imgsm1.onclick = changeBigPicturesm1;
        imgsm2.onclick = changeBigPicturesm2;
        imgsm3.onclick = changeBigPicturesm3;

        function changeBigPicturesm1() {
            window.open("big_photos/big_photo_1.php");
        }

        function changeBigPicturesm2() {
            window.open("big_photos/big_photo_2.php");
        }

        function changeBigPicturesm3() {
            window.open("big_photos/big_photo_3.php");
        }
        
    };





