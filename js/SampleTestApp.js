var ClickedButton;
var AudioPlayerTimeOut;
var RecorderTimeOut;
var UserSessionID;
var TestType = 0;
var CategorySectionID = 0;
var QuesType;
var QuesIndex = 1;
var jumptoindex = 1;
var ObjQues;
var flag = 0;
var quescount = 0;

$(document).ready(function () {
    UserSessionID = $.cookie('GuidSessions')
    CategorySectionID = parseInt($('#Hdn_CategorySectionID').val());
    TestType = parseInt($('#Hdn_TestType').val());
    var coockiename = CategorySectionID + "_Index";
    if ($.cookie(coockiename))
        QuesIndex = parseInt($.cookie(coockiename));
    //var pageURL = location.pathname.split('/').slice(-1)[0];
    //$.getJSON("/sample-question-json/" + pageURL + ".json").done(function (data) {
    //    for (i = 1; i <= data.length; i++)
    //    {
    //        $("#div_Navigator").append('<li><a id=\"a_ques_" + i + "\" class=\"' + (i == QuesIndex ? 'active ' : '') + 'Listening_bg_color\" href=\"javascript:NavigateQuestion(' + i + ')\">' + i + '</a></li>');
    //    }
    //    QuesData = data;
    //    setQuestionData();
    //}).fail(function () { alert("error"); });
    $.ajax({
        url: 'https://api.ptetutorials.com/pte/getquescount',
        dataType: 'json',
        type: 'GET',
        cache: false,
        data: {
            categorysecid: CategorySectionID
        },
        success: function (data) {
            quescount = parseInt(data);
            for (i = 1; i <= quescount; i++) {
                $("#div_Navigator").append('<li><a id=\"a_ques_' + i + '\" class=\"' + (i == QuesIndex ? 'active ' : '') + 'Listening_bg_color\" href=\"javascript:NavigateQuestion(this, ' + i + ')\">' + i + '</a></li>');
            }
        }
    });
    setQuestionData();
});

