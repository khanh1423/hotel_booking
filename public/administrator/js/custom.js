
// xác nhận trước khi xóa
$('.delete_form').on('submit', function() {
    if(confirm('Bạn có muốn xóa dữ liệu này không?')) {
        return true;
    }else{
        return false;
    }
});

// cài đặt thời gian thông báo
function nofitication() {
    $value = $('.alert-nofitication'); 
    $value.css("display","none");
    }
setTimeout(nofitication, 2500)


// xem trước hình ảnh tải lên
function previewFile(file){
    var file = $(".image-preview").get(0).files[0];
    
    if(file){
        var reader = new FileReader();
        
        reader.onload = function(){
            $("#previewImg").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}
// console.log($(".image-preview"))

// var $$ = document.querySelector.bind(document);
// console.log($$(".image-preview"))

