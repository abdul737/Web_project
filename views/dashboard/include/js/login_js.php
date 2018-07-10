<script type="text/javascript">
    $().ready(function () {
        main.checkFullPageBackgroundImage();
        $('.card').removeClass('card-hidden');
        $("button[type='submit']").prop("disabled", true);
        $('#passwordTextBox').on('input', function () {
            if (this.value.length >= 6) {
                $('button[type="submit"]').prop('disabled', false);
            } else {
                $('button[type="submit"]').prop('disabled', true);
            }
        });
    });
</script>