
var theForm = document.forms['form1'];

$(document).ready(function () {

    if (!theForm) {
        theForm = document.forms.form1;
    }

    var TestType = $('#Hdn_TestType').val();
    if (TestType === 1) {
        $("#DivHeadsetCheck").html("");
        DemoaudioPlayer = null;
        $("#DivMicCheck").html("");
    }
    else if (TestType === 2) {
        $("#DivHeadsetCheck").html("");
        DemoaudioPlayer = null;
        $("#DivMicCheck").html("");
    } else {
        $("#DivHeadsetCheck").show();
        $("#DivMicCheck").show();
        if ($('#audioplayer_demo').length) {
            DemoaudioPlayer = jwplayer("audioplayer_demo");
            DemoaudioPlayer.setup({
                file: "https://ptevoucher.com.au/images/test-audio.mp3",
                icons: false,
                autoplay: true,
                height: 40,
            });
        }
    }
    $('#span_browser').html(jscd.browser);
    $('#span_browser_version').html(jscd.browserVersion);
    $('#span_os').html(jscd.os + ' ' + jscd.osVersion);
    setbrowserimages();
    setosimages();

    $('#ChildVerticalTab_1').easyResponsiveTabs({
        type: 'Horizantal',
        width: '100%',
        fit: true,
        tabidentify: 'ver_1',
        activetab_bg: '',
        inactive_bg: '',
        active_border_color: '', // border color for active tabs heads in this group
        active_content_border_color: '' // border color for active tabs contect in this group so that it matches the tab head border
    });

    $('.swal-btn-input').click(function (e) {
        e.preventDefault();
        $('#Hdn_PauseTest').val('1');
        swal({
            title: "Report a Bug",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "Write your bug discription here",
            cancelButtonClass: 'btn-danger',
            showLoaderOnConfirm: true
        }, function (inputValue) {
            if (inputValue === false) return false;
            if ($.trim(inputValue) === "") {
                swal.showInputError("You need to write something!");
                return false
            }
            $('#Hdn_Feedback').val(inputValue);
            __doPostBack('Lnk_SubmitFeedback', '');
        });
    });
});

$(document).keydown(function (event) {
    //if (event.ctrlKey == true && (event.which == '118' || event.which == '86' || event.which == '88')) {
    //    event.preventDefault();
    //}
});

function enablemicrophone() {
    // Fork getUserMedia for multiple browser versions, for those that need prefixes.
    navigator.getUserMedia = (navigator.getUserMedia ||
                              navigator.webkitGetUserMedia ||
                              navigator.mozGetUserMedia ||
                              navigator.msGetUserMedia ||
                              navigator.oGetUserMedia);
    if (navigator.getUserMedia) {
        navigator.getUserMedia(
           // constraints
           {
               audio: true
           },

           // successCallback
           function (localMediaStream) {
               $('#squaredFour').attr('checked', 'checked');
           },

           // errorCallback
           function (err) {
               if (err.message === 'Permission denied') {
                   // Explain why you need permission and how to update the permission setting
                   $('#squaredFour').removeAttr('checked');
                   alert('You need to allow the microphone to attempt the test.');
               }
           }
        );
    }
    else {
        alert('It seems like your browser is not supporting audio recording. We recommend you to use the latest version of firefox or chrome to attempt the test.');
    }
}

function ConfrirmRequirements() {
    var ChkEnableMic = theForm.elements['squaredFour'];
    var ChkaudioMic = theForm.elements['box1'];
    var Chkaudiorecord = theForm.elements['box3'];
    if (ChkEnableMic) {
        if (!ChkEnableMic.checked) {
            alert('Please enable microphone');
            return false;
        }
    }
    if (ChkaudioMic) {
        if (!ChkaudioMic.checked) {
            $('#Errorbox1').attr("class", "headset_check_errorbox");
            alert('Please tick mark the checkboxes below.');
            theForm.elements['box3'].focus();
            return false;
        }
    }
    if (Chkaudiorecord) {
        if (!Chkaudiorecord.checked) {
            $('#Errorbox3').attr("class", "headset_check_errorbox");
            alert('Please tick mark the checkboxes below.');
            theForm.elements['box3'].focus();
            return false;
        }
    }
    return true;
}

function playDemo() {
    $("#Hl_play").hide();
    $("#Hl_pause").attr('style', 'inline-block');
    DemoaudioPlayer.play();
}
function pauseDemo() {
    $("#Hl_pause").hide();
    $("#Hl_play").attr('style', 'inline-block');
    DemoaudioPlayer.pause();
}
function stopDemo() {
    $("#Hl_pause").hide();
    $("#Hl_play").attr('style', 'inline-block');
    DemoaudioPlayer.stop();
}

$(document).on('hidden.bs.modal', function (e) {
    var target = $(e.target);
    target.removeData('bs.modal')
    .find(".clearable-content").html('');
});

function CloseTest() {
    self.close();
}
function show_uploading_overlay() {
    $.blockUI({
        overlayCSS: {
            background: 'rgba(142, 159, 167, 0.3)',
            opacity: 1,
            cursor: 'wait'
        },
        css: {
            width: 'auto',
            top: '45%',
            left: '45%'
        },
        message: '<div class="blockui-default-message">Please wait...</div>',
        blockMsgClass: 'block-msg-message-loader'
    });
}
//flash player
//var hayFlash = function (a, b) { try { a = new ActiveXObject(a + b + '.' + a + b) } catch (e) { a = navigator.plugins[a + ' ' + b] } return !!a }('Shockwave', 'Flash')
//if (hayFlash) {
//    //document.getElementById("span_flashF").innerHTML = "installed.";
//    $('#DownloadFlash').hide();
//}
//else {
//    //document.getElementById("span_flashF").innerHTML = "Not installed.";
//    $('#DownloadFlash').show();
//    $('#A_startTestNow').prop('disabled', true);
//    $('#CPH_1_Hl_ResumeTest').prop('disabled', true);
//    $('#A_StartNewTest').prop('disabled', true);
//}

