<script>
    document.querySelector('#image').addEventListener('change', function () {
        const file = this.files[0];
        const previewer = document.querySelector('#image_upload');
        
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                previewer.setAttribute('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