function setQuestionData() {
    $.ajax({
        url: 'https://api.ptetutorials.com/pte/getques',
        dataType: 'json',
        type: 'GET',
        cache: false,
        data: {
            UserSessionID: UserSessionID,
            categorysecid: CategorySectionID,
            quesindex: QuesIndex
        },
        beforeSend: function () {
            showLoading();
        },
        success: function (ObjQues) {
            QuesType = ObjQues.QuesType;
            $('#Hdn_Qindex').val(QuesIndex);
            $('#div_SectionName').html(ObjQues.CategorySectionName);
            $('#div_QuesCaption').html(ObjQues.QuesCaption);
            //$('#div_QuesBody').html(ObjQues.Question);
            $('#div_QuesBody').html(ObjQues.Question.replace("media.ptetutorials.com", "cdn.ptetutorials.com"));
            $('#div_Answer').html(ObjQues.CorrectAnswer);
            $('#div_Transcript').html(ObjQues.Transcript);


            $('#Hdn_TestType').val(ObjQues.TestType);
            $('#Hdn_CategorySectionID').val(ObjQues.CategorySecID);
            $('#Hdn_CategorySectionName').val(ObjQues.CategorySectionName);

            $('#Hdn_QuesID').val(ObjQues.QuesID);
            //$('#Hdn_QuesFile').val(ObjQues.QuesFile);
            $('#Hdn_QuesFile').val(ObjQues.QuesFile.replace("media.ptetutorials.com", "cdn.ptetutorials.com"));
            $('#Hdn_QuesTime').val(ObjQues.QuesTime);
            $('#Hdn_QuesWaitTime').val(ObjQues.QuesWaitTime);
            $('#Hdn_TotalQuestions').val(ObjQues.TotalQuestions);
            $('#Hdn_AnswerText').val(ObjQues.AnswerText);
            $('#Hdn_PauseTest').val(0);

            $('#div_Question_Index').html(QuesIndex + " of " + quescount);
            if (QuesIndex == 1) {
                $('#Lnk_Next_Question').show();
                $('#Lnk_Prev_Question').hide();
                $('#Lnk_Revise_Questions').hide();
            }
            else if (QuesIndex == quescount) {
                $('#Lnk_Next_Question').hide();
                $('#Lnk_Prev_Question').show();
                $('#Lnk_Revise_Questions').hide();
            }
            else {
                $('#Lnk_Next_Question').show();
                $('#Lnk_Prev_Question').show();
                $('#Lnk_Revise_Questions').show();
            }

            if (TestType == 4)
                $('#div_QuesBody').addClass('question-body-speaking');
            else
                $('#div_QuesBody').removeClass('question-body-speaking');

            if (TestType == 3 || (QuesType == "audioR" || QuesType == "audiopicture")) {
                initAudioPlayer();
                $('#Lnk_Transcript').show();
            }
            else
                $('#Lnk_Transcript').hide();

            if (TestType == 4 && QuesType != "audioR" && QuesType != "audiopicture")
                initRecorder();
            if (TestType == 2)
                initWritingTimer();
            if (QuesType == "textarea")
                initWritingCounter();
            if (QuesType == "dragdrop") {
                if ($('#liSmpleDragnDrop'))
                    $('#liSmpleDragnDrop').remove();
                initSortAbleOpt();
            }
            if (QuesType == "single")
                initFillBlankSort();

            if (ObjQues.AnswerText != "") {
                var strAnswerText = ObjQues.AnswerText;
                if (QuesType == "radio") {
                    var id = $("input[value='" + strAnswerText + "'][type='radio']").attr("id");
                    $("#" + id).prop("checked", true);
                    $("#" + id).attr('previousValue', true);
                }
                else if (QuesType == "checkbox") {
                    var str_array = strAnswerText.split(',');
                    for (var i = 0; i < str_array.length; i++) {
                        var id = $("input[value='" + str_array[i].trim() + "']").attr("id");
                        $("#" + id).prop("checked", true);
                    }
                }
                else if (QuesType == "dragdrop") {
                    var str_array = strAnswerText.split(',');
                    for (i = 0; i < str_array.length; i++) {
                        $("#QuestionOption > li > input[value='" + str_array[i] + "']").prop("disabled", false).parent().appendTo($('#QuestionAOption'));
                    }
                }
                else if (QuesType == "single") {
                    var str_array = strAnswerText.split(',');
                    $("#div_QuesBody :input").each(
                        function (index) {
                            if (str_array[index] == "")
                                return true;
                            this.value = str_array[index];
                            if (TestType == 1) {
                                var objlbl = $('#QuestionAOption > li > label:contains("' + str_array[index] + '")');
                                if (objlbl.length > 0) {
                                    objlbl.parent().hide();
                                    objlbl.appendTo($(this).parent());
                                }
                            }
                        }
                    );
                }
                else if (QuesType == "multi") {
                    var str_array = strAnswerText.split(',');
                    $("#div_QuesBody > div > div > p > select").each(
                        function (index) {
                            if (str_array[index] == "")
                                return true;
                            this.value = str_array[index];
                        }
                    );
                }
                else if (QuesType == "textarea") {
                    $('textarea[name=answer]').val(strAnswerText);
                    initWritingCounter();
                }
                else if (QuesType == "highlight") {
                    var str_array = strAnswerText.split(',');
                    var LstSpan = $("#div_QuesBody > .highlightText > .QuestionBlock > span");
                    for (i = 0; i < str_array.length; i++) {
                        var ansIndex = str_array[i].split('_')[1];
                        $(LstSpan[ansIndex]).addClass("highlight");
                        $(LstSpan[ansIndex]).find("input").prop("disabled", false);
                    }
                }
            }
            if (QuesType == 'radio') {
                $("[type='radio']").on('click', function (e) {
                    var previousValue = $(this).attr('previousValue');
                    if (previousValue) {
                        if (previousValue == 'true') {
                            this.checked = false;
                            $(this).attr('previousValue', this.checked);
                        }
                        else {
                            this.checked = true;
                            $(this).attr('previousValue', this.checked);
                        }
                    }
                    else {
                        $("input[type='radio']").removeAttr('previousValue');
                        this.checked = true;
                        $(this).attr('previousValue', this.checked);
                    }
                });
            }
            $('.active, .Listening_bg_color').removeClass('active');
            $('#a_ques_' + QuesIndex).addClass('active');
            hideLoading();
        },
        error: function (err) {
            alert(JSON.stringify(err));
        }
    });
}

