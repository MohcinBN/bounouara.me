$(document).ready(function(){
        // preview selected image
        function readURL(input) {

            if (input.files && input.files[0]) {
    
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#showed').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $("#selected").change(function(){
            readURL(this);
        });
});