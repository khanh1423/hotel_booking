
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


// Tree Menu.innerHTML.innerHTML


// room tabs attribute
var clickAdd = 0;
var htmlContent;
function AddAttributes(){
    clickAdd++;
    if(clickAdd == 1){
        htmlContent = document.getElementById('navs-top-profile').innerHTML;
    }
    var addBefore = document.getElementById('attributePlus');
    addBefore.insertAdjacentHTML('beforebegin', htmlContent);
}

var clickRemove = 0;
function removeAttributes($value){
    if(clickAdd > clickRemove){
        clickRemove++;
        var card = $value.parentNode;
        var col = card.parentNode;
        var row = col.parentNode;
        row.remove();
    }
}