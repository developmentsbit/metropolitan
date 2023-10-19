<footer id="footer"></footer>
        </div>
<!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- JavaScript Libraries -->
<script src="{{asset('/mujib100')}}/js/front/lib/jquery/jquery.min.js"></script>
<script src="{{asset('/mujib100')}}/js/front/fancybox-master/dist/jquery.fancybox.min.js"></script>
<script src="{{asset('/mujib100')}}/js/front/lib/jquery/jquery-migrate.min.js"></script>
<script src="{{asset('/mujib100')}}/js/front/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/mujib100')}}/js/front/lib/owlcarousel/owl.carousel.min.js"></script>

<script src="{{asset('/mujib100')}}/js/front/lib/easing/easing.min.js"></script>
<script src="{{asset('/mujib100')}}/js/front/lib/mobile-nav/mobile-nav.js"></script>
<script src="{{asset('/mujib100')}}/js/front/lib/wow/wow.min.js"></script>
<!-- Template Main Javascript File -->
<script src="{{asset('/mujib100')}}/js/front/js/main.js"></script>


<script src="{{asset('/mujib100')}}/js/front/js/read_more.js"></script>


<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /* When click read more button */
        $('body').on('click', '#read-more', function () {
            var year = $(this).data('year');
            // alert(year);
            $.get('timeline-description/' + year, function (data) {
                $("#year-" + data.year).addClass('height-100');
                document.getElementById("description-" + data.year).innerHTML = data.english;
            })
        });

    });

</script>
<script type="text/javascript">
    $(function () {
        $(".muj-time p").elimore({
            maxLength: 300,
            lessText: "Less View"
        });

    });


    $(function () {
        $("bn").not(":visible").each(function () {
            $(this).data("src", this.src);
            this.src = "";
        });

        $("en").not(":visible").each(function () {
            $(this).data("src", this.src);
            this.src = "";
        });
    });

</script>

<script>
    var i, x;
    x = document.querySelectorAll(".card-img-top")
    for (i = 0; i < x.length; i++) {
        x[i].style.height = "400px";


    }

</script>


<script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction2() {
        var dots = document.getElementById("dots2");
        var moreText = document.getElementById("more2");
        var btnText = document.getElementById("myBtn2");

        if (dots2.style.display === "none") {
            dots2.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots2.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }

    function myFunction3() {
        var dots = document.getElementById("dots3");
        var moreText = document.getElementById("more3");
        var btnText = document.getElementById("myBtn3");

        if (dots3.style.display === "none") {
            dots3.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots3.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction4() {
        var dots = document.getElementById("dots4");
        var moreText = document.getElementById("more4");
        var btnText = document.getElementById("myBtn4");

        if (dots4.style.display === "none") {
            dots4.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots4.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction5() {
        var dots = document.getElementById("dots5");
        var moreText = document.getElementById("more5");
        var btnText = document.getElementById("myBtn5");

        if (dots5.style.display === "none") {
            dots5.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots5.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction6() {
        var dots = document.getElementById("dots6");
        var moreText = document.getElementById("more6");
        var btnText = document.getElementById("myBtn6");

        if (dots6.style.display === "none") {
            dots6.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots6.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction7() {
        var dots = document.getElementById("dots7");
        var moreText = document.getElementById("more7");
        var btnText = document.getElementById("myBtn7");

        if (dots7.style.display === "none") {
            dots7.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots7.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction8() {
        var dots = document.getElementById("dots8");
        var moreText = document.getElementById("more8");
        var btnText = document.getElementById("myBtn8");

        if (dots8.style.display === "none") {
            dots8.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots8.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction9() {
        var dots = document.getElementById("dots9");
        var moreText = document.getElementById("more9");
        var btnText = document.getElementById("myBtn9");

        if (dots9.style.display === "none") {
            dots9.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots9.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction10() {
        var dots = document.getElementById("dots10");
        var moreText = document.getElementById("more10");
        var btnText = document.getElementById("myBtn10");

        if (dots10.style.display === "none") {
            dots10.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots10.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction11() {
        var dots = document.getElementById("dots11");
        var moreText = document.getElementById("more11");
        var btnText = document.getElementById("myBtn11");

        if (dots11.style.display === "none") {
            dots11.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots11.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction12() {
        var dots = document.getElementById("dots12");
        var moreText = document.getElementById("more12");
        var btnText = document.getElementById("myBtn12");

        if (dots12.style.display === "none") {
            dots12.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots12.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }
    function myFunction13() {
        var dots = document.getElementById("dots13");
        var moreText = document.getElementById("more13");
        var btnText = document.getElementById("myBtn13");

        if (dots13.style.display === "none") {
            dots13.style.display = "inline";
            btnText.innerHTML = "বিস্তারিত দেখুন";
            moreText.style.display = "none";
        } else {
            dots13.style.display = "none";
            btnText.innerHTML = "সংক্ষিপ্ত করুন";
            moreText.style.display = "inline";
        }
    }</script>
