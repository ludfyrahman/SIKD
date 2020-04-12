$(function(){
    $('.delete').click(function(){
        return confirm("Apakah anda yakin ingin menghapus data ?");
    });
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
    })
})