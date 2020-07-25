$(function(){
    $('.delete').click(function(){
        return confirm("Apakah anda yakin ingin menghapus data ?");
    });
    $('.warning').click(function(){
        return confirm("Apakah anda yakin ?");
    });
    if($("#arsip").val() !=''){
        var val = $("#arsip").val();
        // console.log(val);
        loadDataArsip(val);
    }
    function loadDataArsip(val){
        $.ajax({
            type: "GET",
            url: BASEURL+"api/arsip/"+val,
            cache: false,
            success: function(data){
                var obj = JSON.parse(data);
                // console.log(data)
                $("#jenis").val(obj.jenis);
                $("#pengirim").val(obj.pengirim);
                // var appendElement = "<option value=' '>Pilih Provinsi</option>";
                // for (let index = 0; index < obj.length; index++) {
                //     appendElement += "<option "+ (provinsi_id == obj[index]['id'] ? "selected" : "") +" value="+obj[index]['id']+">"+
                //                 obj[index]['name']+
                //             "</option>";                
                // }
                // $("#provinsi").html(appendElement);
            },
            error(res){
                console.log("errrror")
                console.log("res");
            }
        });
    }
    $("#arsip").change(function(){
        var val = $(this).val();
        loadDataArsip(val);
    })
    $(".klasifikasi").change(function(){
        $.ajax({
            type: "GET",
            url: BASEURL+"api/retensi/"+$(this).val(),
            cache: false,
            success: function(data){
                var obj = JSON.parse(data);
                $("#retensi").val(obj['jenis']);
            },
            error(res){
                console.log("errrror")
                console.log("res");
            }
        });
    })
    $(".akses").change(function(){
        console.log($('.akses').val());
        $("#aksesvalue").val($('.akses').val());
    });
    $("[id=search_mail]").keyup(function(){
        var val = $("[id=search_mail]").val();
        $.ajax({
            url: BASEURL+"admin/surat_masuk/pencarian", // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: {search: val}, // Set data yang akan dikirim
            
            success: function(response){ // Ketika proses pengiriman berhasil
            //    console.log(response);
                $("#inbox").html(response);
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
            }
        });
    })
    $("[id=search_arsip]").keyup(function(){
        var val = $("[id=search_arsip]").val();
        $.ajax({
            url: BASEURL+"admin/surat_masuk/pencarian_arsip", // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: {search: val}, // Set data yang akan dikirim
            
            success: function(response){ // Ketika proses pengiriman berhasil
            //    console.log(response);
                $("#arsip").html(response);
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
            }
        });
    })
})