function NavigateQuestion(thisbutton, QIndex) {
    jumptoindex = QIndex;
    SetAnswerValue(thisbutton, 'jump');
}

function SetAnswerValue(thisbutton, qoption) {
    //getWordCount($('textarea[name=answer]').val());
    flag = 0;
    showLoading();
    clearInterval(AudioPlayerTimeOut);
    clearInterval(RecorderTimeOut);
    var TestType = parseInt($('#Hdn_TestType').val());
    if (TestType != 4) {
        var AnsValue = "";
        var AnsFld = "answer";
        if (theForm.elements[AnsFld].length) {
            for (i = 0; i < theForm.elements[AnsFld].length; i++) {
                var FldType = theForm.elements[AnsFld][i].type;
                if (FldType == "checkbox" || FldType == "radio") {
                    if (theForm.elements[AnsFld][i].checked)
                        AnsValue += theForm.elements[AnsFld][i].value + ",";
                }
                else {
                    if (!theForm.elements[AnsFld][i].disabled)
                        AnsValue += theForm.elements[AnsFld][i].value + ",";
                }
            }
        }
        else {
            if (!theForm.elements[AnsFld].disabled)
                AnsValue = theForm.elements[AnsFld].value;
        }
        AnsValue = AnsValue.replace(/,+$/, "");
        $('#Hdn_AnswerText').val(AnsValue);
        ClickedButton = null;
        var ObjAnswer = {
            UserSessionID: UserSessionID,
            QuesID: parseInt($('#Hdn_QuesID').val()),
            QuesIndex: QuesIndex,
            AnswerText: AnsValue
        }
        var strAnswer = JSON.stringify(ObjAnswer);
        $.ajax({
            url: 'https://api.ptetutorials.com/pte/saveanswer',
            dataType: 'json',
            type: 'POST',
            contentType: 'application/json',
            data: strAnswer,
            success: function (response) {

            },
            error: function (error) {

            }
        });
    }
    else {
        if (justMicRec) {
            if (justMicRec.recording) {
                ClickedButton = thisbutton;
                justStop();
                return;
            }
            else {
                ClickedButton = null;
            }
        }
    }

    if (qoption == 'next')
        QuesIndex++;
    else if (qoption == 'previous')
        QuesIndex--;
    else if (qoption == 'restart')
        QuesIndex = 1;
    else if (qoption == 'jump')
        QuesIndex = jumptoindex;

    setQuestionData();
}

function DeleteAnswer() {
    var Isconfirm = confirm("Are you sure you want delete all answers of this section?");
    if (Isconfirm == true) {
        var ObjDeleteAnswer = {
            UserSessionID: UserSessionID,
            CategorySecID: parseInt($('#Hdn_CategorySectionID').val())
        }
        var strAnswer = JSON.stringify(ObjDeleteAnswer);
        $.ajax({
            url: 'https://api.ptetutorials.com/pte/deleteanswer',
            dataType: 'json',
            type: 'POST',
            contentType: 'application/json',
            data: strAnswer,
            success: function (response) {
                if (response == "Success")
                    alert("Answers deleted successfully!");
                location.reload();
            },
            error: function (error) {

            }
        });
    }
}

function CountDownStart() {
    $('.alt-1').countDown({ css_class: 'countdown-alt-1' }).on('time.elapsed', function () {
        alert("Test Time is finished");
        if (SetAnswerValue($("#Lnk_SubmitHidden"))) {
            if ($('#Hdn_TestType').val() == 3)
                $("#Lnk_SubmitHidden").click();
            else
                $("#Lnk_NextSectionHidden").click();
        }
    });
}

