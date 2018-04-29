if (!window.jQuery) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'js/jquery-3.3.1.min.js';
    var firstScript = document.getElementsByTagName('script')[0];
    firstScript.parentNode.insertBefore(script, firstScript);
}
$(document).ready(function () {
    var filmsCount = 2;
    var filmsAllCount = 2;// limitiga võrdne
    $("button").click(function () {
        filmsCount = filmsCount + 2;
        filmsAllCount = filmsAllCount + 1;//suurendame igal korral
        $("#filmsTable").load("../morefilms.php", {
            filmsNewCount: filmsCount
        });
        if(filmsAllCount > filmsCount){
            $("button").hide();
        }
        filmsAllCount = filmsAllCount + 2;
    });

});