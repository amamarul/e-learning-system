var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    effect: 'fade',
    simulateTouch:false
});


function nextquestion(question, completedCourseId) {

    question['given'] = '';

    var givenRadio = $('#answerRadio:checked', '#answer-form').val();
    var givenInput = $('.answerInput', '#answer-form').val();


    if (givenRadio) {
        if (givenRadio == 1) {
            question['given'] = 'A'
        } else if (givenRadio == 2) {
            question['given'] = 'B'
        } else if (givenRadio == 3) {
            question['given'] = 'C'
        } else if (givenRadio == 4) {
            question['given'] = 'D'
        }

        sendToBackend(question);
    }

    if (givenInput) {
        question['given'] = givenInput;
        sendToBackend(question);
    }

    function sendToBackend(question) {
        $.ajax({
            url: '/check-answer',
            type: 'post',
            data: question,
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            dataType: 'json',
            success: function (data) {
                swiper.slideNext();
            },
            error: function(data){
                //console.log(data);
                //console.log(data);
            }
        });
    }

    if (completedCourseId) {
        $.ajax({
            url: '/check-course/'+question.course_id,
            type: 'post',
            data: question,
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            dataType: 'json',
            success: function (data) {
                window.location.href = '/profile';
            },
            error: function(data){
                //console.log(data);
                //console.log(data);
            }
        });
    }
}