function initAudioPlayer() {
    var QuesTime = parseInt($('#Hdn_QuesTime').val());
    var QuesWaitTime = parseInt($('#Hdn_QuesWaitTime').val());
    var QuesFile = $('#Hdn_QuesFile').val();
    var CategorySectionName = $('#Hdn_CategorySectionName').val();
    var AnswerID = parseInt($('#Hdn_AnswerID').val());
    var AnswerText = $('#Hdn_AnswerText').val();
    var counting = QuesWaitTime;
    if (QuesType == 'audiopicture')
        counting = 3;
    if (QuesIndex == 1)
        counting = counting + 3;
    var videoLength;
    if ($('#audioplayer').length) {
        var audioPlayer = jwplayer("audioplayer");
        audioPlayer.setup({
            file: QuesFile,
            height: 40,
            events: {
                onTime: function (event) {
                    if (TestType == 4 && AnswerText == '' && CategorySectionName == 'Repeat sentence') {
                        //var TotalTime = Math.floor(event.duration) + 3;
                        var TotalTime = Math.floor(event.duration);
                        var ElapsedTime = Math.floor(event.position);
                        var RemainingTime = TotalTime - ElapsedTime;

                        if (flag == 1) {
                            $('#record_wait_counting').hide();
                            $('#recording-player-counting').hide();
                        }
                        else {
                            $('#record_wait_counting').text(RemainingTime);
                            $('#recording-player-counting').show();
                        }
                    }
                },
                onComplete: function () {
                    $('#audio-player-counting').html("Completed");
                    if (TestType != 4) {
                        initWritingTimer();
                    }
                    else if (TestType == 4 && AnswerText == '') {
                        $('#audio-player-counting').hide();
                        if (CategorySectionName == 'Repeat sentence') {
                            if (flag == 1) {
                                $('#record_wait_counting').hide();
                                $('#recording-player-counting').hide();
                            }
                            else {
                                $('#recording-player-counting').show();
                                initRecorder();
                            }
                            //$('#record_wait_counting').text(3);
                        }
                        else {
                            if (flag == 1) {
                                $('#recording-player-counting').hide();
                                $('#record_wait_counting').hide();
                            }
                            else {
                                $('#recording-player-counting').show();
                                $('#record_wait_counting').text(QuesWaitTime);
                                initRecorder();
                            }
                        }
                    }
                }
            }
        });
        audioPlayer.stop();
    }

    $('#wait_counting').text(counting);
    AudioPlayerTimeOut = setInterval(function () {
        if (counting > 0) {
            if ($('#Hdn_PauseTest').val() == '0')
                counting--;
            $('#wait_counting').text(counting);
        }
        else {
            $('#audio-player-counting').html("Playing.....");
            $('.jw-icon-playback').removeAttr('Style');

            audioPlayer.play();
            audioPlayer.on('playAttemptFailed', function (err) {
                this.stop();
                this.play();
            });
            $('video').each(function () {
                $(this).attr('playsinline', 'true');
            });
            clearInterval(AudioPlayerTimeOut);
        }
    }, 1000);

    if (QuesType == "highlight") {
        $('.highlightText').on('click', '.QuestionBlock span', function (ev) {
            ev.preventDefault();
            ev.stopPropagation();

            if ($(this).hasClass('highlight')) {
                $(this).removeClass('highlight');
                $(this).find('input').attr('disabled', 'disabled')

            } else {
                $(this).addClass('highlight');
                $(this).find('input').removeAttr('disabled')
            }
            return false;
        });
    }
}

function initRecorder() {
    var QuesWaitTime;
    var CategorySectionName = $('#Hdn_CategorySectionName').val();
    if (CategorySectionName == 'Repeat sentence')
        QuesWaitTime = 0;
    else
        QuesWaitTime = $('#Hdn_QuesWaitTime').val();

    var AnswerText = $('#Hdn_AnswerText').val();
    if (AnswerText == '') {
        $('#record_wait_counting').text(QuesWaitTime);
        RecorderTimeOut = setInterval(function () {
            QuesWaitTime--;
            $('#record_wait_counting').text(QuesWaitTime);
            if (QuesWaitTime <= 0) {
                clearInterval(RecorderTimeOut);
                $('#audio-player-counting').hide();
                $('#recording-player-counting').hide();
                $('.recodingStatus').text('Recording');
                if (CategorySectionName != 'Answer short question') {
                    PlaySound();
                }
                playRecording();
            }
        }, 1000);
    } else {
        $('#recording-player-counting').hide();
        $('.recodingStatus').text('Recorded');
        $('.audio-player-progress').hide();

        var url = AnswerText;
        var li = document.createElement('li');
        var au = document.createElement('audio');
        var hf = document.createElement('a');

        au.controls = true;
        au.src = url;
        hf.href = url;
        hf.download = new Date().toISOString() + url.substr(url.lastIndexOf('.') + 1);
        hf.innerHTML = "Download Recording";
        li.appendChild(au);
        li.appendChild(hf);
        $('#recodingdiv .audio-player-controls').html(li);
    }
    flag = 1;
}

