base_url=$(".base_url").text();
function sweetA(baslik, msg) {

    sweetAlert({

        title: baslik,
        text: '<b>' + msg + '</b>',
        html: true,
        animation: true,
        imageSize: "80x80",


    })

}


function  gizle(deger) {
  if(deger=='1') {

      $('.input-upload').show();


    }else if(deger=='2'){
        $('.input-upload').hide();



    }else{

      $('.input-upload').hide();

  }
}

function krediToplap() {

   var kredi= $("#quentity").val();
   var birim=$("#price").val();

  if(!isNaN(kredi) && kredi!='' && !isNaN(birim) && birim!='' ){

      var sonuc=parseInt(birim)* parseInt(kredi);

  }


   $("#total").val(sonuc);

}



function imgError(image) {
    image.onerror = "";
    image.src = base_url+"upload/noimage.png";
    return true;
}

