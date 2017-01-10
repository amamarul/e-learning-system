$(document).ready(function(){
    var questionId = 0;
    $(".add-single").click(function(e){
        var newDiv = $("<div>");

        newDiv.html('' +
            '<div class="form-group hide">' +
                '<label for="sel1">Informatieve tekst:</label>' +
                '<textarea type="text" name="questions['+questionId+'][context]" class="form-control" placeholder=""></textarea>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="sel1">Vraag:</label>' +
            '<input type="text" name="questions['+questionId+'][title]" class="form-control" placeholder="">' +
            '</div>' +
            '<div class="form-group">' +
                '<label for="sel1">Omschrijving:</label>' +
                '<input type="text" name="questions['+questionId+'][description]" class="form-control" placeholder="">' +
            '</div>' +
            '<div class="form-group" id="last-group-1">' +
                '<label for="sel1">Antwoord:</label>' +
                '<input type="text" name="questions['+questionId+'][answer]" class="form-control" placeholder="">' +
            '</div>' +
            '<hr>');
        $('.test-last').before(newDiv);
        questionId = questionId + 1;
    });

    $(".add-multi").click(function(e){
        var newDiv = $("<div>");
        newDiv.html('' +
            '<div class="form-group">' +
                '<label for="sel1">Vraag:</label>' +
                '<input type="text" name="questions['+questionId+'][title]" class="form-control" placeholder="">' +
            '</div>' +
            '<div class="form-group">' +
                '<label for="sel1">Omschrijving:</label>' +
                '<input type="text" name="questions['+questionId+'][description]" class="form-control" placeholder="">' +
            '</div>' +
                '<div class="form-group">' +
                    '<label for="sel1">A:</label>' +
                    '<input type="text" name="questions['+questionId+'][options][]" class="form-control" placeholder="">' +
                '</div>' +
                '<div class="form-group">' +
                    '<label for="sel1">B:</label>' +
                    '<input type="text" name="questions['+questionId+'][options][]" class="form-control" placeholder="">' +
                '</div>' +
                '<div class="form-group">' +
                    '<label for="sel1">C:</label>' +
                    '<input type="text" name="questions['+questionId+'][options][]" class="form-control" placeholder="">' +
                '</div>' +
                '<div class="form-group">' +
                    '<label for="sel1">D:</label>' +
                    '<input type="text" name="questions['+questionId+'][options][]" class="form-control" placeholder="">' +
                '</div>' +
                '<div class="form-group">' +
                    '<label for="sel1">correct antwoord (geef het antwoord in hoofdletter. Voorbeeld: D)</label>' +
                    '<input type="text" name="questions['+questionId+'][answer]" class="form-control" placeholder="">' +
                '</div>' +
            '<hr>');
        $('.test-last').before(newDiv);
        questionId = questionId + 1;
    });
});