function PlaySound() {
    var soundObject = document.createElement("embed");
    soundObject.setAttribute("src", "/temp_uploads/beep-07.wav");
    soundObject.setAttribute("hidden", true);
    soundObject.setAttribute("autostart", true);
    document.body.appendChild(soundObject);
}

function playRecording() {
    var QuesTime = parseInt($('#Hdn_QuesTime').val());
    var _self = this;
    $('.recodingStatus').html("Recording Starts....");

    justStart((QuesTime + 1));
}

function initWritingTimer() {
    var QuesTime = $('#Hdn_QuesTime').val();
    var Qindex = $('#Hdn_Qindex').val();
    var TotalQuestions = $('#Hdn_TotalQuestions').val();
    if (QuesTime > 0) {
        $('#div_writing_timer').show();
        $('#writing_timer').countDown({ css_class: 'countdown-alt-1' }).on('time.elapsed', function () {
            if (window.location.href.indexOf("/sample-questions/") == -1) {
                if (Qindex == TotalQuestions) {
                    swal({
                        title: "",
                        text: "Time is finished, Do you want to submit test or revise test?",
                        type: "info",
                        showCancelButton: true,
                        cancelButtonClass: "btn-default",
                        cancelButtonText: "Revise",
                        confirmButtonText: "Submit",
                        confirmButtonClass: "btn-primary"
                    },
                        function (isConfirm) {
                            if (isConfirm) {
                                if (SetAnswerValue($("#Lnk_SubmitHidden")))
                                    $("#Lnk_SubmitHidden").click();
                            } else {
                                $("#Hdn_Qindex").val('0');
                                if (SetAnswerValue($("#Lnk_NextHidden")))
                                    $("#Lnk_NextHidden").click();
                            }
                        });
                }
                else {
                    if (SetAnswerValue($("#Lnk_NextHidden")))
                        $("#Lnk_NextHidden").click();
                }
            }
        });
    }
}

function StartTestBreak() {
    $('#Hdn_PauseTest').val('1');
    $('#div_break_timer').countDown({ css_class: 'countdown-alt-1' }).on('time.elapsed', function () {
        $('#Lnk_ContinueToListeningHidden').click();
    });
}

function initSortAbleOpt() {
    var removeIntent = false;
    $('#QuestionOption').sortable({
        connectWith: "#QuestionAOption",
        receive: function (event, ui) {
            ui.item.find('input').attr("disabled", "disabled");
        }
    }).disableSelection();
    $('#QuestionAOption').sortable({
        connectWith: "#QuestionOption",
        receive: function (event, ui) {
            ui.item.find('input').removeAttr("disabled");
        }
    }).disableSelection();
}

function initFillBlankSort() {
    $("#QuestionAOption > li").draggable({
        revert: "invalid",
        cursor: "move",
        helper: "clone",
    }).disableSelection();
    $(".droppable-element").draggable({
        revert: "invalid",
        cursor: "move",
        helper: "clone"
    }).disableSelection();

    $(".droppable-element").droppable({
        accept: "#QuestionAOption > li",
        activeClass: "ui-state-highlight",

        helper: "original",
        drop: function (event, ui) {
            var value = $.trim($(this).find('label').text());
            var input = '<input type="hidden" name="answer" value="' + $.trim($('label', ui.draggable).text()) + '" />';

            $(this).html(ui.draggable.html() + input);
            ui.draggable.hide();
            showAllOptions(value);
        }
    }).disableSelection();
    $("#div_options").droppable({
        accept: ".droppable-element",
        activeClass: "ui-state-highlight",

        helper: "original",
        drop: function (event, ui) {
            var value = $('label', ui.draggable).text();
            $('label', ui.draggable).text('');
            $('input', ui.draggable).val('');
            showAllOptions(value);
        }
    }).disableSelection();
}