function setbrowserimages() {
    if (jscd.browser == 'Opera') {
        $('#IBrowser').attr('src', '/users/images/opera.png');
    }
    else if (jscd.browser == 'Microsoft Internet Explorer') {
        $('#IBrowser').attr('src', '/users/images/internet.png');
    }
    else if (jscd.browser == 'Chrome') {
        $('#IBrowser').attr('src', '/users/images/Google-Chrome.png');
    }
    else if (jscd.browser == 'Safari') {
        $('#IBrowser').attr('src', '/users/images/safari.png');
    }
    else if (jscd.browser == 'Firefox') {
        $('#IBrowser').attr('src', '/users/images/mozilla_firefox.png');
    }
    else {
        $('#IBrowser').attr('src', '/users/images/defult_browser.png');
    }
}
function setosimages() {
    if (jscd.os == 'Windows') {
        $('#IOS').attr('src', '/users/images/Windows.png');
    }
    else if (jscd.os == 'Linux') {
        $('#IOS').attr('src', '/users/images/1474478596_linux.png');
    }
    else if (jscd.os == 'Mac OS X') {
        $('#IOS').attr('src', '/users/images/1474478746_apple.png');
    }
    else {
        document.getElementById('span_os').innerHTML = "Unkown Os";
        $('#IOS').hide();
    }
}

function increaseFontSize(increaseFactor) {

    var allListElements = $("#question_body h3, h5, li, select, input");
    var txt = document.getElementById("question_body");
    var style = window.getComputedStyle(txt, null).getPropertyValue('font-size');
    var currentSize = parseFloat(style);
    txt.style.fontSize = (currentSize + increaseFactor) + 'px';

    for (var i = 0; i <= allListElements.length - 1; i++) {
        var CheckSIze = allListElements[i].style.fontSize;
        if (CheckSIze === "") {
            var h3currentSize = 20;
            allListElements[i].style.fontSize = Number(h3currentSize + increaseFactor) + "px";
        } else {
            var NewCheckSIze = parseInt(CheckSIze);
            allListElements[i].style.fontSize = Number(NewCheckSIze + increaseFactor) + "px";
        }
    }
}

function reset_checked_radio() {
    $('input[name="answer"]').attr('checked', false);
}

function showLoading() {
    //$("#loading").show();
    show_uploading_overlay();
    $('#Hdn_PauseTest').val('1');
}

function hideLoading() {
    //$("#loading").hide();
    $.unblockUI();
}

var selectedText = "";
function CutIt() {
    var el = $('textarea[name=answer]');
    var start = el.prop("selectionStart");
    var end = el.prop("selectionEnd");
    if (start != end) {
        selectedText = "";
        var text = el.val();
        var before = text.substring(0, start);
        var after = text.substring(end, text.length);
        el.val(before + selectedText + after);
        selectedText = text.substring(start, end);
        getWordCount($('textarea[name=answer]').val());
    }
    el[0].selectionStart = el[0].selectionEnd = start;
    el.focus();
}

$(document).keydown(function (event) {
    if (event.ctrlKey == true && (event.which == '118' || event.which == '86' || event.which == '88')) {
        //alert('Sorry');
        event.preventDefault();
    }
});

function PasteIt() {
    var el = $('textarea[name=answer]');
    var start = el.prop("selectionStart");
    var end = el.prop("selectionEnd");
    var text = el.val();
    var before = text.substring(0, start);
    var after = text.substring(end, text.length);
    el.val(before + selectedText + after);
    el[0].selectionStart = el[0].selectionEnd = start + selectedText.length;
    el.focus();
    getWordCount($('textarea[name=answer]').val());
}

function CopyIt() {
    var el = $('textarea[name=answer]');
    var start = el.prop("selectionStart");
    var end = el.prop("selectionEnd");
    if (start != end) {
        selectedText = "";
        var text = el.val();
        selectedText = text.substring(start, end);
    }
    el[0].selectionStart = el[0].selectionEnd = start;
    el.focus();
}

function initWritingCounter() {
    getWordCount($('textarea[name=answer]').val());
    $("#question_body").on('change keydown keyup keypress blur input propertychange paste button', 'textarea', function () {
        var value = $(this).val();
        getWordCount(value);
    });
}

function getWordCount(value) {
    if (value.length == 0) {
        $("#word-count").html(0);
        return;
    }

    var regex = /\s+/gi;
    var wordCount = value.trim().replace(regex, ' ').split(' ').length;
    var totalChars = value.length;
    var charCount = value.trim().length;
    var charCountNoSpace = value.replace(regex, '').length;
    $("#word-count").html(wordCount);
}

function OpenDialog(ele) {
    //showLoading();
    $("#" + ele).draggable();
    $("#" + ele).fadeIn("fast");
}

function CloseDialog(ele) {
    //hideLoading();
    $("#" + ele).fadeOut("fast");
}
function RemoveScriptChar(TxtString) {
    if (TxtString.value != '' && TxtString.value.match(/^[\w ]+$/) == null) {
        TxtString.value = TxtString.value.replace(/[\W]/g, '');
    }
}
function check(check, id) {
    if (check == "radio") {
        var $radio = $("input:radio[id=" + id + "]");

        //previously checked
        if ($radio.data('waschecked') == true) {
            $radio.prop('checked', false);
            $radio.data('waschecked', false);
        }
        else
            $radio.data('waschecked', true);

        // remove was checked from other radios
        $radio.siblings("input:radio[id=" + id + "]").data('waschecked', false);
    }
}
