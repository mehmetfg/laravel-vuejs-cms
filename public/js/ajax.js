

$control={};
$getModal={};

$('.my-checkbox').change(function () {

    var type = 0;
    if ($(this).prop('checked')) {
        type = 1;
    }
    else {
        type = 0

    }
    ;
    var dataType = $(this).attr("dataType");

    $.post(
        dataType + "/isActiveSetter/"+$(this).attr('dataID'),
        {isActive: type},
        function (data) {


        }, 'json'
    )


});
$('.trial-checkbox').change(function () {

    var type = 0;
    if ($(this).prop('checked')) {
        type = 1;
    }
    else {
        type = 0

    }
    ;
    var dataType = $(this).attr("dataType");
    var dataid = $(this).attr('dataID');
    $.post(
        base_url + dataType + "/isTrialSetter",
        {data: dataid, isActive: type},
        function (data) {


        }, 'json'
    )


});

/////Silme İşlemi

$(".removeBtn").click(function () {
    var dataURL = $(this).attr("dataURL");


    sweetAlert({

        title: "SİLME İŞLEMİ",
        text: "<b>Silmek İstediğinizden Eminmisiniz!?</b>",
        html: true,
        animation: true,
        imageSize: "80x80",
        allowEscapeKey: true,
        showConfirmBotton: true,
        confirmButtonText: "Kabul Ediyorum",
        configmButtonColor: "red",
        showCancelButton: true,
        allowOutSideClick: true,
        closeOnCancel: true,
        closeOnConfirm: false

    }, function (isConfirm) {
        if (isConfirm == true) {

            $("#deleteForm"+dataURL).submit();
        }

    });

})

$("#ekleBtn").click(function () {

    var dataKredi = $(this).attr("dataKredi");

    if (parseInt(dataKredi) >= 0) {
        $.ajax({
            url: base_url + 'student/insertForm',
            type: 'POST',
            success: function (data) {

                $("#Modal").html('');

                $("#Modal").html(data);
                $("#Modal").modal('show')

            }


        })
    } else {
        sweetA("<b><i class='fa fa-exclamation fa-4x'></i> </b>", "Krediniz Tükenmiştir!</br>Lütfen Kredi Yükleyiniz");
    }
})



$control.mail=function (mail, durum) {
    var html = 'Girmiş olduğunuz mail adresi mevcuttur!';
    $.ajax({
        url: base_url + "dealer/mailControl/",
        type: 'POST',
        data: {mail: mail},
        success: function (response) {

            if (response != "" && durum == "0") {
                $("div.mail").show();
                $(".mail").html(html).slideDown('slow').delay(2000).slideUp('slow');
                $("button#kaydetBtn").attr("disabled", true);
            } else {

                $("button#kaydetBtn").attr("disabled", false);
            }
        }

    })
}

$control.kullanici=function (kullanici, durum) {

    var html = 'Girmiş olduğunuz kullanıcı  adı mevcuttur!';
    $.ajax({
        url: base_url + "student/kullaniciControl/",
        type: 'POST',
        data: {kullanici: kullanici},
        success: function (response) {

            if (response != "" && durum == "0") {
                $("div.kullanici").show();
                $(".kullanici").html(html).slideDown('slow').delay(2000).slideUp('slow');
                $("button#kaydetBtn").attr("disabled", true);
            } else {

                $("button#kaydetBtn").attr("disabled", false);
            }
        }

    })

}

$control.kredi=function (deger,kredi) {
    if (kredi - deger < 0) {
        var html = 'Girdiğiniz Değer Kredinizi Aşmamalıdır!';
        $("div.kredi-miktari").show();
        $(".kredi-miktari").html(html).slideDown('slow').delay(2000).slideUp('slow');
        $("button#kaydetBtn").attr("disabled", true);

    } else {
        $("button#kaydetBtn").attr("disabled", false);
    }
}


$control.krediAfter=function (method, bakiye) {
    if (parseInt(bakiye) > 0) {
        $getModal.form(method);

    } else {
        sweetA("<b><i class='fa fa-exclamation fa-4x'></i> </b>", "Krediniz Tükenmiştir!</br>Lütfen Kredi Yükleyiniz");
    }
}




////Modal işlemleri
$getModal.form=function (tur) {


    $.ajax({
        url: base_url + tur,
        type: 'POST',
        success: function (data) {

            $("#Modal").html('');

            $("#Modal").html(data);
            $("#Modal").modal('show')

        }


    })
}

$getModal.list=function (tur, cins) {
    $.ajax({

        url: base_url + tur,
        type: 'POST',

        success: function (response) {

            $("select#" + cins).html(response);

        }

    })
}