function showAllOptions(show_value) {
    var alloptions = $('ul#QuestionAOption li');
    alloptions.each(function () {
        var selector = $(this);
        var label_value = $.trim(selector.find('label').text());
        if (label_value == show_value)
            selector.show();
    });
}

// render test justMicRec instance
$(document).ready(function () {
    // INITIALIZATION
    $('#recn').val(new Date().getTime()); // unique id
    justMicRec.configure({
        hostPath: '/users/FileUploadHandler.ashx?f=demo',
        workerPath: '/justmicrec/js/justmicrecworker.js',
        // callback functions
        recordingActivity: function (analyserNode, seconds) { activity(analyserNode, seconds); },
        recordingError: function (e) { alert('[ERR] ' + e) },
        onrecordingStop: onrecordingStop,
        recordingStopped: recordingStopped,
        recordingCompression: function (status) {
            compressionStatus(status);
        }
    });
});
// COMMANDS
var IsDemoRecord = false;
function toggleRecording(e) {
    if (IsDemoRecord) {
        // stop recording
        justStop();
        var recorder = document.getElementById('record');
        recorder.classList.remove("recording");
        recorder.title = "Start Recording";
        recorder.childNodes[0].classList.remove('fa-stop');
        recorder.childNodes[0].classList.add('fa-microphone');
        document.getElementById("record").style.display = "none";
        document.getElementById("play").style.display = "inline-block";
        document.getElementById("stop").style.display = "inline-block";
    } else {
        // start recording
        var recorder = document.getElementById('record');
        recorder.classList.add("recording");
        recorder.title = "Stop Recording";
        recorder.childNodes[0].classList.remove('fa-microphone');
        recorder.childNodes[0].classList.add('fa-stop');
        document.getElementById("play").style.display = "none";
        document.getElementById("stop").style.display = "none";
        IsDemoRecord = true;
        justStart(30);
    }
}
// Start recording process
function justStart(QuesTime) {
    justMicRec.start(QuesTime);
}
// analyserNode - node to recording data, time - seconds
function activity(analyserNode, time) {
    var QuesTime = $('#Hdn_QuesTime').val();
    if (time <= QuesTime) {
        var progressbar = $('.audio-player-progress-bar');
        var percentage = (time * 100) / QuesTime;
        progressbar.css({
            width: percentage + '%'
        });
        $('.recodingStatus').html("Recording has started..." + time + " Sec / " + QuesTime + " Sec");
    }
}
function justStop() {
    $('.recodingStatus').html('Recording Stoped.');
    justMicRec.stop();
}
//At the moment of recording Stop
function onrecordingStop() {
    showLoading();
}
// Recording compression status
function compressionStatus(status) {
    if (status == 'started') {
        $('.recodingStatus').html('Preparing file...');
    }
    else {
        $('.recodingStatus').html('File prepared.');
    }
}
// EVENTS
function recordingStopped() {
    if (IsDemoRecord) {
        IsDemoRecord = false;
        hideLoading();
    }
    else {
        if (ClickedButton) {
            ClickedButton.click();
        }
        else {
            var reader = new FileReader();
            reader.readAsDataURL(justMicRec.blob);
            reader.onloadend = function () {
                //var base64data = reader.result;
                //var currentURL = window.location.href;
                //var sqindex = currentURL.indexOf('sample-questions');
                //if (sqindex < 0)
                //    $('#Hdn_AnswerText').val(base64data);

                $('#recording-player-counting').hide();
                $('.recodingStatus').text('Recorded');
                $('.audio-player-progress').hide();

                var li = document.createElement('li');
                var au = document.createElement('audio');

                au.controls = true;
                au.src = justMicRec.player.src;
                li.appendChild(au);
                $('#recodingdiv .audio-player-controls').html(li);
                hideLoading();
            }
        }
    }
}