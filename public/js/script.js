$("document").ready(function(){
    $(".dropdown-menu li a").on('click',function(){
        $(this).parents(".dropdown").find('button').text($(this).text());
        $(this).parents(".dropdown").find('button').val($(this).text());
    });

    $(".btn.btn-primary.user").on('click',function(){
        var year = $.trim($("#YearButton").text());
        var month = $.trim($("#MonthButton").text());
        var day = $.trim($("#DayButton").text());
        if(day.length == 1){
            day = "0" + day;
        }
        var date = year +"-"+month+"-"+ day;
        $("input[name='date_of_birth']").val(date);
        if($.trim($("#SexButton").text()) == "Female"){
            $("input[name='sex']").val("1");
        }
        else{
            $("input[name='sex']").val("0");
        }
        return true;


    });

    $(".btn.btn-primary.newPost").on('click',function(){
        var anonymity = $('input:radio[name=anonymity]:checked').val();
        var privacy = $('input:radio[name=privacy]:checked').val();
        $("input[name='isPrivate']").val(privacy);
        $("input[name='isAnonymous']").val(anonymity);
    });

    $("#tag_list").select2({
        placeholder: "Choose tags for your post"
    });

    $("#postsLink").on('click', function () {
        $("#info").hide();
        $("#comments").hide();
        $("#posts").show();
    });
    $("#infoLink").on('click', function () {
        $("#comments").hide();
        $("#posts").hide();
        $("#info").show();
    });
    $("#commentsLink").on('click', function () {
        $("#info").hide();
        $("#posts").hide();
        $("#comments").show();
    });



});