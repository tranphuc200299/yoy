$(document).ready(function(){
  $(".automatic-back").click(function(){
     $(".automatic").hide();
     $(".home-page-select").show();
  });

    $(".btn-back-top").click(function(){
        $(".automatic").hide();
        $(".comparison_results").hide();
        $(".home-page-select").show();
    });
});